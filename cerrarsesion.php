<?php
session_start();
session_destroy();

echo "<script> alert('Cerrando sesión!!!');
		window.location='index.php'
		</script>";
?>