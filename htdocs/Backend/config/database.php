<?php
$host     = "sql308.infinityfree.com";
$user     = "if0_42924980";
$password = "P7gCwVEy2GBju";
$dbname   = "if0_42924980_gas_system";
$port     = 3306;

$conn = mysqli_connect($host, $user, $password, $dbname, $port);
mysqli_set_charset($conn, "utf8mb4");
if (!$conn) {
    die(json_encode(["success" => false, "message" => mysqli_connect_error()]));
}

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(json_encode(["success" => false, "message" => $e->getMessage()]));
}
?>