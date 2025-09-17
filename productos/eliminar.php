<?php
include("../conexion.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM producto WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([":id" => $id]);

    header("Location: listar.php?msg=Producto eliminado");
    exit;
} else {
    echo "❌ ID no válido.";
}
?>
