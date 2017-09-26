<?php
  session_start();
  session_destroy();
  session_start();
  include "php/message.php";
  include "php/const.php";
  $message['name'] = "Info:";
  $message['desc'] = "You have been logged out.";
  $message['type'] = 'info';
  sendMessage($message, $GLOBALS['PATH']['INDEX']);
?>
