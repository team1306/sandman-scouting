<?php include "global.php";
      ob_start(); ?>
</head>

<body>
<?php
include 'nav.php';
include 'php/dbDataConn.php';
include 'php/getScoutInfo.php';

$id = $_GET["id"];
$action = $_GET["action"];

if ($action == 0) {
  // Delete
  $deleteStatement = $dbDataConn->prepare("DELETE FROM {$GLOBALS['DB']['TABLE']['MATCH_SCOUTING']} WHERE `id` = ?");
  $deleteStatement->bind_param("i", $id);
  if ($deleteStatement->execute()) {
    // Delete success
    $message['name'] = "Success!";
    $message['desc'] = "Removed ID: {$id}.";
    $message['type'] = 'success';
    sendMessage($message, $GLOBALS['PATH']['DATABASE_SHEET']);
  } else {
    // Delete fail
    $message['name'] = "Error!";
    $message['desc'] = "Unable to execute the delete statement. Check the apache2 logs for more information.";
    $message['type'] = 'danger';
    sendMessage($message, $GLOBALS['PATH']['DATABASE_SHEET']);
  }
}
else {
  // Edit
    $result = mysqli_query($dbDataConn, "SELECT * FROM `matchdata` WHERE id = $id LIMIT 1");
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $username = getScoutName($row['userID']);
        $teamNum = $row['teamNum'];
        $matchNum = $row['matchNum'];
    }
    echo '
    <div class="container">
        <h2>Editing ID: ' . $id . ' (Scout: ' . $username . ')</h2>';
    echo '
<div class="container">
    <form class="form-horizontal" action="saveEdit.php" method="post">
    <input type="hidden" name="id" value="' . $id . '">
        <div class="form-group">
            <label class="control-label col-sm-2" for="teamNum">Team Number:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="teamNum" value="' . $teamNum . '" name="teamNum">
            </div>
        </div>
        <div class="text-center">
            <a id="switch"><button type="button" class="btn btn-danger"><i class="fa fa-arrows-v" aria-hidden="true"></i></button></a>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="matchNum">Match Number:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="matchNum" value="' . $matchNum . '" name="matchNum">
            </div>
        </div>
        <div class="form-group">
            <div id="submitBox" style="margin-left:auto; margin-right:auto; display:block;"><button type="submit" class="btn btn-danger btn-lg" style="width:100%">Submit</button></div>
        </div>
    </form>
</div>
    ';
    echo '</div>';
}
$dbDataConn->close();
ob_flush();
?>
<script>
    var switchButton = document.getElementById('switch');
    switchButton.onclick = switchText;

    function switchText() {
        var teamNum = document.getElementById('teamNum').value;
        var matchNum = document.getElementById('matchNum').value;

        document.getElementById('teamNum').value = matchNum;
        document.getElementById('matchNum').value = teamNum;
    }
</script>
</body>
</html>
