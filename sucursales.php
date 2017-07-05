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
                    <h1 class="page-header">SUCURSALES</h1>
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
				Gestionar Sucursales
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
					<form role="form" action="funciones/registrarSucursal.php" method="post" name="registrarSucursal">
						<div class="form-group">
						
						<label>Nombre Sucursal</label>
						<input class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese valor...">
						<label>Teléfono Sucursal</label>
						<input class="form-control" name="telefono" id="telefono" placeholder="Ingrese valor...">
						<label>Dirección Sucursal</label>
						<input class="form-control" name="direccion" id="direccion" placeholder="Ingrese valor...">
						<label>Estado:</label>
							<select class="form-control" name="estado" id="estado">
								<option value="no">Seleccione una opcion...</option>
								<option value="1">Activa</option>
								<option value="0">Inactiva</option>
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
                                            <th>ID Sucursal</th>
                                            <th>Nombre Sucursal</th>
											<th>Telefono</th>
											<th>Dirección</th>
                                            <th>Estado</th>
                                            <th>Registrado por</th>
                                            <th>Fecha Registro</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
					
					$sql = "SELECT * FROM sucursal";
					$result = $conexion->query($sql);
					
					$numfilas = $result->num_rows;
					
					if ($result->num_rows > 0) {						
						while($row = $result->fetch_assoc()) {
							echo '<tr class="odd gradeX">';
							echo "<td>".$row['sucr_id']."</td>";
							echo "<td>".$row['sucr_descripcion']."</td>";
							echo "<td>".$row['sucr_telefono']."</td>";
							echo "<td>".$row['sucr_direccion']."</td>";
							echo "<td>".$row['sucr_estado']."</td>";
							echo "<td>".$row['sucr_registradopor']."</td>";
							echo "<td>".$row['sucr_fecharegistro']."</td>";
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
	<script>
		$(document).ready(function () {
			$('#detalleTUsuario').dataTable();			
		});
	</script> 
<script>
function valida_envio(){ 
	if (document.registrarSucursal.descripcion.value.length==0){ 
      	alert("Tiene que escribir un Nombre") 
      	document.registrarSucursal.descripcion.focus() 
      	return 0; 
   	}

   	if (document.registrarSucursal.telefono.value.length==0){ 
      	alert("Tiene digitar un telefono") 
      	document.registrarSucursal.telefono.focus() 
      	return 0; 
   	}
	
	if (document.registrarSucursal.direccion.value.length==0){ 
      	alert("Tiene que escribir una dirección") 
      	document.registrarSucursal.direccion.focus() 
      	return 0; 
   	}
   	
   	if (document.registrarSucursal.estado.selectedIndex==0){ 
      	alert("Debe seleccionar un estado.") 
      	document.registrarSucursal.estado.focus() 
      	return 0; 
   	} 

   	//el formulario se envia 
   	alert("Se creo la sucursal correctamente.");
   	document.registrarSucursal.submit(); 
}
</script>
	
    

</body>

</html>
