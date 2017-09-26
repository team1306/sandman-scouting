<?php include 'global.php';
    include 'php/debug.php'; ?>
</head>
<body onload="load()">
	<?php include 'nav.php'; ?>
	<br>
	<?php
	  if (!isset($_SESSION['userArray']['name'])) {
	    echo "<script>window.history.back()</script>";
	  }
	  if ($GLOBALS['settings']['debug']) {
	    echo $_SESSION['userArray']['id'] . " | " . $_SESSION['userArray']['name'] . " | " . $_SESSION['teamArray']['num'] . " | " . $_SESSION['userArray']['scoutingAlliance'] . " | " . $_SESSION['userArray']['scoutingNumber'] . " | " . $_SESSION['userArray']['scoutTeam'];
	  }
	?>
	<div class="container">
    	<div class="media">
          <div class="media-left">
          <img src="<?php if ($_SESSION['userArray']['slackSignIn']) { echo $_SESSION['userArray']['image_32']; } ?>" class="media-object">
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $_SESSION['userArray']['name'];?></h2>
          </div>
        </div>
        <br>
      <form action="settingSubmit" method="post">
        <?php
          if (!$_SESSION['userArray']['slackSignIn']) {
            echo '
            <div class="form-group">
              <label for="usr">Change username: </label>
              <input type="text" class="form-control" id="usr" name="uname" maxlength="30" value="' . $_SESSION['userArray']['name'] . '">
            </div>
            ';
          }
            echo '<div class="form-group"> <label>My Team: </label>';
            foreach ($GLOBALS['scoutingTeams'] as $team) {
              echo '<label class="radio-inline"><input type="radio" name="myTeam" id="' . $team . '" value="' . $team . '">' . $team . '</label>';
            }
            echo '<label class="radio-inline"><input type="radio" name="myTeam" id="1" value="1">Other <input type="number" name="myTeamOther"></div>';
        ?>
        <div class="form-group">
          <label>Scouting Team: </label>
            <label class="radio-inline"><input type="radio" name="scoutTeam" id="steam1" value="1">1</label>
            <label class="radio-inline"><input type="radio" name="scoutTeam" id="steam2" value="2">2</label>
        </div>
        <div class="form-group">
          <label>Scouting: </label>
            <select name="scoutingAlliance">
              <?php
              if ($_SESSION['userArray']['scoutingAlliance'] == 1) {  //Scouting alliance red
                echo '
                  <option value="1">Red</option>
                  <option value="2">Blue</option>
                ';
              }
              else if ($_SESSION['userArray']['scoutingAlliance'] == 2) { //Scouting alliance blue
                echo '
                  <option value="2">Blue</option>
                  <option value="1">Red</option>
                ';
              }
              else {  //No set scouting alliance
                echo '
                  <option value="0">Select Alliance</option>
                  <option value="1">Red</option>
                  <option value="2">Blue</option>
                ';
              }
              ?>
            </select>
            <select name="scoutingNumber">
              <?php
              if ($_SESSION['userArray']['scoutingNumber'] == 1) {
                echo '
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  ';
              }
              else if ($_SESSION['userArray']['scoutingNumber'] == 2) {
                echo '
                  <option value="2">2</option>
                  <option value="1">1</option>
                  <option value="3">3</option>
                  ';
              }
              else if ($_SESSION['userArray']['scoutingNumber'] == 3) {
                echo '
                  <option value="3">3</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  ';
              }
              else {
                echo '
                <option value="0">Select Number</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                ';
              }
              ?>
            </select>
        </div>
        <div style="margin-left:auto; margin-right:auto; display:block;"><button type="submit" class="btn btn-danger btn-lg" style="width:100%">Save</button></div>
      </form>
    </div>
    <script>
        function load() {
          var slackSignIn = "<?php echo $_SESSION['userArray']['slackSignIn'] ?>";
          if (!slackSignIn) {
            var userTeamJS = "<?php echo $_SESSION['teamArray']['num']; ?>";
            document.getElementById(userTeamJS).checked = true;
          }
            var scoutTeamJS = "steam<?php echo $_SESSION['userArray']['scoutTeam']; ?>";
            document.getElementById(scoutTeamJS).checked = true;
        }
    </script>
</body>
</html>
