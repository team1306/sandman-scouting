<?php
  include "global.php";
  include "php/const.php";
  include "php/debug.php";
  include "php/dbDataConn.php";
?>
</head>

<body>
<?php
$updateSQL = "UPDATE `matchdata` SET `teamNum`='" . $_POST['teamNum'] . "', `matchNum`='" . $_POST['matchNum'] . "' WHERE `id`='" . $_POST['id'] . "'";
if ($databasesheetDebug) {
    echo "<br>Update: '" . $updateSQL . "'";
}
$conn = new mysqli($GLOBALS['DB']['HOST'], $GLOBALS['DB']['USER'], $GLOBALS['DB']['PW'], $GLOBALS['DB']['DATABASE']);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn->query($updateSQL) === TRUE) {
    if ($databasesheetDebug) {
        $last_id = mysqli_insert_id($conn);
        echo "
        <div class='container'>
            <h1>Record updated!</h1>
            <a href='/'><button type='button' class='btn btn-success btn-xl' style='width:100%; height:200px;'><h1 style='font-size: 500%;'>Back</h1></button></a>
        </div>
        ";
    }
    else {
        $_SESSION['error']['name'] = "Success";
        $_SESSION['error']['desc'] = "Record updated!";
        $_SESSION['error']['type'] = 1;
        echo "<script>window.location = '$databasePath';</script>";
    }
}
else {
    echo "Error: " . $insertSQL . "<br>" . $conn->error . "
    <div class='container'>
        <a href='/' target='_blank'><h1>An error occured.</h1></a>
    </div>
    ";
}
$conn->close();
?>
</body>
</html>
