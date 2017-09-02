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

	<form id="2016autoform" action="../php/sendDBpit.php" method="post">
		<div class="row" style="padding: 0.6em">
			<div class="col-md-4" style="display:block; margin-left:auto; margin-right:auto;">
				<h3 class="center"><strong>Information</strong></h3>
				<div class="inputBoxes">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Team Number:</p>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
							<input class="textBox" id="tTeamNum" type="number" maxlength="20" name="teamnum" required/>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Category:</p>
						</div>
						<div class="col-md-6 col-sm-4 col-xs-4 col-lg-4" style="text-align:center; color:black;">
							<select name="category">
   						    	<option value=0>Gear Cycler</option>
    							<option value=1>Defense</option>
    							<option value=2>Fuel</option>
  							</select>
  						</div>
  					</div>
						<hr>
						<h4 class="center"><strong>Driver Rating</strong><br><span id="driverRating-caption"></span></h4>
						<input class="driverRating" data-container-class='text-center' name="driverRating">

						<h4 class="center"><strong>Gear Rating</strong><br><span id="gear-caption"></span></h4>
						<input class="gear" data-container-class='text-center' name="gearRating">

						<h4 class="center"><strong>Shooter Rating</strong><br><span id="shooter-caption"></span></h4>
						<input class="shooter" data-container-class='text-center' name="shooterRating">

						<h4 class="center"><strong>Speed Rating</strong><br><span id="speed-caption"></span></h4>
						<input class="speed" data-container-class='text-center' name="speedRating">

						<h4 class="center"><strong>Defense Rating</strong><br><span id="defense-caption"></span></h4>
						<input class="defense" data-container-class='text-center' name="defenseRating">
				</div>
			</div>
		</div>
		<div class="container">
		<h3 class="center"><strong>Notes</strong></h3>
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
<script>
    jQuery(document).ready(function () {
		 $('.driverRating').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#driverRating-caption', 'starCaptions': {1:'Very Bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very Good'}});
		 $('.gear').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#gear-caption', 'starCaptions': {1:'Very Bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very Good'}});
		 $('.shooter').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#shooter-caption', 'starCaptions': {1:'Very Bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very Good'}});
		 $('.speed').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#speed-caption', 'starCaptions': {1:'Very bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very good'}});
		 $('.defense').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#defense-caption', 'starCaptions': {1:'Very Bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very Good'}});
    });
</script>
</body>
</html>
