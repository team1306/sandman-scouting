<link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
<?php
include 'TBAdata.php';

$matchNum = $_GET['matchnum'];
$matchSet = $_GET['set'];

$teamnum[0] = getTeam($GLOBALS['TBA']['matchType'], $matchSet, $matchNum, 1, 0);
$teamnum[1] = getTeam($GLOBALS['TBA']['matchType'], $matchSet, $matchNum, 1, 1);
$teamnum[2] = getTeam($GLOBALS['TBA']['matchType'], $matchSet, $matchNum, 1, 2);
$teamnum[3] = getTeam($GLOBALS['TBA']['matchType'], $matchSet, $matchNum, 2, 0);
$teamnum[4] = getTeam($GLOBALS['TBA']['matchType'], $matchSet, $matchNum, 2, 1);
$teamnum[5] = getTeam($GLOBALS['TBA']['matchType'], $matchSet, $matchNum, 2, 2);

$msqlcon = mysqli_connect("localhost","data","mxwZsnKw5FtD8uX8","sandman");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//echo "Command: SELECT * FROM `matchdata` WHERE matchNum = " . $matchNum . " AND teamNum = " . "$teamnum[1]";
$result[0] = mysqli_query($msqlcon, "SELECT * FROM `matchdata` WHERE matchNum = $matchNum AND teamNum = $teamnum[0]");//R1
$result[1] = mysqli_query($msqlcon, "SELECT * FROM `matchdata` WHERE matchNum = $matchNum AND teamNum = $teamnum[1]");//R2
$result[2] = mysqli_query($msqlcon, "SELECT * FROM `matchdata` WHERE matchNum = $matchNum AND teamNum = $teamnum[2]");//R3
$result2[0] = mysqli_query($msqlcon, "SELECT * FROM `matchdata` WHERE matchNum = $matchNum AND teamNum = $teamnum[3]");//B1
$result2[1] = mysqli_query($msqlcon, "SELECT * FROM `matchdata` WHERE matchNum = $matchNum AND teamNum = $teamnum[4]");//B2
$result2[2] = mysqli_query($msqlcon, "SELECT * FROM `matchdata` WHERE matchNum = $matchNum AND teamNum = $teamnum[5]");//B3

echo "<h3 style='text-align:center'><b>WIP</b></h3><br>
      <h1 style='text-align:center'><u>Collected Data</u></h1><br>
      <h2 style='text-align:center'><u>Blue Alliance</u></h1><br>
      <div class='container'>
      <table class='table table-striped'>
      <thead>
      <tr>
      <th>Team</th>
      <th>Auto Gears</th>
      <th>Auto Baseline</th>
      <th>Auto kPa</th>
      <th>Teleop Gears</th>
      <th>Teleop kPa</th>
      <th>Climb</th>
      </tr>
      </thead>
      <tbody>";
      teamTable($result);
// foreach($result as $key => $value){
//     if ($value == NULL){
//         echo "<tr><td>No data</td></tr>";
//         continue;
//     }
//     $row = mysqli_fetch_array($value);
    
//     echo "<tr>
//           <td>" . $teamnum[$key] . "</td>
//           <td>" . checkX($row['autoCap.gearSuccess']) . "</td>
//           <td>" . checkX($row['autoCap.passBaseline']) . "</td>
//           <td>" . $row['autoCap.KPA'] . "</td>
//           <td>" . $row['teleCap.gearSuccess'] . "</td>
//           <td>" . $row['teleCap.KPA'] . "</td>
//           <td>" . checkX($row['teleCap.climb']) . "</td>
//           </tr>";
          
// }
echo "</tbody>
      </table>";
summary($result);
echo "</div>";


function checkX($bool){
    if ($bool) {
        return "<i class='fa fa-check' aria-hidden='true'></i>";
    }else {
        return "<i class='fa fa-times' aria-hidden='true'></i>";
    }
}

function teamTable($rs){
    foreach($rs as $key => $value){
    if ($value == NULL){
        echo "<tr><td>No data</td></tr>";
        continue;
    }
    $row = mysqli_fetch_array($value);
    
    echo "<tr>
          <td>" . $teamnum[$key] . "</td>
          <td>" . checkX($row['autoCap.gearSuccess']) . "</td>
          <td>" . checkX($row['autoCap.passBaseline']) . "</td>
          <td>" . $row['autoCap.KPA'] . "</td>
          <td>" . $row['teleCap.gearSuccess'] . "</td>
          <td>" . $row['teleCap.KPA'] . "</td>
          <td>" . checkX($row['teleCap.climb']) . "</td>
          </tr>";
          
}
}
function summary($rs){
    echo "<h3 style = 'text-align:center'>Team Summary</h3><br>
    <table class = 'table table-bordered'>
    <thead>
    <tr>
    <th>Auto Gears</th>
    <th>Auto Baseline</th>
    <th>Auto kPa</th>
    <th>Teleop Gears</th>
    <th>Teleop kPa</th>
    <th>Climb</th>
    </tr>
    </thead>
    <tbody>";
    
    $autoGears = 0;
    $autoBaseline = 0;
    $autokPa = 0;
    
    $teleGears = 0;
    $telekPa = 0;
    $climb = 0;
    
    foreach($rs as $key => $value){
        if ($value == NULL){
            continue;
        }
        $r = mysqli_fetch_array($value);
        $autoGears += $r['autoCap.gearSuccess'];
        echo "autoGears = " . $r['autoCap.gearSuccess'] . ", ";
        $autoBaseline += $r['autoCap.passBaseline'];
        $autokPa += $r['autoCap.KPA'];
        
        $teleGears += $r['teleCap.gearSuccess'];
        $telekPa += $r['teleCap.KPA'];
        $climb += $r['teleCap.climb'];
    }
    echo "<tr>
          <td>" . $autoGears . "</td>
          <td>" . $autoBaseline . "</td>
          <td>" . $autokPa . "</td>
          <td>" . $teleGears . "</td>
          <td>" . $telekPa . "</td>
          <td>" . $climb . "</td>
          </tr>
          </tbody>
          </table>";
}
?>