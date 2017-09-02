<?php
function getScoutName($id) {
    include "dbDataConn.php";
    $nameSQL = mysqli_query($dbDataConn, "SELECT `name` from $GLOBALS['DB']['TABLE']['USER'] WHERE `id` = $id");
    while($row = mysqli_fetch_array($nameSQL)) {
        return $row['name'];
    }
    $dbDataConn->close();
}
?>