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
</style>
</head>
<body>
	<?php include "nav.php";?>
<form action="../php/remove.php" method="post">
<div id="content">
<br>
<?php
$con=mysqli_connect("localhost","data","mxwZsnKw5FtD8uX8","sandman");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$result = mysqli_query($con,"SELECT * FROM `matchdata`");
$result = mysqli_query($con, "SELECT * FROM `matchdata` ORDER BY id DESC");

echo "<div class='container' style='width:90%'><table align='center' class='table table-striped'>
<thead>
<tr>
<th> </th>
<th>ID</th>
<th>Match #</th>
<th>Team #</th>
<th>Alliance</th>
<th>Comments</th>
</tr>
</thead><tbody>";

while($row = mysqli_fetch_array($result))
{
	//echo "$row['isRed']";
/*if ($row['isRed'] == 1) {
	echo "<style> td {background-color:red;} </style>";
} <button type='button' class='btn btn-danger'>Delete</button>
else {
	echo "<style> td {background-color:blue; color:white;} </style>";
}*/
echo "<tr>";
echo "<td><input type='radio' name='remove' value='" . $row['id'] . "'></td>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['matchNum'] . "</td>";
echo "<td>" . $row['teamNum'] . "</td>";
echo "<td>" . $row['isRed'] . "</td>";
echo "<td>" . $row['teleCap.notes'] . "</td>";
echo "</tr>";
}
echo "</tbody></table></div>";

mysqli_close($con);
?>
</div>
<div id="footer"><a href="index.html" style="padding-right:5px;">Home</a><button type='submit' class='btn btn-danger btn-lg' style='width:150px; margin-bottom:5px; margin-right:5px;'>Remove</button></div>
</form>
</body>
</html>