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

    if ($teamnum[1] != NULL && $teamnum[2] != NULL && $teamnum[3] != NULL && $teamnum[4] != NULL && $teamnum[5] != NULL && $teamnum[6] != NULL) {
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
                    <th>Avg KPA</th>
                    <td>" . $summary[$teamindex]['auto']['kpa']['avg'] . "</td>
                </tr>
                <tr>
                    <th>Max KPA</th>
                    <td>" . $summary[$teamindex]['auto']['kpa']['max'] . "</td>
                </tr>
                <tr>
                    <th>Avg Gears</th>
                    <td>" . $summary[$teamindex]['auto']['gears']['avg'] . "</td>
                </tr>
                <tr>
                    <th>Acc Gears</th>
                    <td>" . $summary[$teamindex]['auto']['gears']['acc']*100 . "%</td>
            </tbody>
            <thead>
                <th colspan='2' style='text-align:center'>Teleop</th>
            </thead>
            <tbody>
                <tr>
                    <th>Avg KPA</th>
                    <td>" . $summary[$teamindex]['tele']['kpa']['avg'] . "</td>
                </tr>
                <tr>
                    <th>Max KPA</th>
                    <td>" . $summary[$teamindex]['tele']['kpa']['max'] . "</td>
                </tr>
                <tr>
                    <th>Avg Gears</th>
                    <td>" . $summary[$teamindex]['tele']['gears']['avg'] . "</td>
                </tr>
                <tr>
                    <th>Max Gears</th>
                    <td>" . $summary[$teamindex]['tele']['gears']['max'] . "</td>
                </tr>
                <tr>
                    <th>Climb</th>
                    <td>" . $summary[$teamindex]['tele']['climb']*100 . "%</td>
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
        <th>Auto Baseline</th>
        <th>Auto Gear</th>
        <th>Auto KPA</th>
        <th>Auto High Goal Acc</th>
        <th>Auto High Goal Speed</th>
        <th>Tele Gears</th>
        <th>Tele KPA</th>
        <th>High Goal Acc</th>
        <th>High Goal Speed</th>
        <th>Low Goal Acc</th>
        <th>Low Goal Speed</th>
        <th>Climb</th>
        <th>Comments</th>
        </tr>
        </thead>
        <tbody>";

        $matchTotal = 0;
        $autoKPAMax = 0;
        while($row = mysqli_fetch_array($SQLresult)) {
            $matchTotal+=1;
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['matchNum'] . "</td>";
            if ($row['autoCap.passBaseline']) {
                echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            if ($row['autoCap.gearSuccess']) {
                echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            echo "<td>" . $row['autoCap.KPA'] . "</td>";
            echo "<td>" . ($row['autoCap.highGoalAccuracy']/4)*100 . "%</td>";
            echo "<td>" . ($row['autoCap.highGoalSpeed']/4)*100 . "%</td>";


            echo "<td>" . $row['teleCap.gearSuccess'] . "</td>";
            echo "<td>" . $row['teleCap.KPA'] . "</td>";
            echo "<td>" . ($row['teleCap.highGoalAccuracy']/4)*100 . "%</td>";
            echo "<td>" . ($row['teleCap.highGoalSpeed']/4)*100 . "%</td>";
            echo "<td>" . ($row['teleCap.lowGoalAccuracy']/4)*100 . "%</td>";
            echo "<td>" . ($row['teleCap.lowGoalSpeed']/4)*100 . "%</td>";
            if ($row['teleCap.climb']) {
                echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
            }
            else {
                echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
            }
            echo "<td>" . $row['teleCap.notes'] . "</td>";
            echo "</tr>";

            //Auto Totals
            $autoKPATotal+=$row['autoCap.KPA'];
            if ($row['autoCap.KPA'] > $autoKPAMax) {
                $autoKPAMax = $row['autoCap.KPA'];
            }
            $autoGearSuccess+=$row['autoCap.gearSuccess'];
            $autoGearAttempts+=$row['autoCap.gear'];
            $autoBaselineTotal+=$row['autoCap.passBaseline'];
            $autoGearTotal+=$row['autoCap.gearSuccess'];
            $autoHighGoalAccuracyTotal+=($row['autoCap.highGoalAccuracy']/4)*100;
            $autoHighGoalSpeedTotal+=($row['autoCap.highGoalSpeed']/4)*100;

            //Tele totals
            $teleKPATotal+=$row['teleCap.KPA'];
            if ($row['teleCap.KPA'] > $teleKPAMax) {
                $teleKPAMax = $row['teleCap.KPA'];
            }
            if ($row['teleCap.gearSuccess'] > $teleGearMax) {
                $teleGearMax = $row['teleCap.gearSuccess'];
            }
            $teleGearTotalSuccess+=$row['teleCap.gearSuccess'];
            $teleGearTotalFail+=$row['teleCap.gearFailed'];
            $teleHighGoalAccuracyTotal+=($row['teleCap.highGoalAccuracy']/4)*100;
            $teleHighGoalSpeedTotal+=($row['teleCap.highGoalSpeed']/4)*100;
            $teleLowGoalAccuracyTotal+=($row['teleCap.lowGoalAccuracy']/4)*100;
            $teleLowGoalSpeedTotal+=($row['teleCap.lowGoalSpeed']/4)*100;
            $teleClimbTotal+=$row['teleCap.climb'];
        }

            //Calculate totals
            $autoKPACalculated = round($autoKPATotal/$matchTotal,2);
            $autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
            $autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);

            $teleKPACalculated = round($teleKPATotal/$matchTotal,2);
            $teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
            $teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
            $teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
            $teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
            $teleGearCalculated = round($teleGearTotalSuccess/$matchTotal,2);
            $teleClimbCalculated = round($teleClimbTotal/$matchTotal,2);

            echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
            echo "<td> </td>";
            echo "<td><strong>$autoBaselineTotal/$matchTotal</strong></td>";
            echo "<td><strong>$autoGearTotal/$matchTotal</strong></td>";
            echo "<td><strong>$autoKPACalculated</strong></td>";
            echo "<td><strong>$autoHighGoalAccuracyCalculated%</strong></td>";
            echo "<td><strong>$autoHighGoalSpeedCalculated%</strong></td>";

            echo "<td><strong>$teleGearCalculated</strong></td>";
            echo "<td><strong>$teleKPACalculated</strong></td>";
            echo "<td><strong>$teleHighGoalAccuracyCalculated%</strong></td>";
            echo "<td><strong>$teleHighGoalSpeedCalculated%</strong></td>";
            echo "<td><strong>$teleLowGoalAccuracyCalculated%</strong></td>";
            echo "<td><strong>$teleLowGoalSpeedCalculated%</strong></td>";
            echo "<td><strong>$teleClimbTotal/$matchTotal</strong></td>";
            echo "<td> </td>";
            echo "</tr></tfoot>";

            echo "</table></div>";

        //Save data to summary array
        $summary[$teamindex]['auto']['kpa']['max'] = $autoKPAMax;
        if ($matchTotal != 0) {
            $summary[$teamindex]['auto']['gears']['avg'] = round($autoGearTotal/$matchTotal, 2);
            $summary[$teamindex]['auto']['kpa']['avg'] = round($autoKPATotal/$matchTotal,2);
        }
        else {
            $summary[$teamindex]['auto']['gears']['avg'] = 0;
            $summary[$teamindex]['auto']['kpa']['avg'] = 0;
        }
        $summary[$teamindex]['auto']['gears']['success'] = $autoGearSuccess;
        $summary[$teamindex]['auto']['gears']['attempts'] = $autoGearAttempts;
        if ($autoGearAttempts != 0) {
            $summary[$teamindex]['auto']['gears']['acc'] = round($autoGearSuccess/$autoGearAttempts, 2);
        }
        else {
            $summary[$teamindex]['auto']['gears']['acc']  = 0;
        }

        $summary[$teamindex]['tele']['kpa']['max'] = $teleKPAMax;
        if ($matchTotal != 0) {
            $summary[$teamindex]['tele']['gears']['avg'] = round($teleGearTotalSuccess/$matchTotal, 2);
            $summary[$teamindex]['tele']['kpa']['avg'] = round($teleKPATotal/$matchTotal,2);
        }
        else {
            $summary[$teamindex]['tele']['gears']['avg'] = 0;
            $summary[$teamindex]['tele']['kpa']['avg'] = 0;
        }
        // $summary[$teamindex]['tele']['gears']['success'] = $teleGearTotalSuccess;
        // $summary[$teamindex]['tele']['gears']['fail'] = $teleGearTotalFail;
        $summary[$teamindex]['tele']['gears']['max'] = $teleGearMax;
        $summary[$teamindex]['tele']['climb'] = $teleClimbCalculated;


        //Reset all values
        $autoBaselineTotal = 0;
        $autoGearTotal = 0;
        $autoLowGoalTotal = 0;
        $autoHighGoalAccuracyTotal = 0;
        $autoHighGoalSpeedTotal = 0;

        $teleGearTotal = 0;
        $teleBallTotal = 0;
        $teleHighGoalAccuracyTotal = 0;
        $teleHighGoalSpeedTotal = 0;
        $teleLowGoalAccuracyTotal = 0;
        $teleLowGoalSpeedTotal = 0;
        $teleClimbTotal = 0;

        $autoHighGoalAccuracyCalculated = 0;
        $autoHighGoalSpeedCalculated = 0;

        $teleHighGoalAccuracyCalculated = 0;
        $teleHighGoalSpeedCalculated = 0;
        $teleLowGoalAccuracyCalculated = 0;
        $teleLowGoalSpeedCalculated = 0;
        $teleGearCalculated = 0;
        $teleBallTotal = 0;
    }
    ?>
  </body>
</html>
