<link href="../css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
<style>
    @media print {
        .printBreak {page-break-after: always;}
    }
</style>
<?php
static $summary;

$limit = $_POST["limit"];
if ($limit <= 0) {
    $limit = NULL;
}

$teamnum1 = $_POST["searchname1"];
$teamnum2 = $_POST["searchname2"];
$teamnum3 = $_POST["searchname3"];
$teamnum4 = $_POST["searchname4"];
$teamnum5 = $_POST["searchname5"];
$teamnum6 = $_POST["searchname6"];

$con=mysqli_connect("localhost","data","mxwZsnKw5FtD8uX8","sandman");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($limit == NULL) {
    $result1 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum1");
    $result2 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum2");
    $result3 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum3");
    $result4 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum4");
    $result5 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum5");
    $result6 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum6");
    
    // $result[1] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum1");
    // $result[2] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum2");
    // $result[3] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum3");
    // $result[4] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum4");
    // $result[5] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum5");
    // $result[6] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum6");
}
else {
    $result1 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum1 ORDER BY id DESC LIMIT $limit");
    $result2 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum2 ORDER BY id DESC LIMIT $limit");
    $result3 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum3 ORDER BY id DESC LIMIT $limit");
    $result4 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum4 ORDER BY id DESC LIMIT $limit");
    $result5 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum5 ORDER BY id DESC LIMIT $limit");
    $result6 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum6 ORDER BY id DESC LIMIT $limit");
    
    // $result[1] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum1 ORDER BY id DESC LIMIT $limit");
    // $result[2] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum2 ORDER BY id DESC LIMIT $limit");
    // $result[3] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum3 ORDER BY id DESC LIMIT $limit");
    // $result[4] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum4 ORDER BY id DESC LIMIT $limit");
    // $result[5] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum5 ORDER BY id DESC LIMIT $limit");
    // $result[6] = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum6 ORDER BY id DESC LIMIT $limit");
}

if ($teamnum1 != NULL) {
    echoTeamTable(1, $teamnum1, $result1);
}
if ($teamnum2 != NULL) {
    echoTeamTable(2, $teamnum2, $result2);
}
if ($teamnum3 != NULL) {
    echoTeamTable(3, $teamnum3, $result3);
}
echo "<div class='printBreak'></div>";
if ($teamnum4 != NULL) {
    echoTeamTable(4, $teamnum4, $result4);
}
if ($teamnum5 != NULL) {
    echoTeamTable(5, $teamnum5, $result5);
}
if ($teamnum6 != NULL) {
    echoTeamTable(6, $teamnum6, $result6);
}
echo "<div class='printBreak'></div>";

//**********************************************************************************
//                          Summary
//**********************************************************************************

if ($teamnum1 != NULL && $teamnum2 != NULL && $teamnum3 != NULL && $teamnum4 != NULL && $teamnum5 != NULL && $teamnum6 != NULL) {
echo "<h2 style='text-align:center'>Summary</h2>";
echo "
<div class='container'>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum1</strong></h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum2</strong></h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum3</strong></h3>
    </div>
</div>
";

echo "
<div class='container'>
    <table class='table table-bordered'>
        <thead>
            <th colspan='2' style='text-align:center'>Auto</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Auto</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Auto</th>
        </thead>
        <tbody>
            <tr>
                <th>Avg KPA</th>
                <td>" . $summary[1]['auto']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[2]['auto']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[3]['auto']['kpa']['avg'] . "</td>
            </tr>
            <tr>
                <th>Max KPA</th>
                <td>" . $summary[1]['auto']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[2]['auto']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[3]['auto']['kpa']['max'] . "</td>
            </tr>
            <tr>
                <th>Avg Gears</th>
                <td>" . $summary[1]['auto']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[2]['auto']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[3]['auto']['gears']['avg'] . "</td>
            </tr>
            <tr>
                <th>Acc Gears</th>
                <td>" . $summary[1]['auto']['gears']['acc']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Acc Gears</th>
                <td>" . $summary[2]['auto']['gears']['acc']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Acc Gears</th>
                <td>" . $summary[3]['auto']['gears']['acc']*100 . "%</td>
            </tr>
        </tbody>
        <thead>
            <th colspan='2' style='text-align:center'>Tele</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Tele</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Tele</th>
        </thead>
        <tbody>
            <tr>
                <th>Avg KPA</th>
                <td>" . $summary[1]['tele']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[2]['tele']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[3]['tele']['kpa']['avg'] . "</td>
            </tr>
            <tr>
                <th>Max KPA</th>
                <td>" . $summary[1]['tele']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[2]['tele']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[3]['tele']['kpa']['max'] . "</td>
            </tr>
            <tr>
                <th>Avg Gears</th>
                <td>" . $summary[1]['tele']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[2]['tele']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[3]['tele']['gears']['avg'] . "</td>
            </tr>
            <tr>
                <th>Max Gears</th>
                <td>" . $summary[1]['tele']['gears']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max Gears</th>
                <td>" . $summary[2]['tele']['gears']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max Gears</th>
                <td>" . $summary[3]['tele']['gears']['max'] . "</td>
            </tr>
            <tr>
                <th>Climb</th>
                <td>" . $summary[1]['tele']['climb']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Climb</th>
                <td>" . $summary[2]['tele']['climb']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Climb</th>
                <td>" . $summary[3]['tele']['climb']*100 . "%</td>
            </tr>
        </tbody>
    </table>
</div>";

echo "
<div class='container'>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum4</strong></h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum5</strong></h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum6</strong></h3>
    </div>
</div>
";

echo "
<div class='container'>
    <table class='table table-bordered'>
        <thead>
            <th colspan='2' style='text-align:center'>Auto</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Auto</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Auto</th>
        </thead>
        <tbody>
            <tr>
                <th>Avg KPA</th>
                <td>" . $summary[4]['auto']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[5]['auto']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[6]['auto']['kpa']['avg'] . "</td>
            </tr>
            <tr>
                <th>Max KPA</th>
                <td>" . $summary[4]['auto']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[5]['auto']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[6]['auto']['kpa']['max'] . "</td>
            </tr>
            <tr>
                <th>Avg Gears</th>
                <td>" . $summary[4]['auto']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[5]['auto']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[6]['auto']['gears']['avg'] . "</td>
            </tr>
            <tr>
                <th>Acc Gears</th>
                <td>" . $summary[4]['auto']['gears']['acc']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Acc Gears</th>
                <td>" . $summary[5]['auto']['gears']['acc']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Acc Gears</th>
                <td>" . $summary[6]['auto']['gears']['acc']*100 . "%</td>
            </tr>
        </tbody>
        <thead>
            <th colspan='2' style='text-align:center'>Tele</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Tele</th>
            <td></td>
            <th colspan='2' style='text-align:center'>Tele</th>
        </thead>
        <tbody>
            <tr>
                <th>Avg KPA</th>
                <td>" . $summary[4]['tele']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[5]['tele']['kpa']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg KPA</th>
                <td>" . $summary[6]['tele']['kpa']['avg'] . "</td>
            </tr>
            <tr>
                <th>Max KPA</th>
                <td>" . $summary[4]['tele']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[5]['tele']['kpa']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max KPA</th>
                <td>" . $summary[6]['tele']['kpa']['max'] . "</td>
            </tr>
            <tr>
                <th>Avg Gears</th>
                <td>" . $summary[4]['tele']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[5]['tele']['gears']['avg'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Avg Gears</th>
                <td>" . $summary[6]['tele']['gears']['avg'] . "</td>
            </tr>
            <tr>
                <th>Max Gears</th>
                <td>" . $summary[4]['tele']['gears']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max Gears</th>
                <td>" . $summary[5]['tele']['gears']['max'] . "</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Max Gears</th>
                <td>" . $summary[6]['tele']['gears']['max'] . "</td>
            </tr>
            <tr>
                <th>Climb</th>
                <td>" . $summary[4]['tele']['climb']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Climb</th>
                <td>" . $summary[5]['tele']['climb']*100 . "%</td>
                <th style='background-color:black; color:black;'>|</th>
                <th>Climb</th>
                <td>" . $summary[6]['tele']['climb']*100 . "%</td>
            </tr>
        </tbody>
    </table>
</div>";

}
function echoTeamTable($teamindex, $teamnum, $SQLresult) {
    
    global $summary;
    
    echo "<h3 style='text-align:center'><u>Data for: $teamnum</u></h3>";

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
    
    $matchTotal=0;
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
mysqli_close($con);
?>
<script>
    //window.print();
</script>