<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuina";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM ingredient ORDER BY nom;";
$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)) {
	echo "<option value='".$row['id']."'>".$row['nom']."</option>";
}



?>