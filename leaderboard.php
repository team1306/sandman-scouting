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
        <h1 style="text-align:center;">Scouting Leaderboard</h1>
        <?php
        include 'php/dbDataConn.php';
        include 'php/getScoutInfo.php';

        $result = mysqli_query($dbDataConn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['USER'] . " ORDER BY id DESC");

        echo "
            <div class='container' style='width:90%'><table align='center' class='table table-striped'>
            <thead>
                <tr>
                    <th>Team</th>
                    <th>Name</th>
                    <th>Slack ID</th>
                    <th>Matches Scouted</th>
                </tr>
            </thead>
                <tbody>";

        $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['uid']=$row['id'];
        while($row = mysqli_fetch_array($result) {
            if($row['name'] == $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name']){
                echo "<b><tr>";
                  echo "<td>" . $row['team'] . "</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['slackId'] . "</td>";
                  echo "<td>" . $row['matchesScouted'] . "</td>";
                echo "</tr></b>";
            }
            else{
            echo "<tr>";
              echo "<td>" . $row['team'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['slackId'] . "</td>";
              echo "<td>" . $row['matchesScouted'] . "</td>";
            echo "</tr>";
            }
        }
        echo "</tbody></table></div>";

        $dbDataConn->close();
        ?>

    </div>
