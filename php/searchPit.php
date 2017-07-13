<link href="../css/bootstrap.css" rel="stylesheet">
<?php

$input = $_POST["input"];

echo "<h3 style='text-align:center;'>Showing results for: '$input'</h3>";

$con=mysqli_connect("localhost","data","mxwZsnKw5FtD8uX8","sandman");
if ($input == "Robust" || $input == "robust" || $input == "0") {
  $result = mysqli_query($con, "SELECT * FROM `pitdata` WHERE `category` = 0 ORDER BY id DESC;");
}
else if ($input == "Sensitive" || $input == "sensitive" || $input == "1") {
  $result = mysqli_query($con, "SELECT * FROM `pitdata` WHERE `category` = 1 ORDER BY id DESC;");
}
else if ($input == "Defense" || $input == "defense" || $input == "2") {
  $result = mysqli_query($con, "SELECT * FROM `pitdata` WHERE `category` = 2 ORDER BY id DESC;");
} // || $input == "low goal cycler" || $input == "low" || $input == "low goal" || $input = "Low" || $input = "Low Goal Cycler" || $input == "Low Goal" || $input =- "3"
else if ($input == "Low Goal Cycler") {
  $result = mysqli_query($con, "SELECT * FROM `pitdata` WHERE `category` = 3 ORDER BY id DESC;");
}
else {
  $result = mysqli_query($con, "SELECT * FROM `pitdata` WHERE teamnum = $input ORDER BY id DESC");
}

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//$result = mysqli_query($con,"SELECT * FROM `matchdata`");

echo "<div class='container' style='width:90%'><table align='center' class='table table-striped'>
<thead>
<tr>
<th>ID</th>
<th>Team #</th>
<th>Category</th>
<th>Comments</th>
</tr>
</thead><tbody>";

while($row = mysqli_fetch_array($result))
{
  $cat = "NULL";
if ($row['category'] == 0) {
  $cat = "Robust";
}
if ($row['category'] == 1) {
  $cat = "Sensitive";
}
if ($row['category'] == 2) {
  $cat = "Defense";
}
if ($row['category'] == 3) {
  $cat = "Low Goal Cycle";
}
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['teamnum'] . "</td>";
echo "<td>" . $cat . "</td>";
echo "<td>" . $row['notes'] . "</td>";
echo "</tr>";
}
echo "</tbody></table></div>";
mysqli_close($con);
?>