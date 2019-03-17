<?php ob_start();
				include "global.php";
	?>

<!-- Custom gamesheet CSS -->
<link href="css/checkboxes.css" rel="stylesheet">
<link href="css/sheet.css" rel="stylesheet">
<link href="css/star-rating.css" rel="stylesheet">
<link href="css/image-picker.css" rel="stylesheet">

<!-- Custom gamesheet JS -->
<script type="text/javascript" src="js/sheet2018.js"></script>
<script type="text/javascript" src="js/background.js"></script>
<script type="text/javascript" src="js/star-rating.js"></script>
<script type="text/javascript" src="js/image-picker.js"></script>

</head>

<script>
    //This function runs once the body has finished loading
function load() {
	//Check which alliance they are scouting
	if (<?php echo $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance']; ?> == 1) {
    setColor('red');
	} else {
    setColor('blue');
    document.getElementById('slideTwo').checked = false;
	}
	setStars();
	setValues();
}
//This function searches the body and finds all of the star ratings and shows the stars to make it look more pretty
function setStars() {
	$('.intake').rating(
		{
			'showCaption':true,
			'stars':'4',
			'min':'0',
			'max':'4',
			'step':'1',
			'size':'xs',
			'clearCaption':'N/A',
			'captionElement': '#intake-caption',
			'starCaptions': {
				0:'N/A',
				1:'V Bad',
				2:'Bad',
				3:'Ok',
				4:'Good'
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
// Set all textboxes to 0 or their correct values
function setValues() {
	// Set these textboxes to 0
	var textboxes = [
		"autoCubeSwitchSuccesstb",
		"autoCubeSwitchFailtb",
		"autoCubeScaleSuccesstb",
		"autoCubeScaleFailtb"
	];

	textboxes.forEach(function (id) {
		document.getElementById(id).value = 0;
	});

	// Set matchnumber to the current match number and set the team to the data from TBA
	var matchNum = <?php include "getMatchNum.php"; echo getNextMatch();?>;
	var team = '<?php include "TBAdata.php"; echo getTeam('qm', 1, getNextMatch(), $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'], ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber']-1)); ?>';
	document.getElementById("tTeamNum").value = team;
	document.getElementById("tMatchNumber").value = matchNum;
};
// Run JQuery when the document is done loading to set the imagepicker
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
                                    <input class="textBox" id="tTeamNum" type="number" maxlength="20" name="teamnum" value="0" required="" style="background-color: black; color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
                                    <p class="center">Match Number:</p>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
                                    <input class="textBox" id="tMatchNumber" type="number" maxlength="10" name="matchnum" required="" style="background-color: black; color: white;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5">
                                    <p class="center">Alliance:</p>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
                                    <section title=".slideTwo">
                                        <div class="slideTwo">
                                            <input type="checkbox" onclick="backgroundSwitch();" value="1" id="slideTwo" name="isRed" checked="">
                                            <label for="slideTwo"></label>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="center">

                            <strong>Sandstorm</strong></h3>
                        <div class="border">
                            <div class="row">

                                <div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <h4 class="checkboxLabel">Cross HAB Line</h4>
                                <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                    <div class="roundedTwo">
                                        <input type="checkbox" value="1" id="autoPassHabline" name="autoPassHabline">
                                        <label for="autoPassHabline" class="checkboxjs"></label>
                                    </div>
                                </div></div><div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                        <h4 class="checkboxLabel">Started off level 2</h4>
                                    </div><div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                                    <div class="roundedTwo">
                                                        <input type="checkbox" value="1" id="habStart" name="habStart">
                                                        <label for="habStart" class="checkboxjs"></label>
                                                    </div>
                                                </div><strong><strong>
                                            <strong><strong>
                                                </strong></strong></strong></strong>
                                </div>


                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <h4 class="center">
                                        <strong>Hatches Placed<strong>
                                            </strong></strong></h4><strong><strong>
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTextbox(-1, true, 'hatchesPlacedAutotb')" style="background-color: black; color: white; border-color: black;">-</span>
                                                <input id="hatchesPlacedAutotb" type="number" class="form-control textBox" name="hatchesPlacedAuto" style="background-color: black; color: white;">
                                                <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTextbox(1, true, 'hatchesPlacedAutotb')" style="background-color: black; color: white; border-color: black;">+</span>
                                            </div>
                                        </strong></strong>
                                </div><strong><strong>
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                            <h4 class="center">
                                                <strong>Cargo Placed<strong>
                                                    </strong></strong></h4><strong><strong>
                                                    <div class="input-group input-group-lg">
                                                        <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTextbox(-1, true, 'cargoPlacedAutotb')" style="background-color: black; color: white; border-color: black;">-</span>
                                                        <input id="cargoPlacedAutotb" type="number" class="form-control textBox" name="cargoPlacedAuto" style="background-color: black; color: white;">
                                                        <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" onclick="setTextbox(1, true, 'cargoPlacedAutotb')" style="background-color: black; color: white; border-color: black;">+</span>
                                                    </div>
                                                </strong></strong>
                                        </div><strong><strong>
                                            </strong></strong>
                                    </strong></strong>
                            </div><strong><strong><strong>

                                        <strong><strong><strong>
                                                </strong></strong></strong></strong></strong></strong>
                        </div><strong><strong><strong>
                                </strong></strong></strong>
                    </div><strong><strong><strong>
                                <div class="col-md-4">
                                    <h3 class="center">
                                        <strong>Teleop</strong>
                                    </h3>
                                    <div class="border">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                <h4 class="center">
                                                    <strong>Hatches Placed<strong>
                                                        </strong></strong></h4><strong><strong>
                                                        <div class="input-group input-group-lg">
                                                            <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" style="background-color: black; color: white; border-color: black;" onclick="setTextbox(-1, true, 'hatchesPlacedtb')">-</span>
                                                            <input id="hatchesPlacedtb" type="number" class="form-control textBox" name="hatchesPlaced" style="background-color: black; color: white;">
                                                            <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" style="background-color: black; color: white; border-color: black;" onclick="setTextbox(1, true, 'hatchesPlacedtb')">+</span>
                                                        </div>
                                                    </strong></strong>
                                            </div><strong><strong>
                                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                        <h4 class="center">
                                                            <strong>Cargo Placed<strong>
                                                                </strong></strong></h4><strong><strong>
                                                                <div class="input-group input-group-lg">
                                                                    <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" style="background-color: black; color: white; border-color: black;" onclick="setTextbox(-1, true, 'cargoPlacedtb')">-</span>
                                                                    <input id="cargoPlacedtb" type="number" class="form-control textBox" name="cargoPlaced" style="background-color: black; color: white;">
                                                                    <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" style="background-color: black; color: white; border-color: black;" onclick="setTextbox(1, true, 'cargoPlacedtb')">+</span>
                                                                </div>
                                                            </strong></strong>
                                                    </div><strong><strong>
                                                        </strong></strong>
                                                </strong></strong>
                                        </div><strong><strong><strong>
                                                    <hr>
                                                    <div class="row">

                                <div>
                                    <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <h4 class="checkboxLabel">Ground Pickup Hatch</h4>
                                <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                    <div class="roundedTwo">
                                        <input type="checkbox" value="1" id="groudPickupHatch" name="groudPickupHatch">
                                        <label class="checkboxjs" for="groudPickupHatch"></label>
                                    </div>
                                </div></div><div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                        <h4 class="checkboxLabel">Ground Pickup Cargo</h4>
                                    </div><div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                                    <div class="roundedTwo">
                                                        <input type="checkbox" value="1" id="groudPickupCargo" name="groudPickupCargo">
                                                        <label class="checkboxjs" for="groudPickupCargo"></label>
                                                    </div>
                                                </div><strong><strong>
                                            <strong><strong>
                                                </strong></strong></strong></strong>
                                </div>


    </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <h4 class="checkboxLabel">Place on Upper Rocket</h4>
                                <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                    <div class="roundedTwo">
                                        <input type="checkbox" value="1" id="upperRocket" name="upperRocket">
                                        <label class="checkboxjs" for="upperRocket"></label>
                                    </div>
                                </div></div>
    </div>
                                                    <strong><strong><strong>

                                                                <strong><strong><strong>
                                                                            <div>
                                                                                <strong><strong>
                                                                                    </strong></strong></div><strong><strong>

                                                                                </strong></strong>
                                                                        </strong></strong></strong></strong></strong></strong>
                                                </strong></strong></strong>
                                    </div><strong><strong><strong>
                                            </strong></strong></strong>
                                </div><strong><strong><strong>
                                        </strong></strong></strong>
                                <div class="col-md-4">
                                    <h3 class="center">
                                        <strong>End Game</strong>
                                    <div class="border">
        <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                    <h4 class="checkboxLabel">Disabled</h4>
                                <div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">
                                    <div class="roundedTwo">
                                        <input type="checkbox" value="1" id="teleDisabled" name="teleDisabled">
                                        <label class="checkboxjs" for="teleDisabled"></label>
                                    </div>
                                </div></div><div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
                                                        <h4 class="center">
                                                            <strong>HAB Level Climbed<strong>
                                                                </strong></strong></h4><strong><strong>
                                                                <div class="input-group input-group-lg">
                                                                    <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" style="background-color: black; color: white; border-color: black;" onclick="setTextbox(-1, true, 'habLeveltb')">-</span>
                                                                    <input type="number" class="form-control textBox" style="background-color: black; color: white;" name="habLevel" id="habLeveltb">
                                                                    <span class="input-group-addon noselect buttonInputNormal blackBackground addsubButton" style="background-color: black; color: white; border-color: black;" onclick="setTextbox(1, true, 'habLeveltb')">+</span>
                                                                </div>
                                                            </strong></strong>
                                                    </div>

                                        <strong><strong>


                                            </strong></strong>
        </div></div></h3>

                                </div>
                </strong></strong></strong></div>



            </div><strong><strong><strong>
                        <div class="row notesContainer">
                            <div class="col-xs-12">
                                <h3 class="center">
                                    <strong>Notes</strong>
                                </h3>
                                <textarea name="teleNotes" id="notesTele" class="form-control" style="display: block" rows="10"></textarea>
                            </div>
                        </div>
                        <input class="btn btn-danger btn-lg btn-block submitButton" type="submit" value="Submit" style="background-color: black; color: white;">
                    </strong></strong></strong>
            <strong><strong>
                    <br>

                    <!-- Gear Modal -->
                    <div class="modal fade" id="autoGearModal">
                        <div class="modal-dialog blackText">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        ×
                                    </button>

                                </div>

                                <div>

                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="background-color: black; color: white;">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </strong></strong>
        </form>
</body>
<?php ob_flush(); ?>

</html>
