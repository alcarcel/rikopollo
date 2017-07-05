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
                    <h1 class="page-header">PROVEEDORES</h1>
                </div>
                <!--End Page Header -->
            </div>

<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				Gestionar Proveedores
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
					<form role="form" action="funciones/registrarProveedor.php" method="post" name="registrarProveedor">
						<div class="form-group">						
						<label>Nombre Proveedor</label>
						<input class="form-control" name="nombreProv" id="nombreProv" placeholder="Ingrese valor...">
						</div>
						<div class="form-group">						
						<label>Nombre Contacto</label>
						<input class="form-control" name="nombreContP" id="nombreContP" placeholder="Ingrese valor...">
						</div>
						<div class="form-group">						
						<label>Teléfono Contacto</label>
						<input class="form-control" name="telefonoContP" id="telefonoContP" placeholder="Ingrese valor...">
						</div>
						<div class="form-group">						
						<label>Dirección</label>
						<input class="form-control" name="direccionProv" id="direccionProv" placeholder="Ingrese valor...">
						</div>						
						<div class="form-group">
						<label>Tipo de Pago:</label>
							<select class="form-control" name="tipoPago" id="tipoPago">
								<option value="">Seleccione una opcion...</option>
								<option value="1">Adelantado</option>
								<option value="2">Contraentrega</option>
								<option value="3">Pos Fechado</option>
							</select>
						</div>
						<div class="form-group">
						<label>Entrega Factura?</label>
							<select class="form-control" name="factura" id="factura">
								<option value="">Seleccione una opcion...</option>
								<option value="1">SI</option>
								<option value="0">NO</option>
							</select>
						</div>
						<div class="form-group">
						<label>Estado</label>
							<select class="form-control" name="estadoProv" id="estadoProv">
								<option value="">Seleccione una opcion...</option>
								<option value="1">Activo</option>
								<option value="0">Inactivo</option>
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
	</div>
	<div class="row">
	<div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Listado Categorias
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                	<?php
					
					$sql = "SELECT * FROM proveedor";
					$result = $conexion->query($sql);
					
					$numfilas = $result->num_rows;
					
					if ($result->num_rows > 0) {						
					?>
					<table class="table table-striped table-bordered table-hover" id="detalleProveedor">
                                    <thead>
                                        <tr>
                                            <th>ID Proveedor</th>
                                            <th>Nombre Proveedor</th>
											<th>Nombre Contacto</th>
											<th>Teléfono Contacto</th>
											<th>Dirección</th>
                                            <th>Tipo de Pago:</th>
											<th>Entrega Factura?</th>
											<th>Estado</th>
                                            <th>Registrado por</th>
                                            <th>Fecha Registro</th>
                                        </tr>
                                    </thead>
									<tbody>
					<?php
						while($row = $result->fetch_assoc()) {
							echo '<tr class="odd gradeX">';
							echo "<td>".$row['prov_id']."</td>";
							echo "<td>".$row['prov_nombreEmpresa']."</td>";
							echo "<td>".$row['prov_nombreContacto']."</td>";
							echo "<td>".$row['prov_telefonoContacto']."</td>";
							echo "<td>".$row['prov_direccion']."</td>";
							echo "<td>".$row['prov_tipoPago']."</td>";
							echo "<td>".$row['prov_facturacion']."</td>";
							echo "<td>".$row['prov_estado']."</td>";
							echo "<td>".$row['prov_registradopor']."</td>";
							echo "<td>".$row['prov_fecharegistro']."</td>";
							echo "</tr>";
						}
					} else {
						echo '<div class="alert alert-info"><strong>NO SE ENCONTRARON RESULTADOS</strong></div>';
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
?>	
	<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function () {
			$('#detalleProveedor').dataTable();			
		});
	</script> 
<script>
function valida_envio(){ 
	if (document.registrarProveedor.nombreProv.value.length==0){ 
      	alert("Tiene que escribir un Nombre de proveedor") 
      	document.registrarProveedor.nombreProv.focus() 
      	return 0; 
   	}

   	if (document.registrarProveedor.nombreContP.value.length==0){ 
      	alert("Tiene digitar un Nombre de Contacto") 
      	document.registrarProveedor.nombreContP.focus() 
      	return 0; 
   	}
	
	if (document.registrarProveedor.telefonoContP.value.length==0){ 
      	alert("Tiene que escribir un Teléfono de Contacto") 
      	document.registrarProveedor.telefonoContP.focus() 
      	return 0; 
   	}
   	
   	if (document.registrarProveedor.direccionProv.selectedIndex==0){ 
      	alert("Debe seleccionar una Dirección de Proveedor.") 
      	document.registrarProveedor.direccionProv.focus() 
      	return 0; 
   	} 
	
	if (document.registrarProveedor.tipoPago.selectedIndex==0){ 
      	alert("Debe seleccionar un Tipo de Pago.") 
      	document.registrarProveedor.tipoPago.focus() 
      	return 0; 
   	} 
	
	if (document.registrarProveedor.factura.selectedIndex==0){ 
      	alert("Debe seleccionar la Facturación.") 
      	document.registrarProveedor.factura.focus() 
      	return 0; 
   	} 
	
	if (document.registrarProveedor.estadoProv.selectedIndex==0){ 
      	alert("Debe seleccionar un estado.") 
      	document.registrarProveedor.estadoProv.focus() 
      	return 0; 
   	} 

   	//el formulario se envia 
   	alert("Se creo el proveedor correctamente.");
   	document.registrarProveedor.submit(); 
}
</script>
	
    

</body>

</html>
