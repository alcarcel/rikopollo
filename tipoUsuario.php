<?php
include 'funciones/handler.php';
?>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
					<img src="assets/img/logo.png" alt="" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
<!-- INCLUIR MENU SUPERIOR PARA QUE SEA MOSTRADO EN TODAS LAS PAGINAS -->
		<?php
		include 'iconosMenuSuperior.php';
		?>			
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
		
<!-- INCLUIR MENU LATERAL PARA QUE SEA MOSTRADO EN TODAS LAS PAGINAS -->
<?php
include 'menuPrincipal.php';
?>

        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header TITULO DE LA PAGINA ¿DINAMICO?-->
                <div class="col-lg-12">
                    <h1 class="page-header">TIPO USUARIO</h1>
                </div>
                <!--End Page Header -->
            </div>
			
<!-- Welcome MENSAJE DE BIENVENIDA A LA PLATAFORMA-->
            <!--<div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello!</b>Welcome Back <b>Jonny Deen</b>
						<i class="fa  fa-pencil"></i><b>&nbsp;2,000 </b>Support Tickets Pending to Answere. nbsp;
                    </div>
                </div>
            </div>-->
			<!--end  Welcome -->
<!--SECCION DE CONTENIDOS DE LA PAGINA-->

<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Crear tipo usuario
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
					<form role="form" action="funciones/registrarTipoUsuario.php" method="post" name="registrarTipo">
						<div class="form-group">						
						<label>Descripción</label>
						<input class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del tipo de usuario...">
						</div>
						<div class="form-group">
						<label>Estado:</label>
							<select class="form-control" name="estado" id="estado">
								<option name="estado" value="no">Seleccione una opcion...</option>
								<option name="estado" value="1">Activo</option>
								<option name="estado" value="0">Inactivo</option>
							</select>
						</div>
					<input type="button" class="btn btn-primary" value="Registrar" onclick="valida_envio()">
					<button type="reset" class="btn btn-success">Borrar</button>
					</form>
				</div>
				</div>				
			</div>
		</div>
	</div>
	
	<div class="col-lg-6">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Listado Categorias
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="detalleTUsuario">
                                    <thead>
                                        <tr>
                                            <th>ID Tipo Usuario</th>
                                            <th>Nombre</th>
                                            <th>Estado</th>
                                            <th>Registrado por:</th>
                                            <th>Fecha Registro</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
					
					$sql = "SELECT * FROM tipo_usuario";
					$result = $conexion->query($sql);
					
					$numfilas = $result->num_rows;
					
					if ($result->num_rows > 0) {						
						while($row = $result->fetch_assoc()) {
							echo '<tr class="odd gradeX">';
							echo "<td>".$row['tius_id']."</td>";
							echo "<td>".$row['tius_descripcion']."</td>";
							echo "<td>".$row['tius_estado']."</td>";
							echo "<td>".$row['tius_registradopor']."</td>";
							echo "<td>".$row['tius_fecharegistro']."</td>";
							echo "</tr>";
						}
					} else {
						echo "0 results";
					}
					$conexion->close();
?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
</div>

<!--SECCION DE BIENVENIDA RAPIDA MENSAJE-->
<?php
	/*include 'contentBienvenida.php';
	include 'pantallaInicial.php';*/
?>			
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
<?php
	include 'scripts.php';
	mysqli_close($conexion); 
?>	
	<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function () {
			$('#detalleTUsuario').dataTable();			
		});
	</script> 
<script>
function valida_envio(){ 
   	if (document.registrarTipo.descripcion.value.length==0){ 
      	alert("Tiene que escribir una descripción") 
      	document.registrarTipo.descripcion.focus() 
      	return 0; 
   	}
   	
   	if (document.registrarTipo.estado.selectedIndex==0){ 
      	alert("Debe seleccionar un estado.") 
      	document.registrarTipo.estado.focus() 
      	return 0; 
   	} 
	
   	alert("Se creo el tipo correctamente.");
   	document.registrarTipo.submit(); 
}
</script>

</body>

</html>
