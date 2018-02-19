<?php
include "const.php";
include "message.php";
if (!function_exists("checkUser")) {
  /**
   * This function checks if the user is signed in. The param $redir is true if user should be redirected.
   * 0 = User is not logged in
   * 1 = User is logged in and has all settings set
   * 2 = User is logged in but has not set all settings
   */
  function checkUser($redir) {
    if (!$redir) {
      if (!isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray'])) {
        return 0;
      } else if (($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'] == 0)
      || ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'] == 0)
      || ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'] == 0)
      || ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray']['num'] == 0)
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'])
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'])
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'])
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray']['num'])) {
  	    return 2;
    	} else {
  	    return 1;
    	}
    } else {
      if (!isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray'])) {
		    $message['name'] = "Error!";
		    $message['desc'] = "Please login or create an account!";
		    $message['type'] = 'danger';
        sendMessage($message, $GLOBALS['PATH']['INDEX']);
      } else if (($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'] == 0)
      || ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'] == 0)
      || ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'] == 0)
      || ($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray']['num'] == 0)
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutTeam'])
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingAlliance'])
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['scoutingNumber'])
      || !isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['teamArray']['num'])) {
        $message['name'] = "Error!";
		    $message['desc'] = "Please set all settings!";
		    $message['type'] = 'danger';
        sendMessage($message, $GLOBALS['PATH']['SETTINGS']);
  	  }
    }
  }
}
if (!function_exists("checkUserAdmin")) {
  /**
   * This function checks if the user is an admin. The param $redir is true if user should be redirected.
   */
  function checkUserAdmin($redir) {      //0=user is admin, 1=user is not admin
    if (!$redir) {
      if (!isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray'])
      || !$_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['isAdmin']) {
        return 1;
      } else {
        return 0;
      }
    } else {
      if (!isset($_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray'])
      || !$_SESSION[$GLOBALS['APP_INFO']['SHORT_NAME']]['userArray']['isAdmin']) {
        $message['name'] = "Error!";
        $message['desc'] = "You must be an admin to access this page!";
        $message['type'] = 'danger';
        sendMessage($message, $GLOBALS['PATH']['INDEX']);
      }
    }
  }
}
?>
