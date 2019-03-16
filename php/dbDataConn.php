<?php
    /**
     * Inits a connection to the DB
     * It shouldbe included in other PHP files
     *
     * @return  [type]  [return description]
     */

    include 'const.php';

    $dbDataConn = mysqli_connect($GLOBALS['DB']['HOST'],$GLOBALS['DB']['USER'],$GLOBALS['DB']['PW'],$GLOBALS['DB']['DATABASE']);

    if ($dbDataConn->connect_error || $dbDataConn === false) {
        die("Database Connection failed: " . $dbDataConn->connect_error);
    }
?>
