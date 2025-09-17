<?php
// Conexión a la BD
$host = "localhost";
$dbname = "huanca_tienda";
$username = "huanca_admi";
$password = "N5yB;Gt*9;9u";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM producto";
    $stmt = $conn->query($sql);
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f8; }
        h1 { color: #1E2A38; }
        table { width: 80%; margin: auto; border-collapse: collapse; background: white; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
        th { background-color: #1E2A38; color: white; }
        a.btn { padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn-eliminar { background: #e74c3c; color: white; }
        .btn-editar { background: #f39c12; color: white; }
        .btn-crear { background: #2ecc71; color: white; margin: 15px; display: inline-block; }
        .panel { margin: 20px; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">📋 Listado de Productos</h1>

    <div class="panel" style="text-align:center;">
        <a href="crear.php" class="btn btn-crear">➕ Crear Producto</a>
        <a href="index.php">🔙 Volver al Panel</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acción</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= $producto['nombre'] ?></td>
            <td><?= number_format($producto['precio'], 2) ?></td>
            <td><?= $producto['stock'] ?></td>
            <td>
                <a href="editar.php?id=<?= $producto['id'] ?>" class="btn btn-editar">✏️ Editar</a>
                <a href="eliminar.php?id=<?= $producto['id'] ?>" class="btn btn-eliminar" onclick="return confirm('¿Seguro que deseas eliminar este producto?');">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
