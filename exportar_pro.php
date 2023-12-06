<?php
include 'conexion.php';

$sql = "SELECT * FROM proveedores ORDER BY id_proveedor DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $archivo = "proveedores.txt";

    $file = fopen($archivo, "w");


    fwrite($file, "ID\tNombre\tNIF\tCorreo\tTelefono\tDepartamento\tDirección\n");
    

    while ($row = $result->fetch_assoc()) {
        $linea = $row["id_proveedor"] . "\t" . $row["nombre"] . "\t" . $row["nif"] . "\t" . $row["correo"] . "\t" . $row["numero"] . "\t" . $row["departamento"] . "\t" . $row["direccion"] . "\n";
        fwrite($file, $linea);
    }

    fclose($file);

    header("Content-Disposition: attachment; filename=\"" . $archivo . "\"");
    header("Content-Type: application/octet-stream");
    header("Content-Length: " . filesize($archivo));
    readfile($archivo);

    unlink($archivo);
} else {
    echo "No se encontraron registros en la base de datos.";
}

$conn->close();
?>
