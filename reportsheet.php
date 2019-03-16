<?php
  include 'global.php';
  include 'php/dbDataConn.php';
?>

<link href="css/reportsheet.css" rel="stylesheet">

<script>
  function load() {
    document.getElementById("search1").value = <?php echo $_SESSION['teamArray']['num']; ?>;
  }
</script>

</head>
<body onload="load();">
  <?php include 'nav.php'; ?>
	<br>
  <div id="reportBox" style="width:85%; margin-left:auto; margin-right:auto; display:block;">
  	<form id="search" action="search6" method="post">
  		<div class="row">
  			<div class="col-sm-4" style="border-style: solid; border-radius: 5px; padding: 4px;">
  				<div class="col-sm-4" style="height:57px">
            <input class="textBox" id="search1" type="number" maxlength="20" name="searchname1"/>
          </div>
  				<div class="col-sm-4" style="height:57px">
            <input class="textBox" id="search2" type="number" maxlength="20" name="searchname2"/>
          </div>
  				<div class="col-sm-4" style="height:57px">
            <input class="textBox" id="search3" type="number" maxlength="20" name="searchname3"/>
          </div>
  			</div>
  			<div class="col-sm-4" style="padding: 4px; border-style: solid; border-radius: 5px;">
  				<div class="col-sm-4" style="height:57px">
            <input class="textBox" id="search4" type="number" maxlength="20" name="searchname4"/>
          </div>
  				<div class="col-sm-4" style="height:57px">
            <input class="textBox" id="search5" type="number" maxlength="20" name="searchname5"/>
          </div>
  				<div class="col-sm-4" style="height:57px">
            <input class="textBox" id="search6" type="number" maxlength="20" name="searchname6"/>
          </div>
  			</div>
  			<div class="col-sm-4" style="padding: 0px;">
  				<div class="col-sm-4" style="height:57px">
            <input class="textBox" id="searchlimit" type="number" maxlength="20" name="limit"/>
          </div>
  				<div class="col-sm-8" style="height:57px">
            <div id="submitBox" style="margin-left:auto; margin-right:auto; display:block;">
              <button type="submit" class="btn btn-danger btn-lg" style="width:100%">
                Submit
              </button>
            </div>
          </div>
  				<!-- <div class="row">
  					<h3>Matches: <a onclick="setTeams(11)">11</a> <a onclick="setTeams(22)">22</a> <a onclick="setTeams(32)">32</a> <a onclick="setTeams(40)">40</a> <a onclick="setTeams(60)">60</a> <a onclick="setTeams(67)">67</a> <a onclick="setTeams(84)">84</a> <a onclick="setTeams(100)">100</a> <a onclick="setTeams(106)">106</a> <a onclick="setTeams(117)">117</a></h3>
  				</div> -->
  			</div>
  		</div>
  	</form>
  </div>
  <br>
  <div class='container' style='width:90%'><table align='center' class='table'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Match</th>
        <th>Team</th>
        <th>Alliance</th>
        <th>Comments</th>
      </tr>
    </thead>
    <tbody>
    <?php

    $matchdata = mysqli_query($dbDataConn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] . " ORDER BY id DESC");

    while($row = mysqli_fetch_array($matchdata)) {
      if ($row['isRed'] == 1) {
        $color = 'red';
      } else {
        $color = 'blue';
      }

      echo "<tr class='$color'>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['matchNum'] . "</td>";
      echo "<td>" . $row['teamNum'] . "</td>";

      if ($row['isRed'] == 1) {
      	echo "<td>" . $GLOBALS['MODALS']['RED'] . "</td>";
      } else {
      	echo "<td>" . $GLOBALS['MODALS']['BLUE'] . "</td>";
      }

      echo "<td>" . $row['teleCap.notes'] . "</td>";
      echo "</tr>";
    }
    ?>
    </tbody>
  </table>
</div>
</body>
<script>

  // TODO: Move this to const.php

  // Fill in matches here and uncomment the links under team inputs
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
		document.getElementById("search6").value = teams[5];
	}
</script>
</html>
