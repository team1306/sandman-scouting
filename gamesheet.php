	<?php
		ob_start();
		include "global.php";
	?>

	<!-- Custom gamesheet CSS -->
	<link href="css/checkboxes.css" rel="stylesheet">
	<link href="css/sheet.css" rel="stylesheet">
	<link href="css/star-rating.css" rel="stylesheet">
	<link href="css/image-picker.css" rel="stylesheet">

	<!-- Custom gamesheet JS -->
	<script type="text/javascript" src="js/report2017regionals.js"></script>
	<script type="text/javascript" src="js/background.js"></script>
	<script type="text/javascript" src="js/star-rating.js"></script>
	<script type="text/javascript" src="js/image-picker.js"></script>

</head>

<script>
//This function runs once the body has finished loading
function load() {
	//Check which alliance they are scouting
	if (<?php echo $_SESSION['userArray']['scoutingAlliance']; ?> == 1) {
	    setColor('red');
	}
	else {
	    setColor('blue');
	    document.getElementById('slideTwo').checked = false;
	}
	setStars();
	setValues();
}
//This function searches the body and finds all of the star ratings and shows the stars to make it look more pretty
function setStars() {
	$('.highGoalAccuracy').rating(
		{
			'showCaption':true,
			'stars':'4',
			'min':'0',
			'max':'4',
			'step':'1',
			'size':'xs',
			'clearCaption':'Not Attempted',
			'captionElement': '#highGoalAccuracy-caption',
			'starCaptions': {
				0:'Did not attempt',
				1:'25%',
				2:'50%',
				3:'75%',
				4:'100%'
			}
		});
  $('.highGoalSpeed').rating(
		{
			'showCaption':true,
			'stars':'4',
			'min':'0',
			'max':'4',
			'step':'1',
			'size':'xs',
			'clearCaption':'Not Attempted',
			'captionElement': '#highGoalSpeed-caption',
			'starCaptions': {
				0:'Did not attempt',
				1:'Very Slow',
				2:'Slow',
				3:'Fast',
				4:'Very Fast'
			}
		});
  $('.autoHighGoalAccuracy').rating(
		{
			'showCaption':true,
			'stars':'4',
			'min':'0',
			'max':'4',
			'step':'1',
			'size':'xs',
			'clearCaption':'Not Attempted',
			'captionElement': '#autoHighGoalAccuracy-caption',
			'starCaptions': {
				0:'Did not attempt',
				1:'25%',
				2:'50%',
				3:'75%',
				4:'100%'
			}
		});
  $('.autoHighGoalSpeed').rating(
		{
			'showCaption':true,
			'stars':'4',
			'min':'0',
			'max':'4',
			'step':'1',
			'size':'xs',
			'clearCaption':'Not Attempted',
			'captionElement': '#autoHighGoalSpeed-caption',
			'starCaptions': {
				0:'Did not attempt',
				1:'Very Slow',
				2:'Slow',
				3:'Fast',
				4:'Very Fast'
			}
		});
  $('.lowGoalAccuracy').rating(
		{
			'showCaption':true,
			'stars':'4',
			'min':'0',
			'max':'4',
			'step':'1',
			'size':'xs',
			'clearCaption':'Not Attempted',
			'captionElement': '#lowGoalAccuracy-caption',
			'starCaptions': {
				0:'Did not attempt',
				1:'25%',
				2:'50%',
				3:'75%',
				4:'100%'
			}
		});
  $('.lowGoalSpeed').rating(
		{
			'showCaption':true,
			'stars':'4',
			'min':'0',
			'max':'4',
			'step':'1',
			'size':'xs',
			'clearCaption':'Not Attempted',
			'captionElement': '#lowGoalSpeed-caption',
			'starCaptions': {
				0:'Did not attempt',
				1:'Very Slow',
				2:'Slow',
				3:'Fast',
				4:'Very Fast'
			}
		});
}
//Set all textboxes to 0 or their correct values
function setValues() {
	//Set these textboxes to 0
	document.getElementById("autoKPAtb").value = 0;
	document.getElementById("teleKPAtb").value = 0;
	document.getElementById("teleGearSuccesstb").value = 0;
	document.getElementById("teleGearFailtb").value = 0;

	//Set matchnumber to the current match number and set the team to the data from TBA
	var matchNum = <?php include "getMatchNum.php"; echo getNextMatch();?>;
	var team = '<?php include "TBAdata.php"; echo getTeam('qm', 1, getNextMatch(), $_SESSION['userArray']['scoutingAlliance'], ($_SESSION['userArray']['scoutingNumber']-1)); ?>';
	document.getElementById("tTeamNum").value = team;
	document.getElementById("tMatchNumber").value = matchNum;
};
//Run JQuery when the document is done loading to set the imagepicker
$(document).ready(function () {
	$(".image-picker").imagepicker();
});
</script>

<body onload="load();">
	<?php
		include "nav.php";

		// Redirect user if not logged in
		include "php/userCheck.php";
		checkUser(true);
	?>
	<form action="sendDBg" method="post">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h3 class="center"><strong>Information</strong></h3>
					<div class="border">
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
								<p class="center">Team Number:</p>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
								<input
									class="textBox"
									id="tTeamNum"
									type="number"
									maxlength="20"
								 	name="teamnum"
								 	value="0"
								 	required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
								<p class="center">Match Number:</p>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
								<input
									class="textBox"
									id="tMatchNumber"
									type="number"
									maxlength="10"
									name="matchnum"
									required>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
								<p class="center">Alliance:</p>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
			  					  <section title=".slideTwo">
								    <div class="slideTwo">
								      <input
												type="checkbox"
												onclick="backgroundSwitch();"
												value=1
												id="slideTwo"
												name="isRed"
												checked>
								      <label for="slideTwo"></label>
								    </div>
								  </section>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h3 class="center">
						<strong>Auto Capabilities</strong>
					</h3>
					<div class="border">
						<div class="row">
							<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
								<div class="roundedTwo">
									<input
										type="checkbox"
										value=1
										id="autoGear"
										name="autoGear"
										data-toggle="modal"
										data-target="#autoGearModal">
									<label for="autoGear" class="checkboxjs"></label>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<h4 class="checkboxLabel">
									Attempt Gear
								</h4>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
								<div class="roundedTwo">
									<input
										type="checkbox"
										value=1
										id="autoPassBaseline"
										name="autoPassBaseline">
									<label for="autoPassBaseline" class="checkboxjs"></label>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<h4 class="checkboxLabel">Baseline</h4>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>High Goal Accuracy<strong>
									<br>
									<span id="autoHighGoalAccuracy-caption"></span>
								</h4>
								<input
									class="autoHighGoalAccuracy"
									data-container-class='text-center'
									name="autoHighGoalAccuracy">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>High Goal Speed<strong>
									<br>
									<span id="autoHighGoalSpeed-caption"></span>
								</h4>
								<input
									class="autoHighGoalSpeed"
									data-container-class='text-center'
									name="autoHighGoalSpeed">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h4 class="center">
									<strong>KPA<strong>
								</h4>
								<div class="input-group input-group-lg">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setAutoKPA(-5)">-5</span>
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setAutoKPA(-1)">-1</span>
								  <input id="autoKPAtb" type="number" class="form-control textBox" name="autoKPA">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setAutoKPA(1)">+1</span>
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setAutoKPA(5)">+5</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h3 class="center">
						<strong>Teleop Capabilities</strong>
					</h3>
					<div class="border">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>Successful Gears<strong>
								</h4>
								<div class="input-group input-group-lg">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleGearSuccess(-1)">-</span>
								  <input
										id="teleGearSuccesstb"
										type="number"
										class="form-control textBox"
										name="teleGearSuccess">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleGearSuccess(1)">+</span>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>Failed Gears<strong>
								</h4>
								<div class="input-group input-group-lg">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleGearFail(-1)">-</span>
								  <input
										id="teleGearFailtb"
										type="number"
										class="form-control textBox"
										name="teleGearFail">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleGearFail(1)">+</span>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>High Goal Accuracy<strong>
									<br>
									<span id="highGoalAccuracy-caption"></span>
								</h4>
								<input
									class="highGoalAccuracy"
									data-container-class='text-center'
									name="teleHighGoalAccuracy">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>High Goal Speed<strong>
									<br>
									<span id="highGoalSpeed-caption"></span>
								</h4>
								<input
									class="highGoalSpeed"
									data-container-class='text-center'
									name="teleHighGoalSpeed">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>Low Goal Accuracy<strong>
									<br>
									<span id="lowGoalAccuracy-caption"></span>
								</h4>
								<input
									class="lowGoalAccuracy"
									data-container-class='text-center'
									name="teleLowGoalAccuracy">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
								<h4 class="center">
									<strong>Low Goal Speed<strong>
									<br>
									<span id="lowGoalSpeed-caption"></span>
								</h4>
								<input
									class="lowGoalSpeed"
									data-container-class='text-center'
									name="teleLowGoalSpeed">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h4 class="center">
									<strong>KPA<strong>
								</h4>
								<div class="input-group input-group-lg">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleKPA(-5)">-5</span>
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleKPA(-1)">-1</span>
								  <input
										id="teleKPAtb"
										type="number"
										class="form-control textBox"
										name="teleKPA">
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleKPA(1)">+1</span>
								  <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTeleKPA(5)">+5</span>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
								<div class="roundedTwo">
									<input
										type="checkbox"
										value=1
										id="teleClimb"
										class="checkbox"
										name="teleClimb" />
									<label for="teleClimb"></label>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<h4 class="checkboxLabel">Climb</h4>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
								<div class="roundedTwo">
									<input
										type="checkbox"
										value=1
										id="teleDisabled"
										name="teleDisabled" />
									<label for="teleDisabled" class="checkboxjs"></label>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
								<h4 class="checkboxLabel">Disabled</h4>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
								<div class="roundedTwo">
									<input
										type="checkbox"
										value=1
										id="groundGear"
										name="groundGear" />
									<label for="groundGear" class="checkboxjs"></label>
								</div>
							</div>
							<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">
								<h4 class="checkboxLabel">Ground Gear Intake</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row notesContainer">
				<div class="col-xs-12">
					<h3 class="center">
						<strong>Notes</strong>
					</h3>
					<textarea
						name="teleNotes"
						id="notesTele"
						class="form-control"
						style="display: block"
						rows="10">
				</textarea>
				</div>
			</div>
		</div>
		<input class="btn btn-danger btn-lg submitButton" type="submit" value="Submit">
		<br>

		<!-- Gear Modal -->
		<div class="modal fade" id="autoGearModal">
		    <div class="modal-dialog blackText">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">
								&times;
							</button>
		          <h4 class="modal-title">Auto Gear Attempt</h4>
		        </div>
		        <div class="modal-body">
							<select class="image-picker" name="gearPeg">
							  <option value=""></option>
							  <option data-img-src="img/arrow-left.png" value="l">
									Left Peg
								</option>
							  <option data-img-src="img/arrow-center.png" value="c">
									Center Peg
								</option>
							  <option data-img-src="img/arrow-right.png" value="r">
									Right Peg
								</option>
							</select>
		        </div>
		        <div class="modal-footer">
		        	<select name="autoGearSuccess">
		        		<option value=0>Fail</option>
		        		<option value=1>Success</option>
		        	</select>
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">
								Close
							</button>
		        </div>
		      </div>
		    </div>
		  </div>

	</form>
</body>
<?php ob_flush(); ?>
</html>
