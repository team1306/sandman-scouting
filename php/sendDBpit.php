<?php
include "../global.php";
$teamnum = $_POST["teamnum"];
$category = $_POST["category"];
$driverRating = $_POST["driverRating"];
$gearRating = $_POST["gearRating"];
$shooterRating = $_POST["shooterRating"];
$speedRating = $_POST["speedRating"];
$defenseRating = $_POST["defenseRating"];

$userID = $_SESSION['userArray']['uid'];
$userTeamNum = $_SESSION['teamArray']['num'];

$notes = $_POST['notes'];
$cleanNotes = preg_replace('/"/','',$notes);
$cleanNotes = str_replace("'", "", $cleanNotes);

// Create connection
$conn = new mysqli($GLOBALS['DB']['HOST'], $GLOBALS['DB']['USER'], $GLOBALS['DB']['PW'], $GLOBALS['DB']['DATABASE']);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `pitdata`(`id`, `userID`, `userTeamNum`, `teamnum`, `category`, `driverRating`, `gearRating`, `shooterRating`, `speedRating`, `defenseRating`, `notes`)
VALUES (
DEFAULT,
$userID,
$userTeamNum,
$teamnum,
$category,
$driverRating,
$gearRating,
$shooterRating,
$speedRating,
$defenseRating
,'$cleanNotes')";


if ($conn->query($sql) === TRUE) {
    $last_id = mysqli_insert_id($conn);
    echo "Sent to database successfully!. Your ID is: " . $last_id . "<br><a href='../$pitScoutingPath'><h1>Click here to go back to scouting page</h1></a>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<a href='../$pitScoutingPath' target='_blank'><h1>Click here to open scouting in a new tab.  Please leave this window open in the background so that a scouting head can fix the error.</h1></a>";
}
$conn->close();
?>
