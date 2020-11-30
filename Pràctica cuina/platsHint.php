<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cuina";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM plat ORDER BY titol;";
$result = $conn->query($sql);

$a = array();
while($row = mysqli_fetch_array($result)) {
	array_push($a, $row['titol']);
}

$q = $_REQUEST["q"];
$rs = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($rs === "") {
                $rs = $name;
            } else {
                $rs .= ", $name";
            }
        }
    }
}

echo $rs === "" ? "no suggestion" : $rs;
?>