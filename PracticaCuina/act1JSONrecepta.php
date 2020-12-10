<?php
    header("Content-Type: application/json; charset=UTF-8");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cuina";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $stmt = $conn->prepare("SELECT * FROM plat");
    if(isset($_GET['id'])){
        $ingredient = $_GET['id'];
        $stmt = $conn->prepare("SELECT plat.id, plat.titol FROM recepta JOIN plat ON plat.id=recepta.id_plat JOIN ingredient ON ingredient.id=recepta.id_ingredient WHERE ingredient.id=".$ingredient.";");
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $outp = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($outp);
?>