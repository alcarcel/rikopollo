<?php
include("../conexion.php");
session_start();

$nombreProv=$_POST['nombreProv'];
$nombreContP=$_POST['nombreContP'];
$telefonoContP=$_POST['telefonoContP'];
$direccionProv=$_POST['direccionProv'];
$tipoPago=$_POST['tipoPago'];
$factura=$_POST['factura'];
$estadoProv=$_POST['estadoProv'];
$registradoPor=$_SESSION['usuario'];

$sql = "INSERT INTO `proveedor`(`prov_nombreEmpresa`, `prov_nombreContacto`, `prov_telefonoContacto`, `prov_direccion`, `prov_tipoPago`, `prov_facturacion`, `prov_estado`, `prov_registradopor`) 
VALUES ('$nombreProv','$nombreContP',$telefonoContP,'$direccionProv','$tipoPago','$factura','$estadoProv','$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se creo correctamente el Proveedor";
	header("location: ../proveedores.php?reload");
} else {	
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();

?>
