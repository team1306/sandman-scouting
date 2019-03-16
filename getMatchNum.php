<?php
    // Gets the last match number that was submitted to the DB
    if (!function_exists("getLastMatch")) {
        function getLastMatch() {
            include 'php/dbDataConn.php';
            $recentMatchSQL = mysqli_query($dbDataConn, "SELECT `matchNum` FROM `matchdata` ORDER BY `id` DESC limit 1");
            while($row = mysqli_fetch_array($recentMatchSQL)) {
                return $row['matchNum'];
            }
        }
    }
    // Gets the next match number (last match + 1)
    if (!function_exists("getNextMatch")) {
        function getNextMatch() {
            return getLastMatch()+1;
        }
    }
?>