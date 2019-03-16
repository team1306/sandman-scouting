<?php

    // This script inits a connection to the DB
    // It should be included in other PHP files

    include 'const.php';

    $dbDataConn = mysqli_connect($GLOBALS['DB']['HOST'],$GLOBALS['DB']['USER'],$GLOBALS['DB']['PW'],$GLOBALS['DB']['DATABASE']);

    if ($dbDataConn->connect_error || $dbDataConn === false) {
        die("Database Connection failed: " . $dbDataConn->connect_error);
    }

?>
