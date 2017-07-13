<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "sandman";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")  ";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$sql = "SELECT * FROM  `data`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr> <td> int1: ". $row["int1"]. "</td><td> int 2: ". $row["int2"]. "</td> <td> int 3 " . $row["int3"] . "</td></tr> ";
     }
} else {
     echo "0 results";
}

$conn->close();

    ?>