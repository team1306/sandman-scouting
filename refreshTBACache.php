<?php
include "TBAdata.php";
include "php/message.php";
$TBAdata = new TBAdata;
$TBAdata->updateData();

file_put_contents($GLOBALS['TBA']['PATH']['CACHE']['UPDATELOG'], file_get_contents($GLOBALS['TBA']['PATH']['CACHE']['UPDATELOG']) . $TBAdata->getUpdateTime() . "\r\n");

$message['name'] = "TBA Cache Updated!";
$message['desc'] = "Last Update: " . $TBAdata->getUpdateTime();
$message['type'] = "success";

if (!$GLOBALS['TBA']['debug']['match'] && !$GLOBALS['TBA']['debug']['all']) {
    sendMessage($message, $GLOBALS['PATH']['ADMIN']);
}
?>
