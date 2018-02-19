<?php ob_start();
			include 'global.php'; ?>
	<style>
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
		.red {
	    background-color: #990000;
		}
		.blue {
	    background-color: #0068b3;
		}
	</style>
</head>
<body>
	<?php include 'nav.php';
	      include 'php/debug.php';
				include 'php/userCheck.php';
        include 'TBAdata.php';
        include 'error.php';
				checkUserAdmin(true); ?>
	<br>
	<div class="container">
    	<div class="media">
          <div class="media-left">
            <img src="<?php echo $_SESSION['userArray']['image_32']; ?>" class="media-object">
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $_SESSION['userArray']['name']; ?></h2>
          </div>
        </div>
			</div>
      <br>
        <div class="container">
          <form action="post">
          	<div class="row">
            	<div class="col-sm-6">
                <label>Match Type:</label>
                <select name="matchType">
                  <option value="qm">Qualification</option>
                  <option value="sf">Semifinals</option>
                  <option value="qf">Quarterfinals</option>
                  <option value="f">Finals</option>
                </select>
              </div>
              <div class="col-sm-6">
                  <button type="submit" class="btn btn-danger btn-lg" style="display: block; width: 100%;" value="match">Update Match Type</button>
              </div>
            </div>
          </form>
            <div class="row">
                <div class="col-sm-6">
                    TBA cache last updated:
                    <?php echo getUpdateTime(); ?>
                </div>
                <div class="col-sm-6">
                    <a href="refreshTBACache.php"><button type="button" class="btn btn-danger btn-lg" style="display: block; width: 100%;" value="refresh">Refresh TBA Cache</button></a>
                </div>
            </div>
            <form action="searchValidity.php">
            <div class="row">
                <div class="col-sm-3">
                    <label>Match #:</label>
                    <input type="text" name="matchnum">
                </div>
                <div class="col-sm-3">
                    <label>Set #:</label>
                    <select name="set">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-danger btn-lg" style="display: block; width: 100%;" value="matchNum","set">Validate Match Data</button>
                </div>
            </div>
					</form>
				</div>
					<form action="adminSubmit" method="get">
				    <div id="content">
				    <br>
				    <?php
				    include 'php/dbDataConn.php';
				    include 'php/getScoutInfo.php';

				    $result = mysqli_query($dbDataConn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['USER'] . " ORDER BY id DESC");

				    echo "
						<div class='container' style='width:90%'><table align='center' class='table table-striped'>
					    <thead>
						    <tr>
							    <th> </th>
							    <th>ID</th>
							    <th>Admin</th>
							    <th>Team</th>
							    <th>Name</th>
							    <th>Scout Team</th>
							    <th>Scouting Alliance</th>
							    <th>Scouting Number</th>
						    </tr>
					    </thead>
							<tbody>";

				    while($row = mysqli_fetch_array($result)) {
				        echo "<tr>";
				          echo "<td><input type='radio' name='id' value='" . $row['id'] . "'></td>";
				          echo "<td>" . $row['id'] . "</td>";
									if ($row['isAdmin']) {
										echo "<td><i style='color:green' class='fa fa-check' aria-hidden='true'></i></td>";
									} else {
										echo "<td><i style='color:red' class='fa fa-times' aria-hidden='true'></i></td>";
									}
				          echo "<td>" . $row['team'] . "</td>";
				          echo "<td>" . $row['name'] . "</td>";
				          echo "<td>" . $row['scoutTeam'] . "</td>";
					        if ($row['scoutingAlliance'] == 1) {
										echo "<td class='red'></td>";
					        } else if ($row['scoutingAlliance'] == 2) {
										echo "<td class='blue'></td>";
					        } else {
										echo "<td></td>";
									}
				          echo "<td>" . $row['scoutingNumber'] . "</td>";
				        echo "</tr>";
				    }
				    echo "</tbody></table></div>";

				    $dbDataConn->close();
				    ?>
				    </div>
				    <div id="footer">
				      <div class="row">
				        <div class="col-sm-6">
				          <button type='submit' class='btn btn-danger btn-lg btn-block' style='margin-bottom:5px; margin-right:5px;' name='action' value=0>Remove</button>
				        </div>
				        <div class="col-sm-6">
				          <button type='submit' class='btn btn-danger btn-lg btn-block' style='margin-bottom:5px; margin-right:5px;' name='action' value=1>Toggle Admin</button>
				        </div>
				      </div>
				    </div>
				  </form>
        </div>
    </div>
		<br><br>
</body>
<?php ob_flush(); ?>
</html>
