<?php
include 'head.php';
?>
<body class="body-Login-back">
<div class="container">
<div class="panel panel-default">
<div class="panel-body">

<?php
session_start();

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "rikopollo";
$tbl_name = "usuarios";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$usuario = $conexion->real_escape_string($_POST["usuario"]);
$password = md5($_POST["password"]);

 
$sql = "SELECT * FROM $tbl_name WHERE usua_usuario = '$usuario'";

$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if ($password=$row['usua_clave']) {
	$sucursal=$row['sucr_id'
    $_SESSION['loggedin'] = true;
    $_SESSION['usuario'] = $usuario;
    $_SESSION['start'] = time();
	$_SESSION['sucursal']=$sucursal;
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    
	echo "<div class='panel-heading'>Bienvenido!  <strong>" . $_SESSION['usuario']."</strong></div>";
	echo "<a href='index.php' class='btn btn-lg btn-success btn-block'>CONTINUAR</a>";


 } else {
echo "<div class='panel-heading'>Username o Password estan incorrectos.!</div>";
	 echo "<a href='login.php' class='btn btn-lg btn-danger btn-block'>REGRESAR</a>";
 }
 }else{
	 echo "<div class='panel-heading'>Verifique los datos ingresados!</div>";
	 echo "<a href='login.php' class='btn btn-lg btn-danger btn-block'>REGRESAR</a>";
 }
 
 mysqli_close($conexion); 
 ?>

</div>
</div>
</div>


 <?php
include 'scripts.php';
?>
 </body>
 