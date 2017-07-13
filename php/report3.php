<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>

	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	
	<!-- Favicon -->
	<link rel="icon" type="../image/png" href="favicon/favicon-128.png" sizes="128x128" />

	<!-- Custom CSS -->
	<link href="../css/disableXScroll.css" rel="stylesheet">
	<link href="../css/global.css" rel="stylesheet">
	<link href="../css/sb-admin-2.css" rel="stylesheet">
	<link rel="../stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="../css/navbar.css" rel="stylesheet">
	
	<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>

	<!-- Custom CSS -->
	<link href="../css/checkboxes.css" rel="stylesheet">
	<link href="../css/swagboxes.css" rel="stylesheet">
	<link href="../css/sheet.css" rel="stylesheet">
	<link href="../css/input.css" rel="stylesheet">
	<link href="../css/star-rating.css" rel="stylesheet">

	<!-- Javascript -->
	<!--<script type="text/javascript" src="../js/report2016globalspit.js"></script>-->
	<script type="text/javascript" src="../js/background.js"></script>
	<script type="text/javascript" src="../js/star-rating.js"></script>
	<script type="text/javascript" src="../js/background.js"></script>
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
        <li><a href="../index.php">Home <span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Scouting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../2016global.php">Game Scouting</a></li>
            <li><a href="../2016globalpit.php">Pit Scouting</a></li>
            <li><a href="../2016globalalliance.php">Alliance Scouting</a></li>
          </ul>
        </li>
        <li><a href="report3.php">Results </a></li>
        <li><a href="../removePage.php">DB Managment</a></li>
      </ul>
        <?php
            if (isset($_SESSION['uname'])) {
                echo '<ul class="nav navbar-top-links navbar-right">
                        <div style="padding-right: 5px">
                            <div class="btn-group navbar-btn">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="' . $_SESSION['image_24'] . '"> ' . $_SESSION['uname'] . ' <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li class="disabled"><a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
                                <li class="disabled"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> My Parts</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/oauth/oauthLogout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                              </ul>
                            </div>
                        </div>';
            }
            else {
                echo '<ul class="nav navbar-top-links navbar-right">
                        <div style="padding: 5px">
                            <a href="https://slack.com/oauth/authorize?scope=identity.basic,identity.email,identity.team,identity.avatar&client_id=3325716591.80369238817"><img alt="Sign in with Slack" height="40" width="172" src="https://platform.slack-edge.com/img/sign_in_with_slack.png" srcset="https://platform.slack-edge.com/img/sign_in_with_slack.png 1x, https://platform.slack-edge.com/img/sign_in_with_slack@2x.png 2x" /></a>
                        </div>';
            }
        ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


	<br>
<div id="reportBox" style="width:85%; margin-left:auto; margin-right:auto; display:block;">
	<form id="search" action="../php/search4.php" method="post">
		<div class="col-sm-5" style="border-style: solid; border-radius: 5px; padding: 4px;">
			<div class="col-sm-4" style="height:57px"><input class="textBox" id="search1" type="number" maxlength="20" name="searchname1"/></div>
			<div class="col-sm-4" style="height:57px"><input class="textBox" id="search2" type="number" maxlength="20" name="searchname2"/></div>
			<div class="col-sm-4" style="height:57px"><input class="textBox" id="search3" type="number" maxlength="20" name="searchname3"/></div>
		</div>
		<div class="col-sm-7" style="padding: 0px;">
			<div class="col-sm-6" style="padding: 4px; border-style: solid; border-radius: 5px;">
				<div class="col-sm-6" style="height:57px"><input class="textBox" id="search4" type="number" maxlength="20" name="searchname5"/></div>
				<div class="col-sm-6" style="height:57px"><input class="textBox" id="search5" type="number" maxlength="20" name="searchname6"/></div>
			</div>
			<div class="col-sm-6" style="padding: 7px;">
				<div class="col-sm-4" style="height:57px"><input class="textBox" id="searchlimit" type="number" maxlength="20" name="limit"/></div>
				<div class="col-sm-8" style="height:57px"><div id="submitBox" style="margin-left:auto; margin-right:auto; display:block;"><button type="submit" class="btn btn-danger btn-lg" style="width:100%">Submit</button></div></div>
			</div>
			<div class="row">
				<h3>Matches: <a onclick="setTeams(11)">11</a> <a onclick="setTeams(22)">22</a> <a onclick="setTeams(32)">32</a> <a onclick="setTeams(40)">40</a> <a onclick="setTeams(60)">60</a> <a onclick="setTeams(67)">67</a> <a onclick="setTeams(84)">84</a> <a onclick="setTeams(100)">100</a> <a onclick="setTeams(106)">106</a> <a onclick="setTeams(117)">117</a></h3>
			</div>
			<!--<div class="col-sm-3" style="height:57px">
					<!--<div class="roundedSeven">
						<input type="checkbox" value=1 id="roundedSeven" class="checkbox" name="show5" />
						<label for="roundedSeven"></label>
					</div>
					<input class="textBox" type="number" maxlength="3" name="show5"/>
	  			<!--<section title=".slideTwo">
			    <div class="slideTwo">  
			      <input type="checkbox" value=0 id="slideTwo" name="show5" checked />
			      <label for="slideTwo"></label>
			    </div>
			  </section>
			</div>-->
</div>
	
	</form>
</div>
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
}
else {
	echo "<style> td {background-color:blue; color:white;} </style>";
}*/
echo "<tr>";
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
</body>
<script>
	//backgroundRed();
	var match11 = [3238, 1806, 2783, 461, 6219];
	var match22 = [604, 2415, 3044, 6134, 177];
	var match32 = [6171, 6055, 537, 3245, 2823];
	var match40 = [5437, 3015, 4930, 2363, 272];
	var match60 = [5677, 1099, 548, 3130, 181];
	var match67 = [2337, 5016, 4401, 4488, 2522];
	var match84 = [1250, 5053, 5439, 5030, 2054];
	var match100 = [423, 33, 2451, 433, 6221];
	var match106 = [3039, 6134, 1622, 74, 1675];
	var match117 = [2056, 181, 1756, 5854, 1405];
	
	function setTeams(match) {
		if (match == 11) {
			var teams = match11;
		}
		if (match == 22) {
			var teams = match22;
		}
		if (match == 32) {
			var teams = match32;
		}
		if (match == 40) {
			var teams = match40;
		}
		if (match == 60) {
			var teams = match60;
		}
		if (match == 67) {
			var teams = match67;
		}
		if (match == 84) {
			var teams = match84;
		}
		if (match == 100) {
			var teams = match100;
		}
		if (match == 106) {
			var teams = match106;
		}
		if (match == 117) {
			var teams = match117;
		}
		document.getElementById("search1").value = teams[0];
		document.getElementById("search2").value = teams[1];
		document.getElementById("search3").value = teams[2];
		document.getElementById("search4").value = teams[3];
		document.getElementById("search5").value = teams[4];
	}
	
	//document.getElementById("search1").value = 0;
</script>
</html>