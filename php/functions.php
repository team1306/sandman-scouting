<?php
function getUsername($userID) {
    include "const.php";
    $conn = new mysqli($DBservername, $DBuser, $DBpassword, $DBname);
    $getUsernameSQL = mysqli_query($conn, "SELECT `name` FROM `users` WHERE `id`=" . $userID);
    while ($row = mysqli_fetch_array($getUsernameSQL)) {
        return $row['name'];
    }
}
?>