<?php
  /**
   * Each message array should contain a 'name', 'desc', 'type'
  */
  if (!function_exists('sendMessage')) {
    function sendMessage($message, $path) {
      $_SESSION['message'] = $message;
      // echo var_dump($message);
      header('Location: ' . $path);
    }
  }
  /**
   * This checks for a message and displays it in a nice box
   */
  if (!function_exists('checkMessage')) {
    function checkMessage() {
      if (isset($_SESSION['message'])) {
        echo '<br>
            <div class="container">
                <div class="alert alert-' . $_SESSION['message']['type'] . '">
                    <strong>' . $_SESSION['message']['name'] . '</strong> ' . $_SESSION['message']['desc'] . '
                </div>
            </div>';
        unset($_SESSION['message']);
      }
    }
  }
?>
