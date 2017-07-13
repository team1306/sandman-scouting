<?php
$allianceNum = $_POST["alliance"];
$matchType = $_POST['match'];
$roundNum = $_POST['round'];
$team1 = $_POST['team1'];
$team2 = $_POST['team2'];
$team3 = $_POST['team3'];

$notes = $_POST['notes'];
$cleanNotes = preg_replace('/"/','',$notes);
$cleanNotes = str_replace("'", "", $cleanNotes);


$servername = "localhost";
$username = "data";
$password = "mxwZsnKw5FtD8uX8";
$dbname = "sandman";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `alliancedata`(`id`, `alliance`, `match`, `round`, `team1`, `team2`, `team3`, `notes`) 
VALUES (
DEFAULT, 
$allianceNum,
$matchType,
$roundNum,
$team1,
$team2,
$team3
,'$cleanNotes')";


if ($conn->query($sql) === TRUE) {
    $last_id = mysqli_insert_id($conn);
    echo "Sent to database successfully!. Your ID is: " . $last_id . "<br><a href='../alliancesheet.php'><h1>Click here to go back to scouting page</h1></a>";
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<a href='../allianceData.php' target='_blank'><h1>Click here to open scouting in a new tab.  Please leave this window open in the background so that a scouting head can fix the error.</h1></a>";
}
$conn->close();
?>