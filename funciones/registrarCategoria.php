<?php
include("../conexion.php");
session_start();

$nombreCate=$_POST['nombreCate'];
$estadoCate=$_POST['estadoCate'];
$registradoPor=$_SESSION['usuario'];

$sql = "INSERT INTO `categoria`(`cate_nombre`, `cate_estado`, `cate_registradopor`) 
VALUES ('$nombreCate',$estadoCate,'$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se creo correctamente la categoria";
	header("location: ../categorias.php?reload");
} else {	
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();

?>
