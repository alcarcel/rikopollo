<?php
include("../conexion.php");
session_start();

$tipoUsuario=$_POST['tipoUsuario'];
$sucursalUsr=$_POST['sucursalUsr'];
$nombreUsr=$_POST['nombreUsr'];
$telefonoUsr=$_POST['telefonoUsr'];
$estadoUsr=$_POST['estadoUsr'];
$usuario=$_POST['usuario'];
$clave = rand(100000, 999999);
$registradoPor=$_SESSION['usuario'];

$sql = "INSERT INTO `usuarios`(`tius_id`, `sucr_id`, `usua_nombre`, `usua_usuario`, `usua_clave`, `usua_telefono`, `usua_estado`, `usua_registradopor`) 
VALUES ($tipoUsuario,$sucursalUsr,'$nombreUsr','$usuario',$clave,$telefonoUsr,$estadoUsr,'$registradoPor')";

if ($conexion->query($sql) === TRUE) {
    echo "Se creo correctamente el Producto";
	header("location: ../creacionUsuarios.php?reload");
} else {
	echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();

?>
