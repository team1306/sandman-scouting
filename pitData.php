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
input[type=text] {
    background-color: #000;
    color: #fff;
    padding-left:10px;
    width: 100%;
    height: 100%;
    text-align: center;
}
input[type=button], input[type=text]{
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
<br>
<form action="../php/searchPit.php" method="post">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3 style="text-align: right;">Search a team # or Category</h3>
      </div>
      <div class="col-md-4" style="height:57px">
        <input class="textBox" id="searchtb" type="text" maxlength="20" name="input"/>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-danger btn-lg" style="width:100%">Submit</button>
      </div>
    </div>
  </div>

<?php
$con=mysqli_connect("localhost","data","mxwZsnKw5FtD8uX8","sandman");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$result = mysqli_query($con,"SELECT * FROM `matchdata`");
$result = mysqli_query($con, "SELECT * FROM `pitdata` ORDER BY id DESC");

echo "<div class='container' style='width:90%'><table align='center' class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Team #</th>
<th>Category</th>
<th>Comments</th>
</tr>
</thead><tbody>";

while($row = mysqli_fetch_array($result))
{
  $cat = "NULL";
if ($row['category'] == 0) {
  $cat = "Robust";
}
if ($row['category'] == 1) {
  $cat = "Sensitive";
}
if ($row['category'] == 2) {
  $cat = "Defense";
}
if ($row['category'] == 3) {
  $cat = "Low Goal Cycle";
}
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['teamnum'] . "</td>";
echo "<td>" . $cat . "</td>";
echo "<td>" . $row['notes'] . "</td>";
echo "</tr>";
}
echo "</tbody></table></div>";

mysqli_close($con);
?>
</form>
</body>
</html>