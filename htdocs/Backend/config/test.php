<?php
header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__ . '/config.php';

// ถ้ามาถึงบรรทัดนี้ = config.php เชื่อมต่อสำเร็จแล้ว
$result = [
    "success" => true,
    "message" => "Connected OK",
    "mysql_host" => $host,
    "database"   => $dbname,
    "mysql_version" => mysqli_get_server_info($conn),
    "php_version"   => phpversion()
];

// ทดสอบ query จริง
$test = mysqli_query($conn, "SHOW TABLES");
if ($test) {
    $tables = [];
    while ($row = mysqli_fetch_array($test)) {
        $tables[] = $row[0];
    }
    $result["tables"] = $tables;
    $result["table_count"] = count($tables);
} else {
    $result["tables_error"] = mysqli_error($conn);
}

echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>