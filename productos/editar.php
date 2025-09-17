<?php
// Conexión a la BD
$host = "localhost";
$dbname = "huanca_tienda";
$username = "huanca_admi";
$password = "N5yB;Gt*9;9u";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_GET['id'])) {
        die("❌ ID no proporcionado");
    }

    $id = $_GET['id'];

    // Obtener datos actuales del producto
    $sql = "SELECT * FROM producto WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$producto) {
        die("❌ Producto no encontrado");
    }

    // Actualizar producto
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        $sql = "UPDATE producto SET nombre = :nombre, precio = :precio, stock = :stock WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':id', $id);
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
    <title>Editar Producto</title>
</head>
<body>
    <h1>✏️ Editar Producto</h1>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required><br><br>

        <label>Precio:</label>
        <input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="listar.php">🔙 Volver</a>
</body>
</html>
