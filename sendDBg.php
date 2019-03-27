'<?php
  include "global.php";
  include "php/dbDataConn.php";
?>
</head>

<body>
<?php
//      User info
$userid = $_SESSION['userArray']['uid'];
$scoutTeam = $_SESSION['userArray']['scoutTeam'];
$userTeamNum = $_SESSION['teamArray']['num'];

//      Team info
$teamnum = $_POST['teamnum'];
$matchnum = $_POST['matchnum'];
if (isset($_POST['isRed'])) {
    $isRed = $_POST['isRed'];
} else {
    $isRed = false;
}

//      Auto
if (isset($_POST['autoPassHabline'])) {
    $autoHabline = $_POST['autoPassHabline'];
}
else {
    $autoHabline = 0;
}
if (isset($_POST['habStart'])) {
    $habStartLevel = $_POST['habStart'];
}
else {
    $habStartLevel = 0;
}
$autoHatches = $_POST['hatchesPlacedAuto'];
$autoCargo = $_POST['cargoPlacedAuto'];

//      Tele
$teleHatches = $_POST['hatchesPlaced'];
$teleCargo = $_POST['cargoPlaced'];
$teleHabClimb = $_POST['habLevel'];

if (isset($_POST['groundPickupHatch'])) {
    $teleGroundHatch = $_POST['groundPickupHatch'];
}
else {
    $teleGroundHatch = 0;
}
if (isset($_POST['groundPickupCargo'])) {
    $teleGroundCargo = $_POST['groundPickupCargo'];
}
else {
    $teleGroundCargo = 0;
}
if (isset($_POST['upperRocket'])) {
    $teleUpperRocket = $_POST['upperRocket'];
}
else {
    $teleUpperRocket = 0;
}
if (isset($_POST['teleDisabled'])) {
    $teleCapDisabled = $_POST['teleDisabled'];
}
else {
    $teleCapDisabled = 0;
}
$teleNotes = $_POST['teleNotes'];

if ($isRed != 1) {
  $isRed = 0;
}

$cleanNotes = mysqli_real_escape_string($dbDataConn, $teleNotes);

$insertSQL = "INSERT INTO " . $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] . "(`id`, `scoutTeam`, `userID`, `userTeamNum`, `teamNum`, `matchNum`, `isRed`,
`autoPassHabline`, `habStart`, `hatchesPlacedAuto`, `cargoPlacedAuto`, `hatchesPlaced`, `cargoPlaced`, `groundPickupHatch`, `groundPickupCargo`,
`upperRocket`, `teleDisabled`, `habLevel`, `teleCap.notes`, `autoCap.mobile`) VALUES (

DEFAULT,
'$scoutTeam',
'$userid',
'$userTeamNum',
'$teamnum',
'$matchnum',
'$isRed',

'$autoPassHabline',
'$habStartLevel',
'$autoHatches',
'$autoCargo',

'$teleHatches',
'$teleCargo',
'$teleGroundHatch',
'$teleGroundCargo',
'$teleUpperRocket',
'$teleHabClimb',

'$autoCapMobile',
'$cleanNotes',
'$teleCapDisabled')";

//increment matchesScouted when the user submits a sheet
echo "id: ";
echo `id`;
echo "<br>";

echo "userid: ";
echo $userid;
echo "<br>";

$updateSQL = "UPDATE `users` SET `matchesScouted` = `matchesScouted` + 1 WHERE `id`=" . $userid;
$updateSQL = "UPDATE `users` SET `matchesScouted` = `matchesScouted` + 1 WHERE `id`= 1";

if($dbDataConn->query($updateSQL) === TRUE) {
    echo "Query ran successfully";
} else {
    echo "Query failed!";
}

// $insertSQL = "INSERT INTO " . $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] . "(`id`, `scoutTeam`, `userID`, `userTeamNum`, `teamNum`, `matchNum`, `isRed`,
// `autoCap.gear`, `autoCap.gearSuccess`, `autoCap.gearPeg`, `autoCap.passBaseline`, `autoCap.KPA`, `autoCap.highGoalAccuracy`, `autoCap.highGoalSpeed`,
//
// `teleCap.gearSuccess`, `teleCap.gearFailed`, `teleCap.KPA`, `teleCap.highGoalAccuracy`, `teleCap.highGoalSpeed`, `teleCap.lowGoalAccuracy`, `teleCap.lowGoalSpeed`, `teleCap.ballCycles`,
// `teleCap.climb`, `autoCap.mobile`, `teleCap.groundGear`, `teleCap.notes`, `teleCap.disabled`) VALUES (
//
// DEFAULT,
// '$scoutTeam',
// '$userid',
// '$userTeamNum',
// '$teamnum',
// '$matchnum',
// '$isRed',
//
// '$autoAttemptGear',
// '$autoCapGearSuccess',
// '$autoCapGearPeg',
// '$autoCapPassBaseline',
// '$autoCapKPA',
// '$autoCapHighGoalAccuracy',
// '$autoCapHighGoalSpeed',
//
// '$teleGearSuccess',
// '$teleGearFail',
// '$teleCapKPA',
// '$teleCapHighGoalAccuracy',
// '$teleCapHighGoalSpeed',
// '$teleCapLowGoalAccuracy',
// '$teleCapLowGoalSpeed',
// '$teleCapBallCycles',
//
// '$teleCapClimb',
// '$autoCapMobile',
// '$teleCapGroundGear',
// '$cleanNotes',
// '$teleCapDisabled')";

if ($dbDataConn->query($insertSQL) === TRUE) {
    $last_id = mysqli_insert_id($dbDataConn);
    echo "
    <div class='container'>
        <a href='../$matchScoutingPath'><button type='button' class='btn btn-success btn-xl' style='width:100%; height:200px;'><h1 style='font-size: 500%;'>Click Here</h1></button></a>
    </div>
    ";
    echo "<h1> New record created successfully. Last inserted ID is: <strong>" . $last_id . "</strong></h1>";
} else {
    echo "Error: " . $insertSQL . "<br>" . $dbDataConn->error . "
    <div class='container'>
        <a href=../" . $currentsheetPath . " target='_blank'><h1>Click here to open scouting in a new tab.  Please leave this window open in the background so that a scouting head can fix the error.</h1></a>
    </div>
    ";
}

if ($GLOBALS['SLACK_BOT']['ENABLE']) {
    require '/home/ubuntu/workspace/vendor/autoload.php';
    $client = new Maknz\Slack\Client($GLOBALS['SLACK_BOT']['SLACK_HOOK']);

    $settings = [
        'username' => $GLOBALS['SLACK_BOT']['NAME'],
        'channel' => $GLOBALS['SLACK_BOT']['REPORT_CHANNEL'],
        'link_names' => true
    ];

    $selectMatchSQL = mysqli_query($dbDataConn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] . " ORDER BY id DESC limit 1");

    while ($row = mysqli_fetch_array($selectMatchSQL)) {
        if ($GLOBALS['SlackBot']['debug']['all']) {
            echo "LAST MATCH: " . $row['matchNum'] . "<br>";
        }
        if ($matchnum > $row['matchNum']) {
            if ($GLOBALS['SlackBot']['debug']['all']) {
                echo "New Match!<br>";
            }
            $selectLastMatchSQL = mysqli_query($dbDataConn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] . " WHERE `matchNum` = " . ($row['matchNum']-1));
            $i = 0;
            $totals['red'] = 0;
            $totals['blue'] = 0;
            $totals['total'] = 0;

            $data = 0;
            while ($row1 = mysqli_fetch_array($selectLastMatchSQL)) {
                if ($row1['isRed']) {
                    //$data[isRed][number][value]
                    $data[1][$totals['red']]['userID'] = $row1['userID'];
                    $data[1][$totals['red']]['teamNum'] = $row1['TeamNum'];
                    $totals['red']++;
                }
                else {
                    $data[0][$totals['blue']]['userID'] = $row1['userID'];
                    $data[0][$totals['blue']]['teamNum'] = $row1['TeamNum'];
                    $totals['blue']++;
                }
                $totals['total']++;
                $i++;
            }
        }
    }
}


// $selectMatchSQL = mysqli_query($conn, "SELECT * FROM `matchdata` ORDER BY id DESC limit 1");

// require '/home/ubuntu/workspace/vendor/autoload.php';
// $client = new Maknz\Slack\Client('https://hooks.slack.com/services/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');

// $settings = [
//     'username' => $GLOBALS['SLACK_BOT']['NAME'],
//     'channel' => $GLOBALS['SLACK_BOT']['REPORT_CHANNEL'],
//     'link_names' => true
// ];

// while($row = mysqli_fetch_array($selectMatchSQL))
// {
//     echo "LAST MATCH: " . $row['matchNum'];
//     $GLOBALS['lastMatch'] = $row['matchNum'];
//     //echo "Found sql";
//     if ($matchnum > $row['matchNum']) {
//         $prevMatch = $matchnum - 1;
//         //echo "PREV MATCH: " . $prevMatch . "<br>";
//         $selectLastMatchSQL = mysqli_query($conn, "SELECT * FROM $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] WHERE `matchNum` = " . $prevMatch);
//         $numSubmitted = 0;
//         $redTotal = 0;
//         $blueTotal = 0;
//         $subUsernameString = "";
//         while ($row = mysqli_fetch_array($selectLastMatchSQL))
//         {
//             $numSubmitted++;
//             if ($row['isRed']) {
//                 $redTotal++;
//                 //echo "Found Red!";
//             }
//             $blueTotal = $numSubmitted-$redTotal;

//             if ($row['userid'] == "") {
//                 if ($subUsernameString == "") {
//                     $subUsernameString = $GLOBALS['MODALS']['NO_LOGIN_NAME'] . " (" . $row['teamNum'] . ")";
//                 }
//                 else {
//                     $subUsernameString = $subUsernameString . ", " . $GLOBALS['MODALS']['NO_LOGIN_NAME'] . " (" . $row['teamNum'] . ")";
//                 }
//             }
//             else {
//                 if ($subUsernameString == "") {
//                     $subUsernameString = $row['username'] . " (" . $row['teamNum'] . ")";
//                 }
//                 else {
//                     $subUsernameString = $subUsernameString . ", " . $row['username'] . " (" . $row['teamNum'] . ")";
//                 }
//             }
//         }
//         if ($oauthDebug) {
//             echo "Users: " . $subUsernameString;
//         }
//         $color = '#3AA3E3';
//         if ($numSubmitted != $GLOBALS['MODALS']['TEAMS_PER_MATCH']) {
//             $color = "#ff0000";
//         }
//         else {
//             $notifyUsers = "None";
//         }
//         if($numSubmitted != $GLOBALS['MODALS']['TEAMS_PER_MATCH']) {
//             //echo "RED: " . $redTotal;
//             //Post slackbot here
//             $client = new Maknz\Slack\Client('https://hooks.slack.com/services/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', $settings);

//             $client->attach([
//                 'title' => '(' . $redTotal . '/' . $GLOBALS['MODALS']['TEAMS_PER_MATCH']/2 . ' Red) | (' . $blueTotal . '/' . $GLOBALS['MODALS']['TEAMS_PER_MATCH']/2 . ' Blue)',
//                 'title_link' => $GLOBALS['APP_INFO']['EXTERNAL_URL'],
//                 'fallback' => $description,
//                 'text' => $description,
//                 'color' => $color,
//                 'fields' => [
//                     [
//                         'title' => 'Users Submitted:',
//                         'value' => $subUsernameString,
//                         'short' => false // whether the field is short enough to sit side-by-side other fields, defaults to false
//                     ],
//                     [
//                         'title' => 'Attention!',
//                         'value' => $notifyUsers,
//                         'short' => false
//                     ]
//                 ]
//             ])->send('Match #' . $prevMatch . ' results (' . $numSubmitted . '/6)');
//         }
//     }
// }

// function displayAchievement($achievementNum, $colName) {
//     global $conn, $userid, $achievementName, $achievementDesc;
//     echo "<br>";
//     echo '<div class="alert alert-info" role="alert"><h2><strong><i>Achievement get!</i> - ' . $achievementName[$achievementNum] . ':</strong> ' . $achievementDesc[$achievementNum] . '</h2></div>';
//     $addToAchievementSQL = "UPDATE  `sandman`.`userachievements` SET  `" . $colName . "` =  '1' WHERE  `userachievements`.`userid` = '" . $userid . "'";
//     if ($conn->query($addToAchievementSQL) === TRUE) {
//     } else {
//         echo "Error adding to achievement table: " . $conn->error;
//     }
// }

// if (isset($userid) && $GLOBALS['ACHIEVEMENTS']['ENABLE']) {
//     $achievementCheckSQL = mysqli_query($conn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['MATCH_SCOUTING'] . " WHERE userid='" . $userid . "'");
//     $achievementNumRows = mysqli_num_rows($achievementCheckSQL);
//     $achievementEarnedSQL = mysqli_query($conn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['ACHIEVEMENT'] . " WHERE `userid` = '" . $userid . "'");
//     while($achievements = mysqli_fetch_array($achievementEarnedSQL)) {
//         for ($i = 0; $i<$GLOBALS['ACHIEVEMENTS']['START_COL']*2; $i++) {
//             array_shift($achievements);
//         }
//         print_r(var_dump($achievements));
//     }
//     if ($achievementNumRows == $achievementNumMatch1-1) {
//         displayAchievement(0,"match1");
//     }
// }

/*$sqlAchievements = mysqli_query($conn, "SELECT * FROM " . $GLOBALS['DB']['TABLE']['ACHIEVEMENT'] . " WHERE id=" . $userid);
while($row = mysqli_fetch_array($sqlAchievements)){
    //echo
}*/


$dbDataConn->close();
?>
</body>
