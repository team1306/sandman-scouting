<?php include "global.php"; ?>

<style>
input[type=number] {
    background-color: #000;
    color: #fff;
    padding-left:10px;
    width: 100%;
    height: 100%;
    text-align: center;
}
input[type=button], input[type=number]{
    border: 0;
}
#footer {
    position: fixed;
    bottom: 0;
    width: 100%;
}
#footer {
    background: #fff;
    line-height: 2;
    text-align: right;
    color: #042E64;
    font-size: 30px;
    font-family: sans-serif;
    font-weight: bold;
}
.red {
    background-color: #990000;
}
.blue {
    background-color: #0068b3;
}
</style>
</head>
<body>
<?php include "nav.php";
      include "error.php";?>
<form action="remove.php" method="get">
<div id="content">
<br>
<?php
include 'php/dbDataConn.php';
include 'php/getScoutInfo.php';

$result = mysqli_query($dbDataConn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] . " ORDER BY id DESC");

echo "<div class='container' style='width:90%'><table align='center' class='table table-striped'>
<thead>
<tr>
<th> </th>
<th>ID</th>
<th>Match #</th>
<th>Team #</th>
<th>Alliance</th>
<th>Scout</th>
<th>Comments</th>
</tr>
</thead><tbody>";

while($row = mysqli_fetch_array($result)) {
    if ($row['isRed'] == 1) {
    	//echo "<style> td {background-color:red;} </style>";
    	$alliance = "red";
    }
    else {
    	//echo "<style> td {background-color:blue; color:white;} </style>";
        $alliance = "blue";
    }
    echo "<tr>";
    echo "<td><input type='radio' name='remove' value='" . $row['id'] . "'></td>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['matchNum'] . "</td>";
    echo "<td>" . $row['teamNum'] . "</td>";
    echo "<td class='" . $alliance . "'></td>";
    echo "<td>" . getScoutName($row['userID']) . " (" . $row['userID'] . ")</td>";
    echo "<td>" . $row['teleCap.notes'] . "</td>";
    echo "</tr>";
}
echo "</tbody></table></div>";

$dbDataConn->close();
?>
</div>
<div id="footer">
    <div class="row">
        <div class="col-sm-6">
            <button type='submit' class='btn btn-danger btn-lg btn-block' style='margin-bottom:5px; margin-right:5px;' name='action' value=0>Remove</button>
        </div>
        <div class="col-sm-6">
            <button type='submit' class='btn btn-danger btn-lg btn-block' style='margin-bottom:5px; margin-right:5px;' name='action' value=1>Edit</button>
        </div>
    </div>
</div>
</form>
</body>
</html>
