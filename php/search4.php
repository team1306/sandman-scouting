<link href="../css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
<style>
    @media print {
        .printBreak {page-break-after: always;}
    }

</style>
<?php
$limit = $_POST["limit"];
if ($limit <= 0) {
    $limit = NULL;
}

$teamnum1 = $_POST["searchname1"];
$teamnum2 = $_POST["searchname2"];
$teamnum3 = $_POST["searchname3"];
$teamnum4 = $_POST["searchname4"];  //team num goes here
$teamnum5 = $_POST["searchname5"];
$teamnum6 = $_POST["searchname6"];

$con=mysqli_connect("localhost","data","mxwZsnKw5FtD8uX8","sandman");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($limit == NULL) {
$result1 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum1");
$result2 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum2");
$result3 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum3");
$result4 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum4");
$result5 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum5");
$result6 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum6");
}
else {
$result1 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum1 ORDER BY id DESC LIMIT $limit");
$result2 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum2 ORDER BY id DESC LIMIT $limit");
$result3 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum3 ORDER BY id DESC LIMIT $limit");
$result4 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum4 ORDER BY id DESC LIMIT $limit");
$result5 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum5 ORDER BY id DESC LIMIT $limit");
$result6 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum6 ORDER BY id DESC LIMIT $limit");
}

if ($teamnum1 != NULL) {
echo "<h3 style='text-align:center'><u>Data for: $teamnum1</u></h3>";

echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Auto Baseline</th>
<th>Auto Gear</th>
<th>Auto Low Goal</th>
<th>Auto High Goal Acc</th>
<th>Auto High Goal Speed</th>
<th>Tele Gears</th>
<th>Tele Ball Cycles</th>
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
while($row = mysqli_fetch_array($result1))
{
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
    if ($row['autoCap.gear']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
    if ($row['autoCap.lowGoal']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
echo "<td>" . ($row['autoCap.highGoalAccuracy']/4)*100 . "%</td>";
echo "<td>" . ($row['autoCap.highGoalSpeed']/4)*100 . "%</td>";
echo "<td>" . $row['teleCap.gearCycles'] . "</td>";
echo "<td>" . $row['teleCap.ballCycles'] . "</td>";
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

$autoBaselineTotal+=$row['autoCap.passBaseline'];
$autoGearTotal+=$row['autoCap.gear'];
$autoLowGoalTotal+=$row['autoCap.lowGoal'];
$autoHighGoalAccuracyTotal+=($row['autoCap.highGoalAccuracy']/4)*100;
$autoHighGoalSpeedTotal+=($row['autoCap.highGoalSpeed']/4)*100;

$teleGearTotal+=$row['teleCap.gearCycles'];
$teleBallTotal+=$row['teleCap.ballCycles'];
$teleHighGoalAccuracyTotal+=($row['teleCap.highGoalAccuracy']/4)*100;
$teleHighGoalSpeedTotal+=($row['teleCap.highGoalSpeed']/4)*100;
$teleLowGoalAccuracyTotal+=($row['teleCap.lowGoalAccuracy']/4)*100;
$teleLowGoalSpeedTotal+=($row['teleCap.lowGoalSpeed']/4)*100;
$teleClimbTotal+=$row['teleCap.climb'];
}

$autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
$autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);

$teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
$teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
$teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
$teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
$teleGearCalculated = round($teleGearTotal/$matchTotal,2);
$teleBallTotal = round($teleBallTotal/$matchTotal,2);

echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$autoBaselineTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoGearTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoLowGoalTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$autoHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleGearCalculated</strong></td>";
echo "<td><strong>$teleBallTotal</strong></td>";
echo "<td><strong>$teleHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleClimbTotal/$matchTotal</strong></td>";
echo "<td> </td>";
echo "</tr></tfoot>";

echo "</table></div>";
}

$summary[1]['auto']['gears'] = round($autoGearTotal/$matchTotal, 2);
$summary[1]['tele']['gears'] = $teleGearCalculated;
$summary[1]['auto']['high']['acc'] = $autoHighGoalAccuracyCalculated;
$summary[1]['auto']['high']['speed'] = $autoHighGoalSpeedCalculated;
$summary[1]['tele']['high']['acc'] = $teleHighGoalAccuracyCalculated;
$summary[1]['tele']['high']['speed'] = $teleHighGoalSpeedCalculated;

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

//**********************************************************************************
//                          END TEAM 1, START TEAM 2
//**********************************************************************************

if ($teamnum2 != NULL) {
echo "<h3 style='text-align:center'><u>Data for: $teamnum2</u></h3>";

echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Auto Baseline</th>
<th>Auto Gear</th>
<th>Auto Low Goal</th>
<th>Auto High Goal Acc</th>
<th>Auto High Goal Speed</th>
<th>Tele Gears</th>
<th>Tele Ball Cycles</th>
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
while($row = mysqli_fetch_array($result2))
{
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
    if ($row['autoCap.gear']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
    if ($row['autoCap.lowGoal']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
echo "<td>" . ($row['autoCap.highGoalAccuracy']/4)*100 . "%</td>";
echo "<td>" . ($row['autoCap.highGoalSpeed']/4)*100 . "%</td>";
echo "<td>" . $row['teleCap.gearCycles'] . "</td>";
echo "<td>" . $row['teleCap.ballCycles'] . "</td>";
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

$autoBaselineTotal+=$row['autoCap.passBaseline'];
$autoGearTotal+=$row['autoCap.gear'];
$autoLowGoalTotal+=$row['autoCap.lowGoal'];
$autoHighGoalAccuracyTotal+=($row['autoCap.highGoalAccuracy']/4)*100;
$autoHighGoalSpeedTotal+=($row['autoCap.highGoalSpeed']/4)*100;

$teleGearTotal+=$row['teleCap.gearCycles'];
$teleBallTotal+=$row['teleCap.ballCycles'];
$teleHighGoalAccuracyTotal+=($row['teleCap.highGoalAccuracy']/4)*100;
$teleHighGoalSpeedTotal+=($row['teleCap.highGoalSpeed']/4)*100;
$teleLowGoalAccuracyTotal+=($row['teleCap.lowGoalAccuracy']/4)*100;
$teleLowGoalSpeedTotal+=($row['teleCap.lowGoalSpeed']/4)*100;
$teleClimbTotal+=$row['teleCap.climb'];
}

$autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
$autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);

$teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
$teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
$teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
$teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
$teleGearCalculated = round($teleGearTotal/$matchTotal,2);
$teleBallTotal = round($teleBallTotal/$matchTotal,2);

echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$autoBaselineTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoGearTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoLowGoalTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$autoHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleGearCalculated</strong></td>";
echo "<td><strong>$teleBallTotal</strong></td>";
echo "<td><strong>$teleHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleClimbTotal/$matchTotal</strong></td>";
echo "<td> </td>";
echo "</tr></tfoot>";

echo "</table></div>";
}

$summary[2]['auto']['gears'] = round($autoGearTotal/$matchTotal, 2);
$summary[2]['tele']['gears'] = $teleGearCalculated;
$summary[2]['auto']['high']['acc'] = $autoHighGoalAccuracyCalculated;
$summary[2]['auto']['high']['speed'] = $autoHighGoalSpeedCalculated;
$summary[2]['tele']['high']['acc'] = $teleHighGoalAccuracyCalculated;
$summary[2]['tele']['high']['speed'] = $teleHighGoalSpeedCalculated;

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

//**********************************************************************************
//                          END TEAM 2, START TEAM 3
//**********************************************************************************

if ($teamnum3 != NULL) {
echo "<h3 style='text-align:center'><u>Data for: $teamnum3</u></h3>";

echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Auto Baseline</th>
<th>Auto Gear</th>
<th>Auto Low Goal</th>
<th>Auto High Goal Acc</th>
<th>Auto High Goal Speed</th>
<th>Tele Gears</th>
<th>Tele Ball Cycles</th>
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
while($row = mysqli_fetch_array($result3))
{
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
    if ($row['autoCap.gear']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
    if ($row['autoCap.lowGoal']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
echo "<td>" . ($row['autoCap.highGoalAccuracy']/4)*100 . "%</td>";
echo "<td>" . ($row['autoCap.highGoalSpeed']/4)*100 . "%</td>";
echo "<td>" . $row['teleCap.gearCycles'] . "</td>";
echo "<td>" . $row['teleCap.ballCycles'] . "</td>";
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

$autoBaselineTotal+=$row['autoCap.passBaseline'];
$autoGearTotal+=$row['autoCap.gear'];
$autoLowGoalTotal+=$row['autoCap.lowGoal'];
$autoHighGoalAccuracyTotal+=($row['autoCap.highGoalAccuracy']/4)*100;
$autoHighGoalSpeedTotal+=($row['autoCap.highGoalSpeed']/4)*100;

$teleGearTotal+=$row['teleCap.gearCycles'];
$teleBallTotal+=$row['teleCap.ballCycles'];
$teleHighGoalAccuracyTotal+=($row['teleCap.highGoalAccuracy']/4)*100;
$teleHighGoalSpeedTotal+=($row['teleCap.highGoalSpeed']/4)*100;
$teleLowGoalAccuracyTotal+=($row['teleCap.lowGoalAccuracy']/4)*100;
$teleLowGoalSpeedTotal+=($row['teleCap.lowGoalSpeed']/4)*100;
$teleClimbTotal+=$row['teleCap.climb'];
}

$autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
$autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);

$teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
$teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
$teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
$teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
$teleGearCalculated = round($teleGearTotal/$matchTotal,2);
$teleBallTotal = round($teleBallTotal/$matchTotal,2);

echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$autoBaselineTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoGearTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoLowGoalTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$autoHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleGearCalculated</strong></td>";
echo "<td><strong>$teleBallTotal</strong></td>";
echo "<td><strong>$teleHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleClimbTotal/$matchTotal</strong></td>";
echo "<td> </td>";
echo "</tr></tfoot>";

echo "</table></div>";
}

$summary[3]['auto']['gears'] = round($autoGearTotal/$matchTotal, 2);
$summary[3]['tele']['gears'] = $teleGearCalculated;
$summary[3]['auto']['high']['acc'] = $autoHighGoalAccuracyCalculated;
$summary[3]['auto']['high']['speed'] = $autoHighGoalSpeedCalculated;
$summary[3]['tele']['high']['acc'] = $teleHighGoalAccuracyCalculated;
$summary[3]['tele']['high']['speed'] = $teleHighGoalSpeedCalculated;

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

//**********************************************************************************
//                          END TEAM 1-3, START TEAM 1-3 TOTALS
//**********************************************************************************

// if ($teamnum1 && $teamnum2 && $teamnum3 != NULL) {
// $portcullisTotalTotalFinal = $portcullisTotalTotalFinal + $portcullisTotalFinal;
// $chevalTotalTotalFinal = $chevalTotalTotalFinal + $chevalTotalFinal;
// $moatTotalTotalFinal = $moatTotalTotalFinal + $moatTotalFinal;
// $rampartsTotalTotalFinal = $rampartsTotalTotalFinal + $rampartsTotalFinal;
// $drawbridgeTotalTotalFinal = $drawbridgeTotalTotalFinal + $drawbridgeTotalFinal;
// $sallyPortTotalTotalFinal = $sallyPortTotalTotalFinal + $sallyPortTotalFinal;
// $rockWallTotalTotalFinal = $rockWallTotalTotalFinal + $rockWallTotalFinal;
// $roughTerrainTotalTotalFinal = $roughTerrainTotalTotalFinal + $roughTerrainTotalFinal;-
// $lowBarTotalTotalFinal = $lowBarTotalTotalFinal + $lowBarTotalFinal;

// $aTotal = $portcullisTotalTotalFinal + $chevalTotalTotalFinal;
// $bTotal = $moatTotalTotalFinal + $rampartsTotalTotalFinal;
// $cTotal = $drawbridgeTotalTotalFinal + $sallyPortTotalTotalFinal;
// $dTotal = $rockWallTotalTotalFinal + $roughTerrainTotalTotalFinal;
// if ($aTotal == 0) {
//     $aTotal = 1;
// }
// if ($bTotal == 0) {
//     $bTotal = 1;
// }
// if ($cTotal == 0) {
//     $cTotal = 1;
// }
// if ($dTotal == 0) {
//     $dTotal = 1;
// }
// $a1 = ($portcullisTotalTotalFinal/$aTotal);
// $a2 = ($chevalTotalTotalFinal/$aTotal);
// $b1 = ($moatTotalTotalFinal/$bTotal);
// $b2 = ($rampartsTotalTotalFinal/$bTotal);
// $c1 = ($drawbridgeTotalTotalFinal/$cTotal);
// $c2 = ($sallyPortTotalTotalFinal/$cTotal);
// $d1 = ($rockWallTotalTotalFinal/$dTotal);
// $d2 = ($roughTerrainTotalTotalFinal/$dTotal);

// echo "<style>";
// if ($portcullisTotalTotalFinal < $chevalTotalTotalFinal) {
//     echo ".portcullis {
//         background-color:rgba(255,0,0,$a2);
//     }";
// }
// else if ($portcullisTotalTotalFinal > $chevalTotalTotalFinal) {
//     echo ".cheval {
//         background-color:rgba(255,0,0,$a1);
//     }";
// }

// if ($moatTotalTotalFinal < $rampartsTotalTotalFinal) {
//     echo ".moat {
//         background-color:rgba(255,0,0,$b2);
//     }";
// }
// else if ($moatTotalTotalFinal > $rampartsTotalTotalFinal) {
//     echo ".ramparts {
//         background-color:rgba(255,0,0,$b1);
//     }";
// }

// if ($drawbridgeTotalTotalFinal < $sallyPortTotalTotalFinal) {
//     echo ".drawbridge {
//         background-color:rgba(255,0,0,$c2);
//     }";
// }
// else if ($drawbridgeTotalTotalFinal > $sallyPortTotalTotalFinal) {
//     echo ".sallyPort {
//         background-color:rgba(255,0,0,$c1);
//     }";
// }

// if ($rockWallTotalTotalFinal < $roughTerrainTotalTotalFinal) {
//     echo ".rockWall {
//         background-color:rgba(255,0,0,$d2);
//     }";
// }
// else if ($rockWallTotalTotalFinal > $roughTerrainTotalTotalFinal) {
//     echo ".roughTerrain {
//         background-color:rgba(255,0,0,$d1);
//     }";
// }
// echo "</style>";

// echo "<div class='container'><table class='table table-bordered'>
// <thead>
// <tr>
// <th class='portcullis'>Portcullis</th>
// <th class='cheval'>Cheval</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='moat'>Moat</th>
// <th class='ramparts'>Ramparts</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='drawbridge'>Drawbridge</th>
// <th class='sallyPort'>Sally Port</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='rockWall'>Rock Wall</th>
// <th class='roughTerrain'>Rough Terrain</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='lowBar'>Low Bar</th>
// </tr>
// </thead>
// <tbody>
// <tr>";
// echo "<td><strong>$portcullisTotalTotalFinal</strong></td>";
// echo "<td><strong>$chevalTotalTotalFinal</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$moatTotalTotalFinal</strong></td>";
// echo "<td><strong>$rampartsTotalTotalFinal</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$drawbridgeTotalTotalFinal</strong></td>";
// echo "<td><strong>$sallyPortTotalTotalFinal</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$rockWallTotalTotalFinal</strong></td>";
// echo "<td><strong>$roughTerrainTotalTotalFinal</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$lowBarTotalTotalFinal</strong></td>";
// echo "</tr>";
// echo "</table></div>";
// }
// echo "<div class='printBreak'></div>";
//**********************************************************************************
//                          END TEAMS 1-3 TOTALS, START TEAMS 4-6
//**********************************************************************************

echo "<div class='printBreak'></div>";

if ($teamnum4 != NULL) {
echo "<h3 style='text-align:center'><u>Data for: $teamnum4</u></h3>";

echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Auto Baseline</th>
<th>Auto Gear</th>
<th>Auto Low Goal</th>
<th>Auto High Goal Acc</th>
<th>Auto High Goal Speed</th>
<th>Tele Gears</th>
<th>Tele Ball Cycles</th>
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
while($row = mysqli_fetch_array($result4))
{
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
    if ($row['autoCap.gear']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
    if ($row['autoCap.lowGoal']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
echo "<td>" . ($row['autoCap.highGoalAccuracy']/4)*100 . "%</td>";
echo "<td>" . ($row['autoCap.highGoalSpeed']/4)*100 . "%</td>";
echo "<td>" . $row['teleCap.gearCycles'] . "</td>";
echo "<td>" . $row['teleCap.ballCycles'] . "</td>";
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

$autoBaselineTotal+=$row['autoCap.passBaseline'];
$autoGearTotal+=$row['autoCap.gear'];
$autoLowGoalTotal+=$row['autoCap.lowGoal'];
$autoHighGoalAccuracyTotal+=($row['autoCap.highGoalAccuracy']/4)*100;
$autoHighGoalSpeedTotal+=($row['autoCap.highGoalSpeed']/4)*100;

$teleGearTotal+=$row['teleCap.gearCycles'];
$teleBallTotal+=$row['teleCap.ballCycles'];
$teleHighGoalAccuracyTotal+=($row['teleCap.highGoalAccuracy']/4)*100;
$teleHighGoalSpeedTotal+=($row['teleCap.highGoalSpeed']/4)*100;
$teleLowGoalAccuracyTotal+=($row['teleCap.lowGoalAccuracy']/4)*100;
$teleLowGoalSpeedTotal+=($row['teleCap.lowGoalSpeed']/4)*100;
$teleClimbTotal+=$row['teleCap.climb'];
}

$autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
$autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);

$teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
$teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
$teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
$teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
$teleGearCalculated = round($teleGearTotal/$matchTotal,2);
$teleBallTotal = round($teleBallTotal/$matchTotal,2);

echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$autoBaselineTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoGearTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoLowGoalTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$autoHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleGearCalculated</strong></td>";
echo "<td><strong>$teleBallTotal</strong></td>";
echo "<td><strong>$teleHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleClimbTotal/$matchTotal</strong></td>";
echo "<td> </td>";
echo "</tr></tfoot>";

echo "</table></div>";
}

$summary[4]['auto']['gears'] = round($autoGearTotal/$matchTotal, 2);
$summary[4]['tele']['gears'] = $teleGearCalculated;
$summary[4]['auto']['high']['acc'] = $autoHighGoalAccuracyCalculated;
$summary[4]['auto']['high']['speed'] = $autoHighGoalSpeedCalculated;
$summary[4]['tele']['high']['acc'] = $teleHighGoalAccuracyCalculated;
$summary[4]['tele']['high']['speed'] = $teleHighGoalSpeedCalculated;

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

//**********************************************************************************
//                          END TEAM 4, START TEAM 5
//**********************************************************************************

if ($teamnum5 != NULL) {
echo "<h3 style='text-align:center'><u>Data for: $teamnum5</u></h3>";

echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Auto Baseline</th>
<th>Auto Gear</th>
<th>Auto Low Goal</th>
<th>Auto High Goal Acc</th>
<th>Auto High Goal Speed</th>
<th>Tele Gears</th>
<th>Tele Ball Cycles</th>
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
while($row = mysqli_fetch_array($result5))
{
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
    if ($row['autoCap.gear']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
    if ($row['autoCap.lowGoal']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
echo "<td>" . ($row['autoCap.highGoalAccuracy']/4)*100 . "%</td>";
echo "<td>" . ($row['autoCap.highGoalSpeed']/4)*100 . "%</td>";
echo "<td>" . $row['teleCap.gearCycles'] . "</td>";
echo "<td>" . $row['teleCap.ballCycles'] . "</td>";
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

$autoBaselineTotal+=$row['autoCap.passBaseline'];
$autoGearTotal+=$row['autoCap.gear'];
$autoLowGoalTotal+=$row['autoCap.lowGoal'];
$autoHighGoalAccuracyTotal+=($row['autoCap.highGoalAccuracy']/4)*100;
$autoHighGoalSpeedTotal+=($row['autoCap.highGoalSpeed']/4)*100;

$teleGearTotal+=$row['teleCap.gearCycles'];
$teleBallTotal+=$row['teleCap.ballCycles'];
$teleHighGoalAccuracyTotal+=($row['teleCap.highGoalAccuracy']/4)*100;
$teleHighGoalSpeedTotal+=($row['teleCap.highGoalSpeed']/4)*100;
$teleLowGoalAccuracyTotal+=($row['teleCap.lowGoalAccuracy']/4)*100;
$teleLowGoalSpeedTotal+=($row['teleCap.lowGoalSpeed']/4)*100;
$teleClimbTotal+=$row['teleCap.climb'];
}

$autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
$autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);

$teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
$teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
$teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
$teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
$teleGearCalculated = round($teleGearTotal/$matchTotal,2);
$teleBallTotal = round($teleBallTotal/$matchTotal,2);

echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$autoBaselineTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoGearTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoLowGoalTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$autoHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleGearCalculated</strong></td>";
echo "<td><strong>$teleBallTotal</strong></td>";
echo "<td><strong>$teleHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleClimbTotal/$matchTotal</strong></td>";
echo "<td> </td>";
echo "</tr></tfoot>";

echo "</table></div>";
}

$summary[5]['auto']['gears'] = round($autoGearTotal/$matchTotal, 2);
$summary[5]['tele']['gears'] = $teleGearCalculated;
$summary[5]['auto']['high']['acc'] = $autoHighGoalAccuracyCalculated;
$summary[5]['auto']['high']['speed'] = $autoHighGoalSpeedCalculated;
$summary[5]['tele']['high']['acc'] = $teleHighGoalAccuracyCalculated;
$summary[5]['tele']['high']['speed'] = $teleHighGoalSpeedCalculated;

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

//**********************************************************************************
//                          END TEAM 5, START TEAM 6
//**********************************************************************************

if ($teamnum6 != NULL) {
echo "<h3 style='text-align:center'><u>Data for: $teamnum6</u></h3>";

echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Auto Baseline</th>
<th>Auto Gear</th>
<th>Auto Low Goal</th>
<th>Auto High Goal Acc</th>
<th>Auto High Goal Speed</th>
<th>Tele Gears</th>
<th>Tele Ball Cycles</th>
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
while($row = mysqli_fetch_array($result6))
{
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
    if ($row['autoCap.gear']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
    if ($row['autoCap.lowGoal']) {
        echo "<td> <i class='fa fa-check' aria-hidden='true'></i> </td>";
    }
    else {
        echo "<td> <i class='fa fa-times' aria-hidden='true'></i> </td>";
    }
echo "<td>" . ($row['autoCap.highGoalAccuracy']/4)*100 . "%</td>";
echo "<td>" . ($row['autoCap.highGoalSpeed']/4)*100 . "%</td>";
echo "<td>" . $row['teleCap.gearCycles'] . "</td>";
echo "<td>" . $row['teleCap.ballCycles'] . "</td>";
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

$autoBaselineTotal+=$row['autoCap.passBaseline'];
$autoGearTotal+=$row['autoCap.gear'];
$autoLowGoalTotal+=$row['autoCap.lowGoal'];
$autoHighGoalAccuracyTotal+=($row['autoCap.highGoalAccuracy']/4)*100;
$autoHighGoalSpeedTotal+=($row['autoCap.highGoalSpeed']/4)*100;

$teleGearTotal+=$row['teleCap.gearCycles'];
$teleBallTotal+=$row['teleCap.ballCycles'];
$teleHighGoalAccuracyTotal+=($row['teleCap.highGoalAccuracy']/4)*100;
$teleHighGoalSpeedTotal+=($row['teleCap.highGoalSpeed']/4)*100;
$teleLowGoalAccuracyTotal+=($row['teleCap.lowGoalAccuracy']/4)*100;
$teleLowGoalSpeedTotal+=($row['teleCap.lowGoalSpeed']/4)*100;
$teleClimbTotal+=$row['teleCap.climb'];
}

$autoHighGoalAccuracyCalculated = round($autoHighGoalAccuracyTotal/$matchTotal,2);
$autoHighGoalSpeedCalculated = round($autoHighGoalSpeedTotal/$matchTotal,2);

$teleHighGoalAccuracyCalculated = round($teleHighGoalAccuracyTotal/$matchTotal,2);
$teleHighGoalSpeedCalculated = round($teleHighGoalSpeedTotal/$matchTotal,2);
$teleLowGoalAccuracyCalculated = round($teleLowGoalAccuracyTotal/$matchTotal,2);
$teleLowGoalSpeedCalculated = round($teleLowGoalSpeedTotal/$matchTotal,2);
$teleGearCalculated = round($teleGearTotal/$matchTotal,2);
$teleBallTotal = round($teleBallTotal/$matchTotal,2);

echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$autoBaselineTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoGearTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoLowGoalTotal/$matchTotal</strong></td>";
echo "<td><strong>$autoHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$autoHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleGearCalculated</strong></td>";
echo "<td><strong>$teleBallTotal</strong></td>";
echo "<td><strong>$teleHighGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleHighGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalAccuracyCalculated%</strong></td>";
echo "<td><strong>$teleLowGoalSpeedCalculated%</strong></td>";
echo "<td><strong>$teleClimbTotal/$matchTotal</strong></td>";
echo "<td> </td>";
echo "</tr></tfoot>";

echo "</table></div>";
}

$summary[6]['auto']['gears'] = round($autoGearTotal/$matchTotal, 2);
$summary[6]['tele']['gears'] = $teleGearCalculated;
$summary[6]['auto']['high']['acc'] = $autoHighGoalAccuracyCalculated;
$summary[6]['auto']['high']['speed'] = $autoHighGoalSpeedCalculated;
$summary[6]['tele']['high']['acc'] = $teleHighGoalAccuracyCalculated;
$summary[6]['tele']['high']['speed'] = $teleHighGoalSpeedCalculated;

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

//**********************************************************************************
//                          END TEAM 4-6, START TEAM 4-6 TOTALS
//**********************************************************************************

// if ($teamnum4 && $teamnum5 && $teamnum6 != NULL) {
// $portcullisTotalTotalFinal2 = $portcullisTotalTotalFinal2 + $portcullisTotalFinal;
// $chevalTotalTotalFinal2 = $chevalTotalTotalFinal2 + $chevalTotalFinal;
// $moatTotalTotalFinal2 = $moatTotalTotalFinal2 + $moatTotalFinal;
// $rampartsTotalTotalFinal2 = $rampartsTotalTotalFinal2 + $rampartsTotalFinal;
// $drawbridgeTotalTotalFinal2 = $drawbridgeTotalTotalFinal2 + $drawbridgeTotalFinal;
// $sallyPortTotalTotalFinal2 = $sallyPortTotalTotalFinal2 + $sallyPortTotalFinal;
// $rockWallTotalTotalFinal2 = $rockWallTotalTotalFinal2 + $rockWallTotalFinal;
// $roughTerrainTotalTotalFinal2 = $roughTerrainTotalTotalFinal2 + $roughTerrainTotalFinal;
// $lowBarTotalTotalFinal2 = $lowBarTotalTotalFinal2 + $lowBarTotalFinal;

// $aTotal = $portcullisTotalTotalFinal2 + $chevalTotalTotalFinal2;
// $bTotal = $moatTotalTotalFinal2 + $rampartsTotalTotalFinal2;
// $cTotal = $drawbridgeTotalTotalFinal2 + $sallyPortTotalTotalFinal2;
// $dTotal = $rockWallTotalTotalFinal2 + $roughTerrainTotalTotalFinal2;

// if ($aTotal == 0) {
//     $aTotal = 1;
// }
// if ($bTotal == 0) {
//     $bTotal = 1;
// }
// if ($cTotal == 0) {
//     $cTotal = 1;
// }
// if ($dTotal == 0) {
//     $dTotal = 1;
// }

// $a1 = ($portcullisTotalTotalFinal2/$aTotal);
// $a2 = ($chevalTotalTotalFinal2/$aTotal);
// $b1 = ($moatTotalTotalFinal2/$bTotal);
// $b2 = ($rampartsTotalTotalFinal2/$bTotal);
// $c1 = ($drawbridgeTotalTotalFinal2/$cTotal);
// $c2 = ($sallyPortTotalTotalFinal2/$cTotal);
// $d1 = ($rockWallTotalTotalFinal2/$dTotal);
// $d2 = ($roughTerrainTotalTotalFinal2/$dTotal);

// echo "<style>";
// if ($portcullisTotalTotalFinal2 < $chevalTotalTotalFinal2) {
//     echo ".portcullis2 {
//         background-color:rgba(255,0,0,$a2);
//     }";
// }
// else if ($portcullisTotalTotalFinal2 > $chevalTotalTotalFinal2) {
//     echo ".cheval2 {
//         background-color:rgba(255,0,0,$a1);
//     }";
// }

// if ($moatTotalTotalFinal2 < $rampartsTotalTotalFinal2) {
//     echo ".moat2 {
//         background-color:rgba(255,0,0,$b2);
//     }";
// }
// else if ($moatTotalTotalFinal2 > $rampartsTotalTotalFinal2) {
//     echo ".ramparts2 {
//         background-color:rgba(255,0,0,$b1);
//     }";
// }
// if ($drawbridgeTotalTotalFinal2 < $sallyPortTotalTotalFinal2) {
//     echo ".drawbridge2 {
//         background-color:rgba(255,0,0,$c2);
//     }";
// }
// else if ($drawbridgeTotalTotalFinal2 > $sallyPortTotalTotalFinal2) {
//     echo ".sallyPort2 {
//         background-color:rgba(255,0,0,$c1);
//     }";
// }
// if ($rockWallTotalTotalFinal2 < $roughTerrainTotalTotalFinal2) {
//     echo ".rockWall2 {
//         background-color:rgba(255,0,0,$d2);
//     }";
// }
// else if ($rockWallTotalTotalFinal2 > $roughTerrainTotalTotalFinal2) {
//     echo ".roughTerrain2 {
//         background-color:rgba(255,0,0,$d1);
//     }";
// }
// echo "</style>";

// echo "<div class='container'><table class='table table-bordered'>
// <thead>
// <tr>
// <th class='portcullis2'>Portcullis</th>
// <th class='cheval2'>Cheval</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='moat2'>Moat</th>
// <th class='ramparts2'>Ramparts</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='drawbridge2'>Drawbridge</th>
// <th class='sallyPort2'>Sally Port</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='rockWall2'>Rock Wall</th>
// <th class='roughTerrain2'>Rough Terrain</th>
// <th style='background-color:black; color:black;'>|</th>
// <th class='lowBar2'>Low Bar</th>
// </tr>
// </thead>
// <tbody>
// <tr>";
// echo "<td><strong>$portcullisTotalTotalFinal2</strong></td>";
// echo "<td><strong>$chevalTotalTotalFinal2</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$moatTotalTotalFinal2</strong></td>";
// echo "<td><strong>$rampartsTotalTotalFinal2</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$drawbridgeTotalTotalFinal2</strong></td>";
// echo "<td><strong>$sallyPortTotalTotalFinal2</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$rockWallTotalTotalFinal2</strong></td>";
// echo "<td><strong>$roughTerrainTotalTotalFinal2</strong></td>";
// echo "<th style='background-color:black; color:black;'>|</th>";
// echo "<td><strong>$lowBarTotalTotalFinal2</strong></td>";
// echo "</tr>";
// echo "</table></div>";
// }

//echo "$teamnum1, $teamnum2, $teamnum3, $teamnum4, $teamnum5, $teamnum6";
if ($teamnum1 != NULL && $teamnum2 != NULL && $teamnum3 != NULL && $teamnum4 != NULL && $teamnum5 != NULL && $teamnum6 != NULL) {
    if ($team1Entry == NULL) {
        $team1D1 = "No Data";
        $team1D2 = "No Data";
    }
    if ($team2Entry == NULL) {
        $team2D1 = "No Data";
        $team2D2 = "No Data";
    }
    if ($team3Entry == NULL) {
        $team3D1 = "No Data";
        $team3D2 = "No Data";
    }
echo "<h2 style='text-align:center'>Summary (AutoGears | TeleGears)</h2>";
echo "
<div class='container'>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum1</strong> (" . $summary[1]['auto']['gears'] . " | " . $summary[1]['tele']['gears'] . ")</h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum2</strong> (" . $summary[2]['auto']['gears'] . " | " . $summary[2]['tele']['gears'] . ")</h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum3</strong> (" . $summary[3]['auto']['gears'] . " | " . $summary[3]['tele']['gears'] . ")</h3>
    </div>
</div>
";

$team1D1 = $summary[1]['auto']['high']['acc'] . " | " . $summary[1]['tele']['high']['acc'];
$team1D2 = $summary[1]['auto']['high']['speed'] . " | " . $summary[1]['tele']['high']['speed'];

$team2D1 = $summary[2]['auto']['high']['acc'] . " | " . $summary[2]['tele']['high']['acc'];
$team2D2 = $summary[2]['auto']['high']['speed'] . " | " . $summary[2]['tele']['high']['speed'];

$team3D1 = $summary[2]['auto']['high']['acc'] . " | " . $summary[2]['tele']['high']['acc'];
$team3D2 = $summary[2]['auto']['high']['speed'] . " | " . $summary[2]['tele']['high']['speed'];


$team4D1 = $summary[4]['auto']['high']['acc'] . " | " . $summary[4]['tele']['high']['acc'];
$team4D2 = $summary[4]['auto']['high']['speed'] . " | " . $summary[4]['tele']['high']['speed'];

$team5D1 = $summary[5]['auto']['high']['acc'] . " | " . $summary[5]['tele']['high']['acc'];
$team5D2 = $summary[5]['auto']['high']['speed'] . " | " . $summary[5]['tele']['high']['speed'];

$team6D1 = $summary[6]['auto']['high']['acc'] . " | " . $summary[6]['tele']['high']['acc'];
$team6D2 = $summary[6]['auto']['high']['speed'] . " | " . $summary[6]['tele']['high']['speed'];

echo "
<div class='container'>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>High Goal Acc</th>
                <th>High Goal Speed</th>
                <th style='background-color:black; color:black;'>|</th>
                <th>High Goal Acc</th>
                <th>High Goal Speed</th>
                <th style='background-color:black; color:black;'>|</th>
                <th>High Goal Acc</th>
                <th>High Goal Speed</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>$team1D1</td>
                <td>$team1D2</td>
                <th style='background-color:black; color:black;'>|</th>
                <td>$team2D1</td>
                <td>$team2D2</td>
                <th style='background-color:black; color:black;'>|</th>
                <td>$team3D1</td>
                <td>$team3D2</td>
            </tr>
        </tbody>
    </table>
</div>
        ";
        
echo "
<div class='container'>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum4</strong> (" . $summary[4]['auto']['gears'] . " | " . $summary[4]['tele']['gears'] . ")</h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum5</strong> (" . $summary[5]['auto']['gears'] . " | " . $summary[5]['tele']['gears'] . ")</h3>
    </div>
    <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4'>
        <h3 style='text-align:center'><strong>$teamnum6</strong> (" . $summary[6]['auto']['gears'] . " | " . $summary[6]['tele']['gears'] . ")</h3>
    </div>
</div>
";

echo "
<div class='container'>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>High Goal Acc</th>
                <th>High Goal Speed</th>
                <th style='background-color:black; color:black;'>|</th>
                <th>High Goal Acc</th>
                <th>High Goal Speed</th>
                <th style='background-color:black; color:black;'>|</th>
                <th>High Goal Acc</th>
                <th>High Goal Speed</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>$team4D1</td>
                <td>$team4D2</td>
                <th style='background-color:black; color:black;'>|</th>
                <td>$team5D1</td>
                <td>$team5D2</td>
                <th style='background-color:black; color:black;'>|</th>
                <td>$team6D1</td>
                <td>$team6D2</td>
            </tr>
        </tbody>
    </table>
</div>
        ";


/*
echo "<h3 style='text-align:center'>Our Alliance: $teamnum4, $teamnum5, $teamnum6</h3>";
echo "<div class='container'><table class='table table-bordered'>
<thead>
<tr>
<th class='portcullis2'>Portcullis</th>
<th class='cheval2'>Cheval</th>
<th style='background-color:black; color:black;'>|</th>
<th class='moat2'>Moat</th>
<th class='ramparts2'>Ramparts</th>
<th style='background-color:black; color:black;'>|</th>
<th class='drawbridge2'>Drawbridge</th>
<th class='sallyPort2'>Sally Port</th>
<th style='background-color:black; color:black;'>|</th>
<th class='rockWall2'>Rock Wall</th>
<th class='roughTerrain2'>Rough Terrain</th>
<th style='background-color:black; color:black;'>|</th>
<th class='lowBar2'>Low Bar</th>
</tr>
</thead>
<tbody>
<tr>";
echo "<td><strong>$portcullisTotalTotalFinal2</strong></td>";
echo "<td><strong>$chevalTotalTotalFinal2</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$moatTotalTotalFinal2</strong></td>";
echo "<td><strong>$rampartsTotalTotalFinal2</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$drawbridgeTotalTotalFinal2</strong></td>";
echo "<td><strong>$sallyPortTotalTotalFinal2</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$rockWallTotalTotalFinal2</strong></td>";
echo "<td><strong>$roughTerrainTotalTotalFinal2</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$lowBarTotalTotalFinal2</strong></td>";
echo "</tr>";
echo "</table></div>";*/
}

mysqli_close($con);
?>
<script>
    //window.print();
</script>