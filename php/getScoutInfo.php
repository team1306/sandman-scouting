<?php
function getScoutName($id) {
    include "dbDataConn.php";
    $nameSQL = mysqli_query($dbDataConn, "SELECT `name` from $userTable WHERE `id` = $id");
    while($row = mysqli_fetch_array($nameSQL)) {
        return $row['name'];
    }
    $dbDataConn->close();
}
?>