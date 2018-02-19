<?php include 'global.php'; ?>
<link href="css/achievements.css" rel="stylesheet">
</head>
<body>
    <?php   include 'nav.php';
            include 'php/const.php'; ?>
    <div class="container">
    	<div class="media">
          <div class="media-left">
            <img src="<?php echo $_SESSION['userArray']['image_32']; ?>" class="media-object">
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $_SESSION['userArray']['name'];?></h2>
          </div>
        </div>

    <?php
	    $conn = new mysqli($GLOBALS['DB']['HOST'], $GLOBALS['DB']['USER'], $GLOBALS['DB']['PW'], $GLOBALS['DB']['DATABASE']);
        $getAchievementColSQL = mysqli_query($conn, "SHOW COLUMNS FROM `userachievements`");
        $i = 0;
        while ($row2 = mysqli_fetch_array($getAchievementColSQL)) {
            if ($i>$GLOBALS['ACHIEVEMENTS']['START_COL']-1) {
                $columns[] = $row2['Field'];
            }
            $i++;
        }
    //echo var_dump($columns);

	$userid = $_GET['userid'];
    $checkAchievementSQL = mysqli_query($conn, "SELECT * FROM `userachievements` WHERE `userid`= '" . $userid . "'");
        $i = 0;
        while ($row = mysqli_fetch_array($checkAchievementSQL)) {
            foreach ($columns as $col) {
                echo $col;
                echo var_dump($row[$col]);
                $ownedAchievements[$i] = $row[$col];
                $i++;
            }
        }
        echo var_dump($ownedAchievements);

    //     }
    //     echo "COL VALS: ";
    //     echo var_dump($columns);

        echo '<div class="row">';
        $i = 0;
        foreach ($GLOBALS['ACHIEVEMENTS']['NAME'] as $name) {
            echo '
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
    			<div class="offer offer-success offer-radius">
    				<div class="shape">
    					<div class="shape-text">
    						top
    					</div>
    				</div>
    				<div class="offer-content">
    					<h3 class="lead">'
    						. $GLOBALS['ACHIEVEMENTS']['NAME'][$i] .
    					'</h3>
    					<p>'
    						. $GLOBALS['ACHIEVEMENTS'][''][$i] .
    					'</p>
    				</div>
    			</div>
		    </div>';
            //echo '<div class="col-md-4">' . $GLOBALS['ACHIEVEMENTS']['NAME'][$i] . '</div>';
            //echo '<div class="col-md-8">' . $GLOBALS['ACHIEVEMENTS']['DESC'][$i] . '</div>';
        }
        $i++;
        echo '</div>';
        ?>
	</div>

	<?php
	   // $userid = $_GET['userid'];
	   // $conn = new mysqli($GLOBALS['DB']['HOST'], $GLOBALS['DB']['USER'], $GLOBALS['DB']['PW'], $GLOBALS['DB']['DATABASE']);
    //     $checkAchievementSQL = mysqli_query($conn, "SELECT * FROM `userachievements` WHERE `userid`= '" . $userid . "'");

    //     while ($row = mysqli_fetch_array($checkAchievementSQL)) {
    //         $getAchievementColSQL = mysqli_query($conn, "SHOW COLUMNS FROM `userachievements`");
    //         $i = 0;
    //         while ($row2 = mysqli_fetch_array($getAchievementColSQL)) {
    //             if ($i>$GLOBALS['ACHIEVEMENTS']['START_COL']-1) {
    //                 $columns[] = $row2['Field'];
    //             }
    //             echo $i;
    //             $i++;
    //         }
    //         echo "COL VALS: ";
    //         echo var_dump($columns);
            //print_r(array_values($columns));
            // echo '
            // <div class="container">
            //     <h3>' . $row['username'] . '</h3>
            //     <div class="row">';

        //             $hasAchievements = 0;
        //             $i = 0;
        //             foreach ($columns as $col) {
        //                 if ($row[$col] == 1) {
        //                     echo '<div class="col-md-4">' . $achievementName[$i] . '</div>';
        //                     echo '<div class="col-md-8">' . $achievementDesc[$i] . '</div>';
        //                     //echo "yes";
        //                     if (!$hasAchievements) {
        //                         $hasAchievements = 1;
        //                     }
        //                 }
        //                 $i++;
        //             }
        //         echo '
        //         </div>
        //     </div>
        //     ';
        // }
	?>
	</div>
</div>
</body>
</html>
