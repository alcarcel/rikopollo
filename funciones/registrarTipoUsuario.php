<?php
include("../conexion.php");
session_start();
$descripcion=$_POST['descripcion'];
$estado=$_POST['estado'];
$registradoPor=$_SESSION['usuario'];

if($descripcion=='' || $descripcion==' '){
	echo "Se creo correctamente el tipo de usuario";
}

$sql = "INSERT INTO `tipo_usuario`(`tius_descripcion`, `tius_estado`, `tius_registradopor`) VALUES ('$descripcion','$estado','$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se creo correctamente el tipo de usuario";
	header("location: ../tipoUsuario.php?reload");
} else {	
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();



?>