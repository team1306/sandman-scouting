<?php include "global.php"; ?>
</head>

<body>
<?php
include 'nav.php';
include 'php/dbDataConn.php';
include 'php/getScoutInfo.php';

$id = $_GET["remove"];
$action = $_GET["action"];

if ($action == 0) {  //Delete
    $sql = "DELETE FROM `matchdata` WHERE id = $id";
    if ($dbDataConn->query($sql) === TRUE) {
        $last_id = mysqli_insert_id($dbDataConn);
        echo "
        <div class='container'>
            <a href='$databasePath'><button type='button' class='btn btn-success btn-xl' style='width:100%; height:200px;'><h1 style='font-size: 500%;'>Click Here</h1></button></a>
        </div>
        ";
        echo "<h1> ID: <strong>$id</strong> was removed successfully.</h1>"; 
    } else {
        echo "Error: " . $sql . "<br>" . $dbDataConn->error . "
        <div class='container'>
            <a href='../removePage.php' target='_blank'><h1>An error occured!  Please contact Sam.</h1></a>
        </div>
        ";
    }
}
else {  //Edit
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