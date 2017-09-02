<?php include "global.php"; ?>

	<!-- Custom CSS -->
	<link href="../css/checkboxes.css" rel="stylesheet">
	<link href="../css/swagboxes.css" rel="stylesheet">
	<link href="../css/sheet.css" rel="stylesheet">
	<link href="../css/input.css" rel="stylesheet">
	<link href="../css/star-rating.css" rel="stylesheet">

	<!-- Javascript -->
	<!--<script type="text/javascript" src="js/report2016globalspit.js"></script>-->
	<script type="text/javascript" src="js/background.js"></script>
	<script type="text/javascript" src="js/star-rating.js"></script>
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
	<?php include "nav.php";?>
	<form id="2016autoform" action="../php/sendDBalliance.php" method="post">
		<div class="row" style="padding: 0.6em">
			<div class="col-md-4" style="display:block; margin-left:auto; margin-right:auto;">
				<h3 class="center"><strong>Information</strong></h3>
				<div class="inputBoxes">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Alliance:</p>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
							<select name="alliance" style="text-align:center; color:black;">
    							<option value=0>1 (Team 1, Team 2, Team 3)</option>
    							<option value=1>2 (Team 1, Team 2, Team 3)</option>
    							<option value=2>3 (Team 1, Team 2, Team 3)</option>
    							<option value=3>4 (Team 1, Team 2, Team 3)</option>
    							<option value=4>5 (Team 1, Team 2, Team 3)</option>
    							<option value=5>6 (Team 1, Team 2, Team 3)</option>
    							<option value=6>7 (Team 1, Team 2, Team 3)</option>
    							<option value=7>8 (Team 1, Team 2, Team 3)</option>
  							</select>
						</div>
					</div>
					<div class="row">
						<!--<div class="" style="height:30px"></div> <!--Keep or universe will explode (and it will be your fault!!!)-->
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Match/Round:</p>
						</div>
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4" style="text-align:center; color:black;">
							<select name="match">
    							<option value=0>Quarterfinals</option>
    							<option value=1>Semifinals</option>
  							</select>
  						</div>
  						<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2" style="text-align:center; color:black; padding-left: 20px;">
							<select name="round">
    							<option value=0>1</option>
    							<option value=1>2</option>
    							<option value=2>3</option>
  							</select>
  						</div>
  					</div>


					<hr>
					<div class="row">
						<!--<div class="" style="height:30px"></div> <!--Keep or universe will explode (and it will be your fault!!!)-->
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Team 1:</p>
						</div>
						<div class="col-md-6 col-sm-4 col-xs-4 col-lg-4" style="text-align:center; color:black;">
							<select name="team1">
    							<option value=0>Robust</option>
    							<option value=1>Sensitive</option>
    							<option value=2>Set-Point</option>
   						    	<option value=3>Defense</option>
   						    	<option value=4>Gear Cycler</option>
    							<option value=3>Low Goal Cycler</option>
  							</select>
  						</div>
  					</div>
  					<div class="row">
						<!--<div class="" style="height:30px"></div> <!--Keep or universe will explode (and it will be your fault!!!)-->
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Team 2:</p>
						</div>
						<div class="col-md-6 col-sm-4 col-xs-4 col-lg-4" style="text-align:center; color:black;">
							<select name="team2">
    							<option value=0>Robust</option>
    							<option value=1>Sensitive</option>
    							<option value=2>Set-Point</option>
   						    	<option value=3>Defense</option>
   						    	<option value=4>Gear Cycler</option>
    							<option value=3>Low Goal Cycler</option>
  							</select>
  						</div>
  					</div>
  					<div class="row">
						<!--<div class="" style="height:30px"></div> <!--Keep or universe will explode (and it will be your fault!!!)-->
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Team 3:</p>
						</div>
						<div class="col-md-6 col-sm-4 col-xs-4 col-lg-4" style="text-align:center; color:black;">
							<select name="team3">
    							<option value=0>Robust</option>
    							<option value=1>Sensitive</option>
    							<option value=2>Set-Point</option>
   						    	<option value=3>Defense</option>
   						    	<option value=4>Gear Cycler</option>
    							<option value=3>Low Goal Cycler</option>
  							</select>
  						</div>
  					</div>


				</div>
			</div>
		</div>
		<div class="container">
		<h3 class="center"><strong>General Strategy</strong></h3>
		<textarea name="notes" id="notesTele" rows="10" cols="60" style="width: 100%; height: 200px; z-index: auto; position: relative; line-height: normal; font-size: 13.3333px; transition: none; overflow: auto; background: transparent !important;" tabindex="1"></textarea>
		<div style="padding:20px">
			<input class="btn btn-danger btn-lg" style="display: block; width: 100%;" type="submit" value="Submit" />
		</div>
		</div>
	</form>
<script>
	backgroundRed();
</script>
</div>

</body>
</html>
