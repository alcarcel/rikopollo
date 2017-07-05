<?php
include("../conexion.php");
session_start();

$producto=$_POST['producto'];
$cantidadProducto=$_POST['cantidadProducto'];
$precioProducto=$_POST['precioProducto'];
$registradoPor=$_SESSION['usuario'];
$sucursal=1;

$sql = "INSERT INTO `inventario`(`sucr_id`, `prod_id`, `inve_cantidad`, `inve_precioInventario`, `inve_registradopor`) 
VALUES ($sucursal, '$producto', $cantidadProducto,'$precioProducto','$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se cargo correctamente el producto";
	header("location: ../cargarInventario.php?reload");
} else {
	echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();

?>
