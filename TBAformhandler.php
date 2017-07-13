<?php
include "TBAdata.php";
$TBAdata = new TBAdata;
if ($_POST['action'] == "refresh") {
    $TBAdata->updateData();
    $_SESSION['error']['name'] = "TBA Cache Updated!";
    $_SESSION['error']['desc'] = "Last Update: " . $TBAdata->getUpdateTime();
    $_SESSION['error']['type'] = 1;
    file_put_contents("TBAcacheUpdate.log", file_get_contents("TBAcacheUpdate.log") . $TBAdata->getUpdateTime() . "\r\n");
    echo '<script>window.location.replace("../admin.php");</script>';
}

?>