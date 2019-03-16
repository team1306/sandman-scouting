<?php
    // TODO: refactor this and getScoutInfo, userCheck into one file

    // Get the username of a user based on userID
    if (!function_exists('getUsername')) {
        function getUsername($userID) {
            include 'const.php';
            $conn = new mysqli($GLOBALS['DB']['HOST'], $GLOBALS['DB']['USER'], $GLOBALS['DB']['PW'], $GLOBALS['DB']['DATABASE']);
            $getUsernameSQL = mysqli_query($conn, "SELECT `name` FROM `users` WHERE `id`=" . $userID);
            while ($row = mysqli_fetch_array($getUsernameSQL)) {
                return $row['name'];
            }
        }
    }
?>
