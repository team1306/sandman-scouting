<?php
  ob_start();
  include 'global.php';
  include 'php/dbDataConn.php';
  include 'php/debug.php';
  include 'php/message.php';?>
</head>
<body>
  <?php
  $team = $_POST['myTeam'];
  $name = $_POST['uname'];
  $pin = password_hash($_POST['pin'], PASSWORD_DEFAULT);
  $scoutTeam = $_POST['scoutTeam'];
  $scoutingAlliance = $_POST['scoutingAlliance'];
  $scoutingNumber = $_POST['scoutingNumber'];

  $users = mysqli_query($dbDataConn, "SELECT * FROM `users` WHERE `name` = '" . $name . "' LIMIT 1");
  while($row = mysqli_fetch_array($users)) {
    $unameInUse = true;
  }
  if ($unameInUse) {
    $redir = false;
    echo "<div class='container'><h2>This username is in use!  Please use another username.  <a href='createAccount'>Back</a></h2></div>";
  }
  else {
    $addUser = "INSERT INTO `users` (`id`, `slackId`, `team`, `scoutTeam`, `name`, `pin`, `scoutingAlliance`, `scoutingNumber`) VALUES (DEFAULT, '', '$team', '$scoutTeam', '$name', '$pin', '$scoutingAlliance', '$scoutingNumber')";
    if ($dbDataConn->query($addUser) === TRUE) {
      echo "
        <div class='container'>
          <h2>Account created successfully, you have been logged in!</h2>
          <h3>If you are not redirected, <a href='/'>click here</a>.</h3>
        </div>
      ";
      session_destroy();
      session_start();
      $_SESSION['userArray']['id'] = mysqli_insert_id($conn);
      $_SESSION['userArray']['uid'] = mysqli_insert_id($conn);
      $_SESSION['userArray']['name'] = $name;
      $_SESSION['teamArray']['num'] = $team;
      $_SESSION['userArray']['scoutTeam'] = $scoutTeam;
      $_SESSION['userArray']['scoutingAlliance'] = $scoutingAlliance;
      $_SESSION['userArray']['scoutingNumber'] = $scoutingNumber;
      $redir = true;
    }
    else {
      $refir = false;
      echo "Database Error: " . $dbDataConn->error;
    }
  }
  if (!$loginDebug && $redir) {
    $message['name'] = "Success!";
    $message['desc'] = "Account created, you have been logged in";
    $message['type'] = "success";
    sendMessage($message, $GLOBALS['PATH']['INDEX']);
    checkUser(true);
  }
  ?>
</body>
</html>
<?php ob_flush(); ?>
