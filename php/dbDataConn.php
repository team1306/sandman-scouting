<?php
include 'const.php';
$dbDataConn = mysqli_connect($GLOBALS['DB']['HOST'],$GLOBALS['DB']['USER'],$GLOBALS['DB']['PW'],$GLOBALS['DB']['DATABASE']);
if ($dbDataConn->connect_error || $dbDataConn === false) {
    die("Database Connection failed: " . $dbDataConn->connect_error);
}
?>