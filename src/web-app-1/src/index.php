<?php
require_once 'db.php';
$pdo = DB::connect();
$stmt = $pdo->query("SELECT * FROM ems_product");
$data = $stmt->fetchAll();

foreach ($data as $row) {
    echo htmlspecialchars($row['id']) . "<br>";
}
?>
