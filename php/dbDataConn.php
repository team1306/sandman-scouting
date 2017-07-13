<?php
include 'const.php';
$dbDataConn = mysqli_connect($GLOBALS['DB']['serverName'],$GLOBALS['DB']['user'],$GLOBALS['DB']['password'],$GLOBALS['DB']['tableName']);
if ($dbDataConn->connect_error || $dbDataConn === false) {
    die("Database Connection failed: " . $dbDataConn->connect_error);
}
?>