<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Stronghold - 2016</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="../img/favicon-128.png" sizes="128x128" />
	
	<!-- Custom CSS -->
	<link href="css/disableXScroll.css" rel="stylesheet">
	<link href="css/sheet.css" rel="stylesheet">
	<link href="css/global.css" rel="stylesheet">
	<link href="css/navbar.css" rel="stylesheet">
	
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

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
<nav class="navbar navbar-default" style="margin-bottom:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">Sandman</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../index.html">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Scouting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="sheets/2016global.html">Game Scouting</a></li>
            <li><a href="sheets/2016globalpit.html">Pit Scouting</a></li>
          </ul>
        </li>
        <li><a href="../report3.php">Results </a></li>
        <li class="active"><a href="../removePage.php">DB Managment</a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>	
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