<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "DELETE FROM proveedores WHERE id_proveedor = $id";

    if ($conn->query($sql) === TRUE) {
        $message = "Registro eliminado satisfactoriamente.";
        header("Location: registroproveedor.php?mensaje=" . urlencode($message));
        exit();
    } else {
        $message = "Error al eliminar el registro: " . $conn->error;
        header("Location: registroproveedor.php?mensaje=" . urlencode($message));
        exit();
    }
}

$conn->close();
?>
