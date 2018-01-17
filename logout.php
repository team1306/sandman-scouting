<?php
  session_start();
  session_destroy();
  session_start();
  include "php/message.php";
  include "php/const.php";
  $_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']] = [];
  $message['name'] = "Info:";
  $message['desc'] = "You have been logged out.";
  $message['type'] = 'info';
  sendMessage($message, $GLOBALS['PATH']['INDEX']);
?>
