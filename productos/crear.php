<?php
// Conexión a la BD
$host = "localhost";
$dbname = "huanca_tienda";
$username = "huanca_admi";
$password = "N5yB;Gt*9;9u";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $sql = "INSERT INTO producto (nombre, precio, stock) VALUES (:nombre, :precio, :stock)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);
        $stmt->execute();

        header("Location: listar.php");
        exit;
    }
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>
</head>
<body>
    <h1>➕ Crear Producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" required><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" required><br><br>

        <button type="submit">Guardar</button>
    </form>
    <br>
    <a href="listar.php">🔙 Volver</a>
</body>
</html>
