<?php ob_start(); include 'global.php'; ?>
</head>
<body>
  <?php 
  session_destroy();
  session_start();
  $team = $_POST['team'];
  $name = $_POST['name'];
  $pin = $_POST['pin'];
  $login = false;
  
  include 'php/dbDataConn.php';
  include 'php/debug.php';
  include 'userCheck.php';
  include 'php/message.php';
  
  $users = mysqli_query($dbDataConn, "SELECT * FROM `users` WHERE `name` = '" . $name . "' LIMIT 1");
  while($row = mysqli_fetch_array($users)) {
    if (password_verify($pin, $row['pin'])) {
      $login = true;
      $_SESSION['userArray']['id'] = $row['id'];
      $_SESSION['userArray']['uid'] = $row['id'];
      $_SESSION['userArray']['name'] = $row['name'];
      $_SESSION['teamArray']['num'] = $row['team'];
      $_SESSION['userArray']['scoutingAlliance'] = $row['scoutingAlliance'];
      $_SESSION['userArray']['scoutingNumber'] = $row['scoutingNumber'];
      $_SESSION['userArray']['scoutTeam'] = $row['scoutTeam'];
      
      $message['name'] = "Succes!";
      $message['desc'] = "You are now logged in.";
      $message['type'] = "success";
      sendMessage($message, $GLOBALS['path']['index']);
    }
    else if (!$GLOBALS['login']['debug']['loginSystem']) {
      $message['name'] = "Login incorrect!";
      $message['desc'] = "Please either make a new account or ask a DB manager for assistance.";
      $message['type'] = "danger";
      sendMessage($message, $GLOBALS['path']['index']);
    }
  }
  ob_flush();
  ?>
</body>
</html>