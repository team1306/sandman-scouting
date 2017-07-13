<?php
$servername = "localhost";
$username = "data";
$password = "mxwZsnKw5FtD8uX8";
$dbname = "sandman";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql2 = mysqli_query($conn, "SELECT * FROM `matchdata` ORDER BY id DESC limit 1, 1");

while($row = mysqli_fetch_array($sql2))
{
 echo $row['matchNum'] . "<br>";
}
?>