<?php
include "php/const.php";
include "php/message.php";
if (!function_exists(checkUser)) {
    /**
     * This function checks if the user is signed in. The param $redir is true if user should be redirected.
     */
    function checkUser($redir) {      //0=all good, 1=no login, 2=no settings
        if (!$redir) {
            if (($_SESSION['userArray']['uid'] == 0) || !isset($_SESSION['userArray']['uid'])) {
                return 1;
            }
        	else if (($_SESSION['userArray']['scoutTeam'] == 0) || ($_SESSION['userArray']['scoutingAlliance'] == 0) || ($_SESSION['userArray']['scoutingNumber'] == 0) || ($_SESSION['teamArray']['num'] == 0) || !isset($_SESSION['userArray']['scoutTeam']) || !isset($_SESSION['userArray']['scoutingAlliance']) || !isset($_SESSION['userArray']['scoutingNumber']) || !isset($_SESSION['teamArray']['num'])) {
        	    return 2;
        	}
        	else {
        	    return 0;
        	}
        }
        else {
            //echo "<br>" . var_dump(headers_list()) . "<br>" . var_dump(headers_sent()) . "<br>";
            if (($_SESSION['userArray']['uid'] == 0) || !isset($_SESSION['userArray']['uid'])) {
    		    $message['name'] = "Error!";
    		    $message['desc'] = "Please login or create an account!";
    		    $message['type'] = 'danger';
                sendMessage($message, $GLOBALS['path']['index']);
        	    //echo '<script> window.location = "' . $GLOBALS['path']['index'] . '";</script>';
            }
        	else if (($_SESSION['userArray']['scoutTeam'] == 0) || ($_SESSION['userArray']['scoutingAlliance'] == 0) || ($_SESSION['userArray']['scoutingNumber'] == 0) || ($_SESSION['teamArray']['num'] == 0) || !isset($_SESSION['userArray']['scoutTeam']) || !isset($_SESSION['userArray']['scoutingAlliance']) || !isset($_SESSION['userArray']['scoutingNumber']) || !isset($_SESSION['teamArray']['num'])) {
    			$message['name'] = "Error!";
    		    $message['desc'] = "Please set all settings!";
    		    $message['type'] = 'danger';
                sendMessage($message, $GLOBALS['path']['settings']);
        	    //echo '<script> window.location = "' . $GLOBALS['path']['settings'] . '";</script>';
        	}
        }
    }
}
?>