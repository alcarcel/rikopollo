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
                    <h1 class="page-header">Cargar Inventario</h1>
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
				Cargar Productos a Inventario
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
					<form role="form" action="funciones/cargarProducto.php" method="post" name="registrarProducto">
						<div class="form-group">
						<?php 
							$sqlProductos="SELECT * FROM productos where prod_estado=1";
							$resProducto=$conexion->query($sqlProductos);
							$cantProductos=$resProducto->num_rows;
						?>
						<label>Productos:</label>
							<select class="form-control" name="producto" id="producto">
								<option name="producto" value="no">Seleccione un producto...</option>
								<?php 
								if($cantProductos > 0){
									while($regProductos=$resProducto->fetch_assoc()){
										echo '<option value="'.$regProductos['prod_id'].'">'.$regProductos['prod_nombre'].'</option>';
									}
								}else {
									echo '<div class="alert alert-info"><strong>NO SE ENCONTRARON RESULTADOS</strong></div>';
								}
								?>
							</select>
						</div>
						<div class="form-group">						
						<label>Cantidad</label>
						<input class="form-control" name="cantidadProducto" id="cantidadProducto" placeholder="Ingrese la cantidad a cargar...">
						</div>
						<div class="form-group">						
						<label>Precio</label>
						<input class="form-control" name="precioProducto" id="precioProducto" placeholder="Ingrese el precio de compra...">
						</div>
						
					<input type="button" class="btn btn-primary" value="Cargar" onclick="valida_envio()">
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
                             Inventario producto
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
							<?php
										$sql = "SELECT prod.prod_nombre, inv.*, sucr.sucr_descripcion from productos as prod, inventario as inv, sucursal as sucr where prod.prod_id=inv.prod_id and sucr.sucr_id=inv.sucr_id;";
										$result = $conexion->query($sql);					
										$numfilas = $result->num_rows;
						
										if ($result->num_rows > 0) {
							?>
                                <table class="table table-striped table-bordered table-hover" id="detalleInventarioP">
                                    <thead>
                                        <tr>
                                            <th>ID Producto</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Sucursal</th>                                            
                                        </tr>
                                    </thead>
									<tbody>
							<?php							
											while($row = $result->fetch_assoc()) {
												echo '<tr class="odd gradeX">';
												echo "<td>".$row['prod_id']."</td>";
												echo "<td>".$row['prod_nombre']."</td>";
												echo "<td>".$row['inve_cantidad']."</td>";
												echo "<td>".$row['sucr_descripcion']."</td>";
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
	mysqli_close($conexion); 
?>	
	<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
	<script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function () {
			$('#detalleInventarioP').dataTable();			
		});
	</script> 
<script>
function valida_envio(){ 
   	if (document.registrarProducto.producto.selectedIndex==0){ 
      	alert("Debe seleccionar un producto a cargar.") 
      	document.registrarProducto.producto.focus() 
      	return 0; 
   	} 
	if (document.registrarProducto.cantidadProducto.value.length==0){ 
      	alert("Tiene que indicar una cantidad a cargar.") 
      	document.registrarProducto.cantidadProducto.focus() 
      	return 0; 
   	}
	if (document.registrarProducto.precioProducto.value.length==0){ 
      	alert("Tiene que indicar un precio de compra.") 
      	document.registrarProducto.precioProducto.focus() 
      	return 0; 
   	}
	
   	alert("Se creo el tipo correctamente.");
   	document.registrarProducto.submit(); 
}
</script>

</body>

</html>
