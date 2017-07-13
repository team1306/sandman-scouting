<?php
ob_start();
session_start();
include "php/debug.php";
include "php/const.php";
include "php/dbDataConn.php";
include "userCheck.php";

$codeIs = $_GET['code'];
$json = file_get_contents('https://slack.com/api/oauth.access?code=' . $codeIs . '&client_id=3325716591.80369238817&client_secret=74c0ce43b13698ec87c5d6d8dea08ca5');

$jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($json, TRUE)), RecursiveIteratorIterator::SELF_FIRST);     //Create json iterator to look through json payload from slack

$idCounter = 0;
$arrayCounter = 0;
foreach ($jsonIterator as $key => $val) {       //Add each variable to a session variable
    if(is_array($val)) {
        if ($arrayCounter == 0) {
            $_SESSION["userArray"] = $val;
            if ($GLOBALS['login']['debug']['oauth']) {
                echo "userArray<br>";
                echo var_dump($val);
            }
        }
        else {
            $_SESSION["teamArray"] = $val;
            if ($GLOBALS['login']['debug']['oauth']) {
                echo "teamArray<br>";
                echo var_dump($val); 
            }
        }
        $arrayCounter++;
        if ($GLOBALS['login']['debug']['oauth']) {
            echo "<br><br>";
            print_r(array_values($val));
            echo $val[1];
            echo "<br><br>";
        }
    }
}

$_SESSION['userArray']['slackSignIn'] = true;       //Slack is signed in

$user = mysqli_query($dbDataConn, "SELECT * FROM `users` WHERE `slackId` = '" . $_SESSION['userArray']['id'] . "'");     //Query for selecting users with the same username to see if this user exists in db
while ($row = mysqli_fetch_array($user)) {      //Fetch results from query
    $userExists = true;
    if ($GLOBALS['login']['debug']['oauth']) {
        echo "<br>User in `users` db";
    }
}
if (!$userExists) {
    $addUserSQL = "INSERT INTO `users`(`id`, `slackId`, `team`, `name`) VALUES ('DEFAULT','" . $_SESSION['userArray']['id'] . "','" . $_SESSION['teamArray']['num'] . "','" . $_SESSION['userArray']['name'] . "')";
    if ($dbDataConn->query($addUserSQL) === TRUE) {
        if ($GLOBALS['login']['debug']['oauth']) {
            echo "<br>User added to `users` db";
        }
    }
    else {
        echo $dbDataConn->error;
    }
}
$user2 = mysqli_query($dbDataConn, "SELECT * FROM `users` WHERE `slackId` = '" . $_SESSION['userArray']['id'] . "'");
while ($row = mysqli_fetch_array($user2)) {      //Fetch results from query //User exists in db
    $_SESSION['userArray']['uid'] = $row['id'];
    $_SESSION['userArray']['name'] = $row['name'];
    $_SESSION['teamArray']['num'] = $row['team'];
    $_SESSION['userArray']['scoutingAlliance'] = $row['scoutingAlliance'];
    $_SESSION['userArray']['scoutingNumber'] = $row['scoutingNumber'];
    $_SESSION['userArray']['scoutTeam'] = $row['scoutTeam'];
}

if (!$GLOBALS['login']['debug']['oauth']) {
    echo "Welcome, " . $_SESSION['userArray']['name'] . ". Redirecting you to the homepage...  If you are not automatically redirected, <a href='/'>click here</a>.";
    checkUser(true);
}
else {
    echo "<br><br><a href='/'>Home</a>  -  <a href='oauthLogout'>Logout</a><br><br>";
}

// $checkAchievementSQL = mysqli_query($dbDataConn, "SELECT * FROM `userachievements` WHERE `userid`= '" . $_SESSION['userArray']['id'] . "'");
// echo "<br>DB: " . mysqli_num_rows($checkAchievementSQL) . "   UID: " . $_SESSION['userArray']['id'] . "<br>";
// if (mysqli_num_rows($checkAchievementSQL) > 0) {
//     if ($oauthDebug) {
//         echo "User in achievement db";
//     }
// }
// else {
//     $achievementInsertUserSQL = "INSERT INTO " . $achievementTable . " (`id`, `userid`, `username`) VALUES (DEFAULT,'" . $_SESSION['userArray']['id'] . "','" . $_SESSION['userArray']['name'] . "')";
//     if ($dbDataConn->query($achievementInsertUserSQL) == TRUE) {
//         if ($oauthDebug) {
//             echo "Add user to achievement db success";
//         }
//     }
//     else {
//         if ($oauthDebug) {
//             echo "Add user to achievement db fail: " . $dbDataConn->error;
//         }
//     }
// }
ob_flush();
?>