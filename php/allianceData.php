
<!-- LINK https://goo.gl/rpSy0y -->

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
	<link href="../css/bootstrap.css" rel="stylesheet">
	
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="img/favicon-128.png" sizes="128x128" />

	<!-- Custom CSS -->
	<link href="../css/checkboxes.css" rel="stylesheet">
	<link href="../css/swagboxes.css" rel="stylesheet">
	<link href="../css/disableXScroll.css" rel="stylesheet">
	<link href="../css/sheet.css" rel="stylesheet">
	<link href="../css/global.css" rel="stylesheet">
	<link href="../css/input.css" rel="stylesheet">
	<link href="../css/star-rating.css" rel="stylesheet">
	<link href="../css/navbar.css" rel="stylesheet">

	<!-- Javascript -->
	<!--<script type="text/javascript" src="../js/report2016globalspit.js"></script>-->
	<script type="text/javascript" src="../js/background.js"></script>
	<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="../js/star-rating.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
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
<!--<script type="text/javascript">
$(document).ready(function(){
//  Check Radio-box
    $(".rating input:radio").attr("checked", false);
    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio').change(
    function(){
        var userRating = this.value;
        //alert(userRating);
    }); 
});
</script>-->
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
        <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Scouting <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="2016global.html">Game Scouting</a></li>
            <li><a href="2016globalpit.html">Pit Scouting</a></li>
          </ul>
        </li>
        <li><a href="../report3.php">Results </a></li>
        <li><a href="../removePage.php">DB Managment</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<form id="2016autoform" action="../php/sendDBpit.php" method="post">
		<div class="row" style="padding: 0.6em">
			<div class="col-md-4" style="display:block; margin-left:auto; margin-right:auto;">
				<h3 class="center"><strong>Information</strong></h3>
				<div class="inputBoxes">
					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Alliance</p>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6" style="text-align:center; color:black;">							
							<select name="alliance">
    							<option value=0 onclick="setTeams(1)">1</option>
    							<option value=1 onclick="setTeams(2)">2</option>
   						    	<option value=2>3</option>
    							<option value=3>4</option>
    							<option value=4>5</option>
    							<option value=5>6</option>
    							<option value=6>7</option>
    							<option value=7>8</option>
  							</select>
						</div>
					</div>
					<div class="row">	
						<!--<div class="" style="height:30px"></div> <!--Keep or universe will explode (and it will be your fault!!!)-->
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Match</p>
						</div>
						<div class="col-md-6 col-sm-4 col-xs-4 col-lg-4" style="text-align:center; color:black;">
								<select name="match" style="text-align-left">
	    							<option value=0>Quarterfinals</option>
	    							<option value=1>Semifinals</option>
	  							</select>
  							<br>
  								<input class="textBox" id="matchNum" type="number" maxlength="20" name="matchNum"/>
  						</div>
  					</div>
						<hr>
  					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Team 1: </p>
						</div>
  						<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6 col-xl-6" style="text-align:center; color:black;">
  							<input type="number" name="team1">
  							<select name="category1">
    							<option value=0>Robust</option>
    							<option value=1>Sensitive</option>
   						    	<option value=2>Defense</option>
    							<option value=3>Low Goal Cycler</option>
  							</select>
						</div>
					</div>
  					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Team 2: </p>
						</div>
  						<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6 col-xl-6" style="text-align:center; color:black;">
  							<input type="number" name="team1">
  							<select name="category1">
    							<option value=0>Robust</option>
    							<option value=1>Sensitive</option>
   						    	<option value=2>Defense</option>
    							<option value=3>Low Goal Cycler</option>
  							</select>
						</div>
					</div>
  					<div class="row">
						<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
							<p>Team 3: </p>
						</div>
  						<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6 col-xl-6" style="text-align:center; color:black;">
  							<input type="number" name="team1">
  							<select name="category1">
    							<option value=0>Robust</option>
    							<option value=1>Sensitive</option>
   						    	<option value=2>Defense</option>
    							<option value=3>Low Goal Cycler</option>
  							</select>
						</div>
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
		 $('.driverRating').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#driverRating-caption', 'starCaptions': {1:'Very bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very good'}});
		 $('.driveTrain').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#driveTrain-caption', 'starCaptions': {1:'Very bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very good'}});
		 $('.speed').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#speed-caption', 'starCaptions': {1:'Very bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very good'}});
		 $('.defense').rating({'showCaption':true, 'stars':'5', 'min':'0', 'max':'5', 'step':'1', 'size':'xs', 'clearCaption':'N/A',  'captionElement': '#defense-caption', 'starCaptions': {1:'Very bad', 2:'Bad', 3:'Ok', 4:'Good', 5:'Very good'}});
    });
</script>
<script>
		
		var all1 = [2056, 1690, 3015, 1405];
		var all2 = [2451, 1806, 2194, 1306];
		var all3 = [2834, 33, 1756, 329];
		var all4 = [2823, 3130, 3042, 2415];
		var all5 = [4488, 548, 2363, 1250];
		var all6 = [4391, 5114, 2337, 5854];
		var all7 = [1675, 177, 111, 3044];
		var all8 = [74, 2054, 4468, 3238];
		
		function setTeams(match) {
		if (all == 1) {
			var teams = all1;
		}
		if (all == 2) {
			var teams = all2;
		}
		if (all == 3) {
			var teams = all3;
		}
		if (all == 4) {
			var teams = all4;
		}
		if (all == 5) {
			var teams = all5;
		}
		if (all == 6) {
			var teams = all6;
		}
		if (all == 7) {
			var teams = all7;
		}
		if (all == 8) {
			var teams = all8;
		}
		document.getElementById("team1").value = teams[0];
		document.getElementById("team2").value = teams[1];
		document.getElementById("team3").value = teams[2];
		document.getElementById("team4").value = teams[3];
	}
</script>
</body>
</html>