<?php
include("../conexion.php");
session_start();

$descripcion=$_POST['descripcion'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$estado=$_POST['estado'];
$registradoPor=$_SESSION['usuario'];

$sql = "INSERT INTO `sucursal`(`sucr_descripcion`, `sucr_telefono`, `sucr_direccion`, `sucr_estado`, `sucr_registradopor`) 
VALUES ('$descripcion',$telefono,'$direccion','$estado','$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se creo correctamente el tipo de usuario";
	header("location: ../sucursales.php?reload");
} else {	
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();



?>