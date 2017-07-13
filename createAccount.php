<?php include 'global.php'; ?>
</head>
<body>
	<?php include 'nav.php'; ?>
	<br>
	<div class="container">
      <form action="createAccountSubmit" method="post">
        <div class="form-group">
          <label for="usr">Username: </label>
          <input type="text" class="form-control" id="usr" name="uname" maxlength="30" required>
        </div>
        <div class="form-group">
          <label for="usr">Password: </label>
          <input type="password" class="form-control" id="pin" name="pin" maxlength="30" required>
        </div>
        <div class="form-group">
          <?php
          echo '<div class="form-group"> <label>My Team: </label>';
          foreach ($GLOBALS['scoutingTeams'] as $team) {
            echo '<label class="radio-inline"><input type="radio" name="myTeam" id="' . $team . '" value="' . $team . '">' . $team . '</label>';
          }
          echo '<label class="radio-inline"><input type="radio" name="myTeam" id="1" value="1">Other <input type="number" name="myTeamOther"></div>';
          ?>
        </div>
        <div class="form-group">
          <label>Scouting Team: </label>
            <label class="radio-inline"><input type="radio" name="scoutTeam" value="1">1</label>
            <label class="radio-inline"><input type="radio" name="scoutTeam" value="2">2</label>
        </div>
        <div class="form-group">
          <label>Scouting: </label>
            <select name="scoutingAlliance">
              <option value="null">Select Alliance</option>
              <option value="1">Red</option>
              <option value="2">Blue</option>
            </select>
            <select name="scoutingNumber">
              <option value="null">Select Number</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
        </div>
        <div style="margin-left:auto; margin-right:auto; display:block;"><button type="submit" class="btn btn-danger btn-lg" style="width:100%">Save</button></div>
      </form>
    </div>
</body>
</html>