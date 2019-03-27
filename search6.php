<?php
  include 'global.php';
  include 'php/dbDataConn.php';
?>
    <style>
      @media print {
        .printBreak {page-break-after: always;}
      }
    </style>
  </head>
  <body>
    <?php
    static $summary;

    $limit = $_POST["limit"];
    if ($limit <= 0) {
      $limit = NULL;
    }

    $teamnum[1] = $_POST["searchname1"];
    $teamnum[2] = $_POST["searchname2"];
    $teamnum[3] = $_POST["searchname3"];
    $teamnum[4] = $_POST["searchname4"];
    $teamnum[5] = $_POST["searchname5"];
    $teamnum[6] = $_POST["searchname6"];

    if ($limit == NULL) {
      for ($i = 1; $i <= $GLOBALS['MODALS']['TEAMS_PER_MATCH']; $i++) {
        $result[$i] = mysqli_query($dbDataConn,"SELECT * FROM `matchdata` WHERE `teamNum` = $teamnum[$i]");
      }
    } else {
      for ($i = 1; $i <= $GLOBALS['MODALS']['TEAMS_PER_MATCH']; $i++) {
        $result[$i] = mysqli_query($dbDataConn,"SELECT * FROM `matchdata` WHERE `teamNum` = $teamnum[$i] ORDER BY id DESC LIMIT $limit");
      }
    }

    for ($i = 1; $i <= $GLOBALS['MODALS']['TEAMS_PER_MATCH']; $i++) {
      if($teamnum[$i] != NULL) {
        echoTeamTable($i, $result[$i]);
      }
      if ($i == ($GLOBALS['MODALS']['TEAMS_PER_MATCH']/2)) {
        echo "<div class='printBreak'></div>";
      }
    }
    echo "<div class='printBreak'></div>";

    //**********************************************************************************
    //                          Summary
    //**********************************************************************************

    if ($teamnum[1] != NULL || $teamnum[2] != NULL || $teamnum[3] != NULL || $teamnum[4] != NULL || $teamnum[5] != NULL || $teamnum[6] != NULL) {
        echo "<h2 style='text-align:center'>Summary</h2>";
        echo "
        <div class='container'>
            <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                " . returnTeamSummary(1) . "
            </div>
            <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                " . returnTeamSummary(2) . "
            </div>
            <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                " . returnTeamSummary(3) . "
            </div>
        </div>
        ";
        echo "<br>";
        echo "
        <div class='container'>
            <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                " . returnTeamSummary(4) . "
            </div>
            <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                " . returnTeamSummary(5) . "
            </div>
            <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                " . returnTeamSummary(6) . "
            </div>
        </div>
        ";
    }

    function returnTeamSummary($teamindex) {
        global $summary, $teamnum;
        return "
        <h3 style='text-align:center'><strong><u>" . $teamnum[$teamindex] . "</u></strong></h3>
        <table class='table table-bordered'>
            <thead>
                <th colspan='2' style='text-align:center'>Autonomous</th>
            </thead>
            <tbody>
                <tr>
                    <th>Avg Cargo</th>
                    <td>" . $summary[$teamindex]['autoHatches'] . "</td>
                </tr>
                <tr>
                    <th>Avg Hatches</th>
                    <td>" . $summary[$teamindex]['autoCargo'] . "</td>
                </tr>
            </tbody>
            <thead>
                <th colspan='2' style='text-align:center'>Teleop</th>
            </thead>
            <tbody>
                <tr>
                    <th>Avg Cargo</th>
                    <td>" . $summary[$teamindex]['teleHatches'] . "</td>
                </tr>
                <tr>
                    <th>Avg Hatches</th>
                    <td>" . $summary[$teamindex]['teleCargo'] . "</td>
                </tr>
            </tbody>
        </table>";
    }

    function echoTeamTable($teamindex, $SQLresult) {

        global $summary, $teamnum;

        echo "<h3 style='text-align:center'><u>Data for: " . $teamnum[$teamindex] . "</u></h3>";

        echo "<div class='container'>
        <table class='table table-striped'>
        <thead>
        <tr>
        <th>ID</th>
        <th>Match</th>
        <th>Hab Line</th>
        <th>Start at lvl 2</th>
        <th>Auto Hatches</th>
        <th>Auto Cargo</th>
        <th>Tele Hatches</th>
        <th>Tele Cargo</th>
        <th>Ground Hatch</th>
        <th>Ground Cargo</th>
        <th>Upper Rocket</th>
        <th>Climb Level</th>
        <th>Disabled</th>
        <th>Comments</th>
        </tr>
        </thead>
        <tbody>";

        $matchTotal = 0;
        while($row = mysqli_fetch_array($SQLresult)) {
            $matchTotal+=1;
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['matchNum'] . "</td>";

            //AUTONOMOUS
            if ($row['autoPassHabline']) {
                echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            if ($row['habStart']) {
            echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            echo "<td>" . $row['hatchesPlacedAuto'] . "</td>";
            echo "<td>" . $row['cargoPlacedAuto'] . "</td>";

            //TELEOP
            echo "<td>" . $row['hatchesPlaced'] . "</td>";
            echo "<td>" . $row['cargoPlaced'] . "</td>";

            if ($row['groundPickupHatch']) {
                echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            if ($row['groundPickupCargo']) {
                echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            if ($row['upperRocket']) {
                echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            echo "<td>" . $row['habLevel'] . "</td>";
            echo "<td>" . $row['teleDisabled'] . "</td>";
            echo "<td>" . $row['teleCap.notes'] . "</td>";
            echo "</tr>";

            //Auto Totals
            $autoPassHablineTotal+=$row['autoPassHabline'];
            $habStartTotal+=$row['habStart'];
            $hatchesPlacedAutoTotal+=$row['hatchesPlacedAuto'];
            $cargoPlacedAutoTotal+=$row['cargoPlacedAuto'];

            //Tele totals
            $cargoPlacedTotal+=$row['cargoPlaced'];
            $hatchesPlacedTotal+=$row['hatchesPlaced'];
            $groundPickupHatchTotal+=$row['groundPickupHatch'];
            $groundPickupCargoTotal+=$row['groundPickupCargo'];
            $upperRocketTotal+=$row['upperRocket'];
            $habLevelTotal+=$row['habLevel'];
            $habDisabledTotal+=$row['teleDisabled'];
        }

            //Calculate totals
            $hatchesPlacedAutoCalculated = round($hatchesPlacedAutoTotal/$matchTotal, 2);
            $cargoPlacedAutoCalculated = round($cargoPlacedAutoTotal/$matchTotal, 2);

            $hatchesPlacedCalculated = round($hatchesPlacedTotal/$matchTotal, 2);
            $cargoPlacedCalculated = round($cargoPlacedTotal/$matchTotal, 2);
            $habLevelCalculated = round($habLevelTotal/$matchTotal, 2);

            $groundPickupHatchCalculated = $groundPickupHatchTotal/$matchTotal*100;
            $groundPickupCargoCalculated = $groundPickupCargoTotal/$matchTotal*100;

            // $autoKPACalculated = round($autoKPATotal/$matchTotal,2);
            // $autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
            // $autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);
            //
            // $teleKPACalculated = round($teleKPATotal/$matchTotal,2);
            // $teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
            // $teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
            // $teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
            // $teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
            // $teleGearCalculated = round($teleGearTotalSuccess/$matchTotal,2);
            // $teleClimbCalculated = round($teleClimbTotal/$matchTotal,2);

            echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
            echo "<td> </td>";
            echo "<td><strong>$autoPassHablineTotal/$matchTotal</strong></td>";
            echo "<td><strong>$habStartTotal/$matchTotal</strong></td>";
            echo "<td><strong>$hatchesPlacedAutoCalculated</strong></td>";
            echo "<td><strong>$cargoPlacedAutoCalculated</strong></td>";

            echo "<td><strong>$hatchesPlacedCalculated</strong></td>";
            echo "<td><strong>$cargoPlacedCalculated</strong></td>";
            echo "<td><strong>$groundPickupHatchCalculated%</strong></td>";
            echo "<td><strong>$groundPickupCargoCalculated%</strong></td>";
            echo "<td><strong>$upperRocketTotal</strong></td>";
            echo "<td><strong>$habLevelCalculated</strong></td>";
            echo "<td><strong>$habDisabledTotal/$matchTotal</strong></td>";
            echo "<td> </td>";
            echo "</tr></tfoot>";

            echo "</table></div>";
// $summary[$teamindex]['Thing1'] = 5
        //Save data to summary array
        $summary[$teamindex]['autoHatches'] = $hatchesPlacedAutoCalculated;
        $summary[$teamindex]['autoCargo'] = $cargoPlacedAutoCalculated;

        $summary[$teamindex]['teleHatches'] = $hatchesPlacedCalculated;
        $summary[$teamindex]['teleCargo'] = $cargoPlacedCalculated;
        // $summary[$teamindex]['auto']['kpa']['max'] = $autoKPAMax;
        // if ($matchTotal != 0) {
        //     $summary[$teamindex]['auto']['gears']['avg'] = round($autoGearTotal/$matchTotal, 2);
        //     $summary[$teamindex]['auto']['kpa']['avg'] = round($autoKPATotal/$matchTotal,2);
        // }
        // else {
        //     $summary[$teamindex]['auto']['gears']['avg'] = 0;
        //     $summary[$teamindex]['auto']['kpa']['avg'] = 0;
        // }
        // $summary[$teamindex]['auto']['gears']['success'] = $autoGearSuccess;
        // $summary[$teamindex]['auto']['gears']['attempts'] = $autoGearAttempts;
        // if ($autoGearAttempts != 0) {
        //     $summary[$teamindex]['auto']['gears']['acc'] = round($autoGearSuccess/$autoGearAttempts, 2);
        // }
        // else {
        //     $summary[$teamindex]['auto']['gears']['acc']  = 0;
        // }
        //
        // $summary[$teamindex]['tele']['kpa']['max'] = $teleKPAMax;
        // if ($matchTotal != 0) {
        //     $summary[$teamindex]['tele']['gears']['avg'] = round($teleGearTotalSuccess/$matchTotal, 2);
        //     $summary[$teamindex]['tele']['kpa']['avg'] = round($teleKPATotal/$matchTotal,2);
        // }
        // else {
        //     $summary[$teamindex]['tele']['gears']['avg'] = 0;
        //     $summary[$teamindex]['tele']['kpa']['avg'] = 0;
        // }
        // // $summary[$teamindex]['tele']['gears']['success'] = $teleGearTotalSuccess;
        // // $summary[$teamindex]['tele']['gears']['fail'] = $teleGearTotalFail;
        // $summary[$teamindex]['tele']['gears']['max'] = $teleGearMax;
        // $summary[$teamindex]['tele']['climb'] = $teleClimbCalculated;


        //Reset all values
        $autoPassHablineTotal = 0;
        $habStartTotal = 0;
        $hatchesPlacedAutoTotal = 0;
        $cargoPlacedAutoTotal = 0;

        //Tele totals
        $cargoPlacedTotal = 0;
        $hatchesPlacedTotal = 0;
        $groundPickupHatchTotal = 0;
        $groundPickupCargoTotal = 0;
        $upperRocketTotal = 0;
        $habLevelTotal = 0;
    }
    ?>
  </body>
</html>
