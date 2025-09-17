<?php
// Credenciales de conexión
$host = "localhost";
$dbname = "huanca_tienda";
$username = "huanca_admi";
$password = "N5yB;Gt*9;9u";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Error de conexión: " . $e->getMessage());
}
?>
