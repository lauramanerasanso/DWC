<?php
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuina";
$conn = new mysqli($servername, $username, $password, $dbname);

$stmt = $conn->prepare("SELECT id, nom  FROM ingredient");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>