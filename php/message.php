<?php
  /**
   * Each message array should contain a 'name', 'desc', 'type'
  */
  if (!function_exists('sendMessage')) {
    function sendMessage($message, $path) {
      $_SESSION['message'] = $message;
      // echo var_dump($message);
      if (headers_sent()) {
        die("Redirect failed. Please notify an admin on Slack.
        For now, click <a href='{$path}'>this link</a>.");
      }
      header('Location: ' . $path);
    }
  }
  /**
   * This checks for a message and displays it in a nice box
   */
  if (!function_exists('checkMessage')) {
    function checkMessage() {
      if (isset($_SESSION['message'])) {
        echo "
            <br>
            <div class='container'>
              <div class='alert alert-dismissible alert-{$_SESSION['message']['type']}' role='alert'>
                <strong>{$_SESSION['message']['name']}</strong> {$_SESSION['message']['desc']}
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
              </div>
            </div>";
        unset($_SESSION['message']);
      }
    }
  }
?>
