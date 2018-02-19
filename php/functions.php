<?php
function getUsername($userID) {
    include "const.php";
    $conn = new mysqli($GLOBALS['DB']['HOST'], $GLOBALS['DB']['USER'], $GLOBALS['DB']['PW'], $GLOBALS['DB']['DATABASE']);
    $getUsernameSQL = mysqli_query($conn, "SELECT `name` FROM `users` WHERE `id`=" . $userID);
    while ($row = mysqli_fetch_array($getUsernameSQL)) {
        return $row['name'];
    }
}
function console_log( $data ) {
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
?>
