<?php
    if (!function_exists('sendMessage')) {
    /**
     * Sends a message and redirect the user to another page
     * Message object must have: 'name', 'desc', 'type'
     *
     * @param   Object  $message  Message array
     * @param   String  $path     Path to redirect
     */
    function sendMessage($message, $path) {
        $_SESSION['message'] = $message;
        if (headers_sent()) {
            die("Redirect failed. Please notify an admin on Slack.
            For now, click <a href='{$path}'>this link</a>.");
        }
        header('Location: ' . $path);
    }
  }
    if (!function_exists('checkMessage')) {
        /**
         * Checks for a message and displays it if there is one
         * This should be called on all pages that can show messages
         */
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
