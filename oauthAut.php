<?php
ob_start();
session_start();
include "php/debug.php";
include "php/const.php";
include "php/dbDataConn.php";
include "php/userCheck.php";

$codeIs = $_GET['code'];
$json = file_get_contents("https://slack.com/api/oauth.access?code={$codeIs}&client_id={$GLOBALS['OAUTH']['CLIENT_ID']}&client_secret={$GLOBALS['OAUTH']['CLIENT_SECRET']}&redirect_uri={$GLOBALS['OAUTH']['EXTERNAL_URI']}");

// Create json iterator to look through json payload from Slack
$jsonIterator = new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($json, true)), RecursiveIteratorIterator::SELF_FIRST);

if ($GLOBALS['OAUTH']['DEBUG']) {
  echo $json . "<br><br><br>";
}

$idCounter = 0;
$arrayCounter = 0;
// Add each variable to a session variable
foreach ($jsonIterator as $key => $val) {
  if ($GLOBALS['OAUTH']['DEBUG']) {
    echo "<br><br>[ KEY: {$key} | VAL: {$val} ]<br><br>";
  }
  if ($key == "ok") {
    if ($value == "false" || $value == "0") {
      echo "An error occurred! See the message below.";
    }
  } elseif ($key == "error") {
    echo "Error: {$value}";
    break 1;
  } else {
    // No error
    if ($key == "user" && is_array($val)) {
      $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray'] = $val;
      if ($GLOBALS['OAUTH']['DEBUG']) {
        echo "userArray: <br><br>" . var_dump($val) . "<br><br>";
      }
    } else if ($key == "team" && is_array($val)) {
      $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray'] = $val;
      if ($GLOBALS['OAUTH']['DEBUG']) {
        echo "userArray: <br><br>" . var_dump($val) . "<br><br>";
      }
    }
  }
}

$_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['slackSignIn'] = true;       //Slack is signed in

// Query for selecting users with the same username to see if this user exists in db
$user = mysqli_query($dbDataConn, "SELECT * FROM `users` WHERE `slackId` = '" . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['id'] . "'");
while ($row = mysqli_fetch_array($user)) {      //Fetch results from query
  $userExists = true;
  if ($GLOBALS['OAUTH']['DEBUG']) {
    echo "<br>User in `users` db";
  }
}
if (!$userExists) {
  $addUserSQL = "INSERT INTO `users`(`id`, `slackId`, `team`, `name`) VALUES ('DEFAULT','" . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['id'] . "','" . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray']['num'] . "','" . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] . "')";
  if ($dbDataConn->query($addUserSQL) === true) {
    if ($GLOBALS['OAUTH']['DEBUG']) {
      echo "<br>User added to `users` db";
    }
  } else {
    echo $dbDataConn->error;
  }
}
$user2 = mysqli_query($dbDataConn, "SELECT * FROM `users` WHERE `slackId` = '" . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['id'] . "'");
while ($row = mysqli_fetch_array($user2)) {      //Fetch results from query //User exists in db
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['uid'] = $row['id'];
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['isAdmin'] = $row['isAdmin'];
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] = $row['name'];
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray']['num'] = $row['team'];
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'] = $row['scoutingAlliance'];
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'] = $row['scoutingNumber'];
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'] = $row['scoutTeam'];
}

if (!$GLOBALS['OAUTH']['DEBUG']) {
  echo "Welcome, " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] . ". Redirecting you to the homepage...  If you are not automatically redirected, <a href='/sandman/index'>click here</a>.";
  checkUser(true);
  $message['name'] = "Success!";
  $message['desc'] = "You are now logged in.";
  $message['type'] = 'success';
  sendMessage($message, $GLOBALS['PATH']['INDEX']);
} else {
  echo "<br><br><a href='{$GLOBALS['PATH']['ROOT']}'>Home</a>  -  <a href='logout'>Logout</a><br><br>";
}

// $checkAchievementSQL = mysqli_query($dbDataConn, "SELECT * FROM `userachievements` WHERE `userid`= '" . $_SESSION['userArray']['id'] . "'");
// echo "<br>DB: " . mysqli_num_rows($checkAchievementSQL) . "   UID: " . $_SESSION['userArray']['id'] . "<br>";
// if (mysqli_num_rows($checkAchievementSQL) > 0) {
//     if ($oauthDebug) {
//         echo "User in achievement db";
//     }
// }
// else {
//     $achievementInsertUserSQL = "INSERT INTO " . $GLOBALS['DB']['TABLE']['ACHIEVEMENT'] . " (`id`, `userid`, `username`) VALUES (DEFAULT,'" . $_SESSION['userArray']['id'] . "','" . $_SESSION['userArray']['name'] . "')";
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
