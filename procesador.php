<?php
include 'conexion.php';

session_start();

$tbl_name = "usuarios";

$usuario = $conexion->real_escape_string($_POST["usuario"]);
$password = md5($_POST["password"]);

$sql = "SELECT * FROM $tbl_name WHERE usua_usuario = '$usuario'";

$result = $conexion->query($sql);

if ($result->num_rows > 0) {
	error_log("se encontro el usuario", 0);
	$row = $result->fetch_array(MYSQLI_ASSOC);
	
	if ($password==$row['usua_clave']) {
		error_log("se compara la clave!", 0);
		$_SESSION['loggedin'] = true;
		$_SESSION['usuario'] = $usuario;
		$_SESSION['sucursal'] = $row['sucr_id'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (5 * 2);
	
		$jsondata["reply"]="ok";
		$jsondata["mensaje"]="Ingreso correcto! - ".$row['usua_clave']." -";		
		
		echo json_encode($jsondata,true);
		
	}else{
		$jsondata["reply"]="error";
		$jsondata["mensaje"]="Usuario Invalido";
		
		echo json_encode($jsondata,false);
		}
 }else{
	$jsondata["reply"]="error";
	$jsondata["mensaje"]="Usuario Invalido";
	
	echo json_encode($jsondata,false);
 }
mysqli_close($conexion); 
exit; 
?>
