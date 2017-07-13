<?php
if (isset($_SESSION['error'])) {
  $errName = $_SESSION['error']['name'];
  $errDesc = $_SESSION['error']['desc'];
  $errType = $_SESSION['error']['type'];
  
  if ($errType == 1) {
    echo '
    <div class="container">
      <div class="alert alert-success">
      <strong>' . $errName . '</strong> ' . $errDesc . '
    </div>
    </div>';
  }
  else {
    echo '
    <div class="container">
      <div class="alert alert-danger">
      <strong>' . $errName . '</strong> ' . $errDesc . '
    </div>
    </div>';
  }
unset($_SESSION['error']);
}
?>