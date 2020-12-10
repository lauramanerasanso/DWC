<?php

$ingredient = $_REQUEST['ingredient'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuina";
$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare("SELECT plat.titol, plat.dificultat, plat.tipus, plat.preu FROM recepta JOIN plat ON plat.id=recepta.id_plat JOIN ingredient ON ingredient.id=recepta.id_ingredient WHERE ingredient.id=".$ingredient.";");

$stmt->execute();
$result = $stmt->get_result();


echo "<table border='1'>
<tr>
<th>TÍTOL</th>
<th>DIFICULTAT</th>
<th>TIPUS</th>
<th>PREU</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['titol'] . "</td>";
    echo "<td>" . $row['dificultat'] . "</td>";
    echo "<td>" . $row['tipus'] . "</td>";
    echo "<td>" . $row['preu'] . "</td>";
    echo "</tr>";

}


echo "</table>";
mysqli_close($conn);
?>