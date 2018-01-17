<?php
ob_start();
include "global.php";
include "php/const.php";
include "php/debug.php";
include "php/dbDataConn.php";
include "message.php";
?>
</head>

<body>
<?php
$users = mysqli_query($dbDataConn, "SELECT * FROM `users` WHERE `name` = '" . $_POST["uname"] . "' LIMIT 1");
while($row = mysqli_fetch_array($users)) {
    if (!($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] == $_POST['uname'])) {
        $unameInUse = true;
    }
}
if ($unameInUse) {
    echo "<div class='container'><h2>This username is in use! Please use another username. <a href='" . $GLOBALS['PATH']['SETTINGS'] . "'>Back</h2></a></div>";
}
else if ($_POST['uname'] == null && !$_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['slackSignIn']) {
    echo "<div class='container'><h2>Your username can not be null!</h2><a href='/'><button type='button' class='btn btn-success btn-xl' style='width:100%; height:200px;'><h1 style='font-size: 500%;'>Home</h1></button></a></div>";
}
else {
    if (!$_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['slackSignIn']) {
        $updateSQL = "UPDATE `users` SET `team`='" . $_POST["myTeam"] . "', `scoutTeam`='" . $_POST["scoutTeam"] . "',`name`='" . $_POST["uname"] . "',`scoutingAlliance`='" . $_POST['scoutingAlliance'] . "',`scoutingNumber`='" . $_POST['scoutingNumber'] . "' WHERE `id`= '" . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['id'] . "'";
    }
    else {
       $updateSQL = "UPDATE `users` SET `scoutTeam`='" . $_POST["scoutTeam"] . "',`scoutingAlliance`='" . $_POST['scoutingAlliance'] . "',`scoutingNumber`='" . $_POST['scoutingNumber'] . "' WHERE `slackId`= '" . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['id'] . "'";
    }
    if ($GLOBALS['settings']['debug']) {
        echo "<br>Update: '" . $updateSQL . "'";
        echo "<br><br>";
        echo "OLD: " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] . " | " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'] . " | " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'] . " | " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'];
    }
    if ($dbDataConn->query($updateSQL) === TRUE) {
        $last_id = mysqli_insert_id($conn);
        echo "
        <div class='container'>
            <h1> Settings saved!</h1>
            <a href='/'><button type='button' class='btn btn-success btn-xl' style='width:100%; height:200px;'><h1 style='font-size: 500%;'>Home</h1></button></a>
        </div>
        ";
        if (!$_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['slackSignIn']) {
            $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] = $_POST["uname"];
        }
        $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray']['num'] = $_POST["myTeam"];
        $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'] = $_POST['scoutingAlliance'];
        $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'] = $_POST['scoutingNumber'];
        $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'] = $_POST['scoutTeam'];
        if (!$settingsDebug) {
            $message['name'] = "Success!";
            $message['desc'] = "Settings updated.";
            $message['type'] = "success";
            sendMessage($message, $GLOBALS['PATH']['INDEX']);
        }
    }
    else {
        echo "Error: " . $insertSQL . "<br>" . $conn->error . "
        <div class='container'>
            <a href='/' target='_blank'><h1>An error occured.</h1></a>
        </div>
        ";
    }
    $dbDataConn->close();
    if ($GLOBALS['settings']['debug']) {
        echo "NEW: " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['name'] . " | " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'] . " | " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'] . " | " . $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'];
    }
}
ob_flush();
?>
</body>
</html>
