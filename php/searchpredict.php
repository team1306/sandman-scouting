<link href="../css/bootstrap.css" rel="stylesheet">
<?php
$teamnum1 = $_POST["searchname1"];
$teamnum2 = $_POST["searchname2"];
$teamnum3 = $_POST["searchname3"];
$teamnum4 = $_POST["searchname4"];
$teamnum5 = $_POST["searchname5"];
$teamnum6 = $_POST["searchname6"];

$con=mysqli_connect("localhost","root","","sandman");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($teamnum1 != NULL) {
    echo "<h2 style='text-align:center'>Data for: $teamnum1</h2>";
    $result1 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum1");
    
    $portcullisTotalFinal = 0;
    $chevalTotalFinal = 0;
    $moatTotalFinal = 0;
    $rampartsTotalFinal = 0;
    $drawbridgeTotalFinal = 0;
    $sallyPortTotalFinal = 0;
    $rockWallTotalFinal = 0;
    $roughTerrainTotalFinal = 0;
    $lowBarTotalFinal = 0;
    $portcullisTotalTotalFinal = 0;
    $chevalTotalTotalFinal = 0;
    $moatTotalTotalFinal = 0;
    $rampartsTotalTotalFinal = 0;
    $drawbridgeTotalTotalFinal = 0;
    $sallyPortTotalTotalFinal = 0;
    $rockWallTotalTotalFinal = 0;
    $roughTerrainTotalTotalFinal = 0;
    $lowBarTotalTotalFinal = 0;
    echo "
    <div class='container'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Match</th>
                    <th>High Goals</th>
                    <th>High Goals Missed</th>
                    <th>Low Goals</th>
                    <th>Portcullis</th>
                    <th>Cheval</th>
                    <th>Moat</th>
                    <th>Ramparts</th>
                    <th>Drawbridge</th>
                    <th>Sally Port</th>
                    <th>Rock Wall</th>
                    <th>Rough Terrain</th>
                    <th>Low Bar</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody>";
            while($row = mysqli_fetch_array($result1))
            {
                $portcullisTotal = $row['autoCap.portcullis'] + $row['teleCap.portcullis'];
                $chevalTotal = $row['autoCap.cheval'] + $row['teleCap.cheval'];
                $moatTotal = $row['autoCap.moat'] + $row['teleCap.moat'];
                $rampartsTotal = $row['autoCap.ramparts'] + $row['teleCap.ramparts'];
                $drawbridgeTotal = $row['autoCap.drawbridge'] + $row['teleCap.drawbridge'];
                $sallyPortTotal = $row['autoCap.sallyPort'] + $row['teleCap.sallyPort'];
                $rockWallTotal = $row['autoCap.rockWall'] + $row['teleCap.rockWall'];
                $roughTerrainTotal = $row['autoCap.roughTerrain'] + $row['teleCap.roughTerrain'];
                $lowBarTotal = $row['autoCap.lowBar'] + $row['teleCap.lowBar'];
                
                $portcullisTotalFinal = $portcullisTotalFinal + $portcullisTotal;
                $chevalTotalFinal = $chevalTotalFinal + $chevalTotal;
                $moatTotalFinal = $moatTotalFinal + $moatTotal;
                $rampartsTotalFinal = $rampartsTotalFinal + $rampartsTotal;
                $drawbridgeTotalFinal = $drawbridgeTotalFinal + $drawbridgeTotal;
                $sallyPortTotalFinal = $sallyPortTotalFinal + $sallyPortTotal;
                $rockWallTotalFinal = $rockWallTotalFinal + $rockWallTotal;
                $roughTerrainTotalFinal = $roughTerrainTotalFinal + $roughTerrainTotal;
                $lowBarTotalFinal = $lowBarTotalFinal + $lowBarTotal;
                
                $highGoalsTotal = $row['autoCap.highGoals'] + $row['teleCap.highGoals'];
                $highGoalsTotalFinal = $highGoalsTotalFinal + $highGoalsTotal;
                $highGoalsMissedTotal = $row['autoCap.highGoalsMissed'] + $row['teleCap.highGoalsMissed'];
                $highGoalsMissedTotalFinal = $highGoalsMissedTotalFinal + $highGoalsMissedTotal;
                
                $lowGoalsTotal = $row['autoCap.lowGoals'] + $row['teleCap.lowGoals'];
                $lowGoalsTotalFinal = $lowGoalsTotalFinal + $lowGoalsTotal;
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['matchNum'] . "</td>";
                echo "<td>" . $row['autoCap.highGoals'] . ":" . $row['teleCap.highGoals'] . ":<strong>" . $highGoalsTotal . "</strong></td>";
                echo "<td>" . $row['autoCap.highGoalsMissed'] . ":" . $row['teleCap.highGoalsMissed'] . ":<strong>" . $highGoalsMissedTotal . "</strong></td>";
                echo "<td>" . $row['autoCap.lowGoals'] . ":" . $row['teleCap.lowGoals'] . ":<strong>" . $lowGoalsTotal . "</td>";
                echo "<td>" . $row['autoCap.portcullis'] . ":" . $row['teleCap.portcullis'] . ":<strong>" . $portcullisTotal . "</td>";
                echo "<td>" . $row['autoCap.cheval'] . ":" . $row['teleCap.cheval'] . ":<strong>" . $chevalTotal . "</td>";
                echo "<td>" . $row['autoCap.moat'] . ":" . $row['teleCap.moat'] . ":<strong>" . $moatTotal . "</td>";
                echo "<td>" . $row['autoCap.ramparts'] . ":" . $row['teleCap.ramparts'] . ":<strong>" . $rampartsTotal . "</strong></td>";
                echo "<td>" . $row['autoCap.drawbridge'] . ":" . $row['teleCap.drawbridge'] . ":<strong>" . $drawbridgeTotal . "</strong></td>";
                echo "<td>" . $row['autoCap.sallyPort'] . ":" . $row['teleCap.sallyPort'] . ":<strong>" . $sallyPortTotal . "</strong></td>";
                echo "<td>" . $row['autoCap.rockWall'] . ":" . $row['teleCap.rockWall'] . ":<strong>" . $rockWallTotal . "</strong></td>";
                echo "<td>" . $row['autoCap.roughTerrain'] . ":" . $row['teleCap.roughTerrain'] . ":<strong>" . $roughTerrainTotal . "</strong></td>";
                echo "<td>" . $row['autoCap.lowBar'] . ":" . $row['teleCap.lowBar'] . ":<strong>" . $lowBarTotal . "</strong></td>";
                echo "<td>" . $row['teleCap.notes'] . "</td>";
                echo "</tr>";
            }
            $highGoalsMM = ($highGoalsTotalFinal / ($highGoalsTotalFianl + $highGoalsMissedTotalFinal)) * 100;
            $highGoalsMMstring = round($highGoalsMM, 2) . "%";
            echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
            echo "<td><strong>Accuracy: $highGoalsMMstring</strong></td>";
            echo "<td><strong>$highGoalsTotalFinal</strong></td>";
            echo "<td><strong>$highGoalsMissedTotalFinal</strong></td>";
            echo "<td><strong>$lowGoalsTotalFinal</strong></td>";
            echo "<td><strong>$portcullisTotalFinal</strong></td>";
            echo "<td><strong>$chevalTotalFinal</strong></td>";
            echo "<td><strong>$moatTotalFinal</strong></td>";
            echo "<td><strong>$rampartsTotalFinal</strong></td>";
            echo "<td><strong>$drawbridgeTotalFinal</strong></td>";
            echo "<td><strong>$sallyPortTotalFinal</strong></td>";
            echo "<td><strong>$rockWallTotalFinal</strong></td>";
            echo "<td><strong>$roughTerrainTotalFinal</strong></td>";
            echo "<td><strong>$lowBarTotalFinal</strong></td>";
            echo "<td> </td>";
            echo "<td> </td>";
            echo "</tr></tfoot>";
            echo "</table></div>";
}


$result2 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum2");
$result3 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum3");
$result4 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum4");
$result5 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum5");
$result6 = mysqli_query($con,"SELECT * FROM `matchdata` WHERE teamNum = $teamnum6");



echo "<h2 style='text-align:center'>Data for: $teamnum2</h2>";
echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Portcullis</th>
<th>Cheval</th>
<th>Moat</th>
<th>Ramparts</th>
<th>Drawbridge</th>
<th>Sally Port</th>
<th>Rock Wall</th>
<th>Rough Terrain</th>
<th>Low Bar</th>
<th>Comments</th>
</tr>
</thead>
<tbody>";

$portcullisTotalTotalFinal = $portcullisTotalTotalFinal + $portcullisTotalFinal;
$chevalTotalTotalFinal = $chevalTotalTotalFinal + $chevalTotalFinal;
$moatTotalTotalFinal = $moatTotalTotalFinal + $moatTotalFinal;
$rampartsTotalTotalFinal = $rampartsTotalTotalFinal + $rampartsTotalFinal;
$drawbridgeTotalTotalFinal = $drawbridgeTotalTotalFinal + $drawbridgeTotalFinal;
$sallyPortTotalTotalFinal = $sallyPortTotalTotalFinal + $sallyPortTotalFinal;
$rockWallTotalTotalFinal = $rockWallTotalTotalFinal + $rockWallTotalFinal;
$roughTerrainTotalTotalFinal = $roughTerrainTotalTotalFinal + $roughTerrainTotalFinal;
$lowBarTotalTotalFinal = $lowBarTotalTotalFinal + $lowBarTotalFinal;

$portcullisTotalFinal = 0;
$chevalTotalFinal = 0;
$moatTotalFinal = 0;
$rampartsTotalFinal = 0;
$drawbridgeTotalFinal = 0;
$sallyPortTotalFinal = 0;
$rockWallTotalFinal = 0;
$roughTerrainTotalFinal = 0;
$lowBarTotalFinal = 0;

while($row = mysqli_fetch_array($result2))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['matchNum'] . "</td>";
$portcullisTotal = $row['autoCap.portcullis'] + $row['teleCap.portcullis'];
$chevalTotal = $row['autoCap.cheval'] + $row['teleCap.cheval'];
$moatTotal = $row['autoCap.moat'] + $row['teleCap.moat'];
$rampartsTotal = $row['autoCap.ramparts'] + $row['teleCap.ramparts'];
$drawbridgeTotal = $row['autoCap.drawbridge'] + $row['teleCap.drawbridge'];
$sallyPortTotal = $row['autoCap.sallyPort'] + $row['teleCap.sallyPort'];
$rockWallTotal = $row['autoCap.rockWall'] + $row['teleCap.rockWall'];
$roughTerrainTotal = $row['autoCap.roughTerrain'] + $row['teleCap.roughTerrain'];
$lowBarTotal = $row['autoCap.lowBar'] + $row['teleCap.lowBar'];
$portcullisTotalFinal = $portcullisTotalFinal + $portcullisTotal;
$chevalTotalFinal = $chevalTotalFinal + $chevalTotal;
$moatTotalFinal = $moatTotalFinal + $moatTotal;
$rampartsTotalFinal = $rampartsTotalFinal + $rampartsTotal;
$drawbridgeTotalFinal = $drawbridgeTotalFinal + $drawbridgeTotal;
$sallyPortTotalFinal = $sallyPortTotalFinal + $sallyPortTotal;
$rockWallTotalFinal = $rockWallTotalFinal + $rockWallTotal;
$roughTerrainTotalFinal = $roughTerrainTotalFinal + $roughTerrainTotal;
$lowBarTotalFinal = $lowBarTotalFinal + $lowBarTotal;
echo "<td>" . $row['teleCap.portcullis'] . ":" . $row['autoCap.portcullis'] . ":<strong>" . $portcullisTotal . "</strong></td>";
echo "<td>" . $row['teleCap.cheval'] . ":" . $row['autoCap.cheval'] . ":<strong>" . $chevalTotal . "</strong></td>";
echo "<td>" . $row['teleCap.moat'] . ":" . $row['autoCap.moat'] . ":<strong>" . $moatTotal . "</strong></td>";
echo "<td>" . $row['teleCap.ramparts'] . ":" . $row['autoCap.ramparts'] . ":<strong>" . $rampartsTotal . "</strong></td>";
echo "<td>" . $row['teleCap.drawbridge'] . ":" . $row['autoCap.drawbridge'] . ":<strong>" . $drawbridgeTotal . "</strong></td>";
echo "<td>" . $row['teleCap.sallyPort'] . ":" . $row['autoCap.sallyPort'] . ":<strong>" . $sallyPortTotal . "</strong></td>";
echo "<td>" . $row['teleCap.rockWall'] . ":" . $row['autoCap.rockWall'] . ":<strong>" . $rockWallTotal . "</strong></td>";
echo "<td>" . $row['teleCap.roughTerrain'] . ":" . $row['autoCap.roughTerrain'] . ":<strong>" . $roughTerrainTotal . "</strong></td>";
echo "<td>" . $row['teleCap.lowBar'] . ":" . $row['autoCap.lowBar'] . ":<strong>" . $lowBarTotal . "</strong></td>";
echo "<td>" . $row['teleCap.notes'] . "</td>";
echo "</tr>";
}

echo "</tbody><tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$portcullisTotalFinal</strong></td>";
echo "<td><strong>$chevalTotalFinal</strong></td>";
echo "<td><strong>$moatTotalFinal</strong></td>";
echo "<td><strong>$rampartsTotalFinal</strong></td>";
echo "<td><strong>$drawbridgeTotalFinal</strong></td>";
echo "<td><strong>$sallyPortTotalFinal</strong></td>";
echo "<td><strong>$rockWallTotalFinal</strong></td>";
echo "<td><strong>$roughTerrainTotalFinal</strong></td>";
echo "<td><strong>$lowBarTotalFinal</strong></td>";
echo "<td> </td>";
echo "</tr></tfoot>";

echo "</table></div>";



echo "<h2 style='text-align:center'>Data for: $teamnum3</h2>";
echo "<div class='container'>
<table class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Match</th>
<th>Portcullis</th>
<th>Cheval</th>
<th>Moat</th>
<th>Ramparts</th>
<th>Drawbridge</th>
<th>Sally Port</th>
<th>Rock Wall</th>
<th>Rough Terrain</th>
<th>Low Bar</th>
<th>Comments</th>
</tr>
</thead>
<tbody>";

$portcullisTotalTotalFinal = $portcullisTotalTotalFinal + $portcullisTotalFinal;
$chevalTotalTotalFinal = $chevalTotalTotalFinal + $chevalTotalFinal;
$moatTotalTotalFinal = $moatTotalTotalFinal + $moatTotalFinal;
$rampartsTotalTotalFinal = $rampartsTotalTotalFinal + $rampartsTotalFinal;
$drawbridgeTotalTotalFinal = $drawbridgeTotalTotalFinal + $drawbridgeTotalFinal;
$sallyPortTotalTotalFinal = $sallyPortTotalTotalFinal + $sallyPortTotalFinal;
$rockWallTotalTotalFinal = $rockWallTotalTotalFinal + $rockWallTotalFinal;
$roughTerrainTotalTotalFinal = $roughTerrainTotalTotalFinal + $roughTerrainTotalFinal;
$lowBarTotalTotalFinal = $lowBarTotalTotalFinal + $lowBarTotalFinal;

$portcullisTotalFinal = 0;
$chevalTotalFinal = 0;
$moatTotalFinal = 0;
$rampartsTotalFinal = 0;
$drawbridgeTotalFinal = 0;
$sallyPortTotalFinal = 0;
$rockWallTotalFinal = 0;
$roughTerrainTotalFinal = 0;
$lowBarTotalFinal = 0;

while($row = mysqli_fetch_array($result3))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['matchNum'] . "</td>";
$portcullisTotal = $row['autoCap.portcullis'] + $row['teleCap.portcullis'];
$chevalTotal = $row['autoCap.cheval'] + $row['teleCap.cheval'];
$moatTotal = $row['autoCap.moat'] + $row['teleCap.moat'];
$rampartsTotal = $row['autoCap.ramparts'] + $row['teleCap.ramparts'];
$drawbridgeTotal = $row['autoCap.drawbridge'] + $row['teleCap.drawbridge'];
$sallyPortTotal = $row['autoCap.sallyPort'] + $row['teleCap.sallyPort'];
$rockWallTotal = $row['autoCap.rockWall'] + $row['teleCap.rockWall'];
$roughTerrainTotal = $row['autoCap.roughTerrain'] + $row['teleCap.roughTerrain'];
$lowBarTotal = $row['autoCap.lowBar'] + $row['teleCap.lowBar'];
$portcullisTotalFinal = $portcullisTotalFinal + $portcullisTotal;
$chevalTotalFinal = $chevalTotalFinal + $chevalTotal;
$moatTotalFinal = $moatTotalFinal + $moatTotal;
$rampartsTotalFinal = $rampartsTotalFinal + $rampartsTotal;
$drawbridgeTotalFinal = $drawbridgeTotalFinal + $drawbridgeTotal;
$sallyPortTotalFinal = $sallyPortTotalFinal + $sallyPortTotal;
$rockWallTotalFinal = $rockWallTotalFinal + $rockWallTotal;
$roughTerrainTotalFinal = $roughTerrainTotalFinal + $roughTerrainTotal;
$lowBarTotalFinal = $lowBarTotalFinal + $lowBarTotal;
echo "<td>" . $row['teleCap.portcullis'] . ":" . $row['autoCap.portcullis'] . ":<strong>" . $portcullisTotal . "</strong></td>";
echo "<td>" . $row['teleCap.cheval'] . ":" . $row['autoCap.cheval'] . ":<strong>" . $chevalTotal . "</strong></td>";
echo "<td>" . $row['teleCap.moat'] . ":" . $row['autoCap.moat'] . ":<strong>" . $moatTotal . "</strong></td>";
echo "<td>" . $row['teleCap.ramparts'] . ":" . $row['autoCap.ramparts'] . ":<strong>" . $rampartsTotal . "</strong></td>";
echo "<td>" . $row['teleCap.drawbridge'] . ":" . $row['autoCap.drawbridge'] . ":<strong>" . $drawbridgeTotal . "</strong></td>";
echo "<td>" . $row['teleCap.sallyPort'] . ":" . $row['autoCap.sallyPort'] . ":<strong>" . $sallyPortTotal . "</strong></td>";
echo "<td>" . $row['teleCap.rockWall'] . ":" . $row['autoCap.rockWall'] . ":<strong>" . $rockWallTotal . "</strong></td>";
echo "<td>" . $row['teleCap.roughTerrain'] . ":" . $row['autoCap.roughTerrain'] . ":<strong>" . $roughTerrainTotal . "</strong></td>";
echo "<td>" . $row['teleCap.lowBar'] . ":" . $row['autoCap.lowBar'] . ":<strong>" . $lowBarTotal . "</strong></td>";
echo "<td>" . $row['teleCap.notes'] . "</td>";
echo "</tr>";
}

echo "<tfoot><tr><td><strong>Totals:</strong></td>";
echo "<td> </td>";
echo "<td><strong>$portcullisTotalFinal</strong></td>";
echo "<td><strong>$chevalTotalFinal</strong></td>";
echo "<td><strong>$moatTotalFinal</strong></td>";
echo "<td><strong>$rampartsTotalFinal</strong></td>";
echo "<td><strong>$drawbridgeTotalFinal</strong></td>";
echo "<td><strong>$sallyPortTotalFinal</strong></td>";
echo "<td><strong>$rockWallTotalFinal</strong></td>";
echo "<td><strong>$roughTerrainTotalFinal</strong></td>";
echo "<td><strong>$lowBarTotalFinal</strong></td>";echo "<td> </td>";echo "<td> </td>";
echo "</tr></tfoot>";

$portcullisTotalTotalFinal = $portcullisTotalTotalFinal + $portcullisTotalFinal;
$chevalTotalTotalFinal = $chevalTotalTotalFinal + $chevalTotalFinal;
$moatTotalTotalFinal = $moatTotalTotalFinal + $moatTotalFinal;
$rampartsTotalTotalFinal = $rampartsTotalTotalFinal + $rampartsTotalFinal;
$drawbridgeTotalTotalFinal = $drawbridgeTotalTotalFinal + $drawbridgeTotalFinal;
$sallyPortTotalTotalFinal = $sallyPortTotalTotalFinal + $sallyPortTotalFinal;
$rockWallTotalTotalFinal = $rockWallTotalTotalFinal + $rockWallTotalFinal;
$roughTerrainTotalTotalFinal = $roughTerrainTotalTotalFinal + $roughTerrainTotalFinal;
$lowBarTotalTotalFinal = $lowBarTotalTotalFinal + $lowBarTotalFinal;

echo "<table class='table table-bordered'>
<thead>
<tr>
<th>Portcullis</th>
<th>Cheval</th>
<th style='background-color:black; color:black;'>|</th>
<th>Moat</th>
<th>Ramparts</th>
<th style='background-color:black; color:black;'>|</th>
<th>Drawbridge</th>
<th>Sally Port</th>
<th style='background-color:black; color:black;'>|</th>
<th>Rock Wall</th>
<th>Rough Terrain</th>
<th style='background-color:black; color:black;'>|</th>
<th>Low Bar</th>
</tr>
</thead>
<tbody>
<tr>";
echo "<td><strong>$portcullisTotalTotalFinal</strong></td>";
echo "<td><strong>$chevalTotalTotalFinal</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$moatTotalTotalFinal</strong></td>";
echo "<td><strong>$rampartsTotalTotalFinal</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$drawbridgeTotalTotalFinal</strong></td>";
echo "<td><strong>$sallyPortTotalTotalFinal</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$rockWallTotalTotalFinal</strong></td>";
echo "<td><strong>$roughTerrainTotalTotalFinal</strong></td>";
echo "<th style='background-color:black; color:black;'>|</th>";
echo "<td><strong>$lowBarTotalTotalFinal</strong></td>";
echo "</tr>";
echo "</table></div>";

mysqli_close($con);

?>