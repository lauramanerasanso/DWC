<?php
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuina";
$conn = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['id'])){
    $plat = $_GET['id'];
    $stmt = $conn->prepare("SELECT id, titol, dificultat, tipus, preu, foto  FROM plat WHERE id=".$plat.";");
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($outp);
}
?>