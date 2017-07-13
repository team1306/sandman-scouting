<?php
    function getLastMatch() {
        include 'php/dbDataConn.php';
        $recentMatchSQL = mysqli_query($dbDataConn, "SELECT `matchNum` FROM `matchdata` ORDER BY `id` DESC limit 1");
        while($row = mysqli_fetch_array($recentMatchSQL)) {
            return $row['matchNum'];
        }
    }
    function getNextMatch() {
        return getLastMatch()+1;
    }
?>