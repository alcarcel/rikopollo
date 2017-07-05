<?php
include("../conexion.php");
session_start();

$registradoPor=$_SESSION['usuario'];
$sucursal=$_SESSION['sucursal'];
$pediestado=0;

$sql = "INSERT INTO `pedido`(`sucr_id`, `pedi_estado`, `pedi_registradopor`) 
VALUES ($sucursal,$pediestado,'$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se creo correctamente el pedido";
	header("location: ../sucursales.php?reload");
} else {	
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();



?>