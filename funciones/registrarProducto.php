<?php
include("../conexion.php");
session_start();

$nombreProd=$_POST['nombreProd'];
$categoriaProd=$_POST['categoriaProd'];
$medidaProd=$_POST['medidaProd'];
$precioProd=$_POST['precioProd'];
$inventarioProd=$_POST['inventarioProd'];
$promocionProd=$_POST['promocionProd'];
$estadoProd=$_POST['estadoProd'];
$alertaProd=$_POST['alertaProd'];
$registradoPor=$_SESSION['usuario'];


$sql = "INSERT INTO `productos`(`cate_id`, `medi_id`, `prod_nombre`, `prod_precioCompra`, `prod_minimoAlerta`, `prod_inventariable`,`prod_promocion`,`prod_estado`, `prod_registradopor`) 
						VALUES ($categoriaProd,$medidaProd,'$nombreProd',$precioProd,$alertaProd,$inventarioProd,$promocionProd,$estadoProd,'$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se creo correctamente el Producto";
	header("location: ../productos.php?reload");
} else {	
    
	echo "Error: " . $sql . "<br>" . $conexion->error;
	
}

$conexion->close();

?>
