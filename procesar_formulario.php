<?php
include 'conexion.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$nif = isset($_POST['nif']) ? $_POST['nif'] : "";
$correo = isset($_POST['correo']) ? $_POST['correo'] : "";
$numero = isset($_POST['numero']) ? $_POST['numero'] : "";
$departamento = isset($_POST['departamento']) ? $_POST['departamento'] : "";
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";

$sql = "INSERT INTO proveedores (nombre, nif, correo, numero, departamento, direccion) VALUES ('$nombre', '$nif', '$correo', '$numero', '$departamento', '$direccion')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id; 

    header("Location: registroproveedor.php?mensaje=enviado");
    exit;
} else {
echo "Error al guardar los datos: " . $conn->error;
}

header("Location: registroproveedor.php?mensaje=enviado");
exit();

$conn->close();
?>