<?php
// Aquí luego pondremos login con sesiones
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #1E2A38;
        }
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            background: #4DB6AC;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn:hover {
            background: #35797F;
        }
    </style>
</head>
<body>
    <h1>Panel de Administración</h1>
    <a class="btn" href="productos/listar.php">📦 Gestionar Productos</a>
</body>
</html>
