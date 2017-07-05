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
                    <h1 class="page-header">PRODUCTOS</h1>
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
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Gestionar producto
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
					<form role="form" action="funciones/registrarProducto.php" method="POST" name="registrarProducto">
						<div class="row">
						<div class="col-lg-4">
							<div class="form-group">						
							<label>Nombre Producto</label>
							<input class="form-control" name="nombreProd" id="nombreProd" placeholder="Ingrese valor...">
							</div>
							
							<div class="form-group">
							<?php
								$sqlCategoria = "SELECT * FROM categoria";
								$resultCategoria = $conexion->query($sqlCategoria);
								$cantCategorias = $resultCategoria->num_rows;
								
							?>
							<label>Categoria</label>
							<select class="form-control" name="categoriaProd" id="categoriaProd">
								<option value="">Seleccione una opción...</option>
								<?php if ($cantCategorias >0){
											while($registrosCategoria = $resultCategoria->fetch_assoc()) {
											echo '<option value="'.$registrosCategoria['cate_id'].'">'.$registrosCategoria['cate_nombre'].'</option>';
											//echo "<td>".$row['prod_id']."</td>";	echo ;
											}
										} else {
											echo '<div class="alert alert-info"><strong>NO SE ENCONTRARON RESULTADOS</strong></div>';
										}
										
								?>
							</select>
						</div>
						</div>
						
						<div class="col-lg-4">
							<div class="form-group">
							<?php
								$sqlMedida = "SELECT * FROM medida";
								$resMedida = $conexion->query($sqlMedida);
								$cantMedida = $resMedida->num_rows;
							?>
							<label>Medida</label>
								<select class="form-control" name="medidaProd" id="medidaProd">
									<option value="">Seleccione una opcion...</option>
									<?php if ($cantMedida >0){
											while($registrosMedida = $resMedida->fetch_assoc()) {
											echo '<option value="'.$registrosMedida['medi_id'].'">'.$registrosMedida['medi_nombre'].'</option>';
											}
										} else {
											echo '<div class="alert alert-info"><strong>NO SE ENCONTRARON RESULTADOS</strong></div>';
										}
										
								?>
								</select>
							</div>
							
							
						
							<div class="form-group">						
								<label>Precio de Compra</label>
								<input class="form-control" name="precioProd" id="precioProd" placeholder="Ingrese valor...">
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="form-group">
								<label>Producto Inventariable?</label>
								<select class="form-control" name="inventarioProd" id="inventarioProd">
									<option value="">Seleccione una opcion...</option>
									<option value="1">SI</option>
									<option value="0">NO</option>
								</select>
							</div>
						
							<div class="form-group">
								<label>Producto con Promoción?</label>
								<select class="form-control" name="promocionProd" id="promocionProd">
									<option value="">Seleccione una opcion...</option>
									<option value="1">SI</option>
									<option value="0">NO</option>
								</select>
							</div>
						</div>
						</div>
						
						<div class="row">
						<div class="col-lg-4">
							<div class="form-group">						
								<label>Cantidad Alerta</label>
								<input class="form-control" name="alertaProd" id="alertaProd" placeholder="Ingrese valor...">
							</div>
						</div>
						
						<div class="col-lg-4">
							<div class="form-group">
								<label>Estado</label>
								<select class="form-control" name="estadoProd" id="estadoProd">
									<option value="">Seleccione una opcion...</option>
									<option value="1">ACTIVO</option>
									<option value="0">INACTIVO</option>
								</select>
							</div>
						</div>
						
						<div class="col-lg-4">
						<div class="form-group">
							<input type="button" class="btn btn-primary" value="Registrar" onclick="valida_envio()">
							<button type="reset" class="btn btn-success">Borrar</button>
							
						</div>
						</div>
						</div>
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
                             Listado Productos
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
					<?php
					
					$sql = "SELECT * FROM productos";
					$result = $conexion->query($sql);
					
					$numfilas = $result->num_rows;
					
					if ($result->num_rows > 0) {						
					?>
                                <table class="table table-striped table-bordered table-hover" id="detalleProducto">
                                    <thead>
                                        <tr>
                                            <th>ID Producto</th>
                                            <th>Nombre Producto</th>
											<th>Categoria</th>
											<th>Medida</th>
                                            <th>Precio Compra</th>
											<th>Promoción</th>
											<th>Inventario</th>
											<th>Estado</th>
                                            <th>Registrado por:</th>
                                            <th>Fecha Registro</th>
											<th>Modificar</th>
											<th>Inactivar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
					<?php
						while($row = $result->fetch_assoc()) {
							echo '<tr class="odd gradeX">';
							echo "<td>".$row['prod_id']."</td>";
							echo "<td>".$row['prod_nombre']."</td>";
							echo "<td>".$row['cate_id']."</td>";
							echo "<td>".$row['medi_id']."</td>";
							echo "<td>".$row['prod_precioCompra']."</td>";
							echo "<td>".$row['prod_minimoAlerta']."</td>";
							echo "<td>".$row['prod_promocion']."</td>";
							echo "<td>".$row['prod_estado']."</td>";
							echo "<td>".$row['prod_registradopor']."</td>";
							echo "<td>".$row['prod_fecharegistro']."</td>";
							echo "<td><input type='button' class='btn btn-outline btn-primary btn-xs' value='Modificar' onclick='modificar()'></td>";
							echo "<td><button type='button' class='btn btn-outline btn-warning btn-xs'>Inactivar</button></td>";
							echo "";
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
			$('#detalleProducto').dataTable();			
		});
	</script> 
<script>
function valida_envio(){ 
	if (document.registrarProducto.nombreProd.value.length==0){ 
      	alert("Tiene que escribir un Nombre de producto") 
      	document.registrarProducto.nombreProd.focus() 
      	return 0; 
   	}
	
	if (document.registrarProducto.categoriaProd.selectedIndex==0){ 
      	alert("Debe seleccionar una Categoria.") 
      	document.registrarProducto.categoriaProd.focus() 
      	return 0; 
   	} 
	
	if (document.registrarProducto.medidaProd.selectedIndex==0){ 
      	alert("Debe seleccionar una Medida.") 
      	document.registrarProducto.medidaProd.focus() 
      	return 0; 
   	} 

   	if (document.registrarProducto.precioProd.value.length==0){ 
      	alert("Tiene digitar un Precio") 
      	document.registrarProducto.precioProd.focus() 
      	return 0; 
   	}
	
	if (document.registrarProducto.inventarioProd.selectedIndex==0){ 
      	alert("Debe seleccionar si es inventariable el producto.") 
      	document.registrarProducto.inventarioProd.focus() 
      	return 0; 
   	}
	
	if (document.registrarProducto.promocionProd.selectedIndex==0){ 
      	alert("Debe indicar si este producto tiene alguna promoción.") 
      	document.registrarProducto.promocionProd.focus() 
      	return 0; 
   	}
	
	if (document.registrarProducto.estadoProd.selectedIndex==0){ 
      	alert("Debe seleccionar el estado del producto.") 
      	document.registrarProducto.estadoProd.focus() 
      	return 0; 
   	}
	
   	//el formulario se envia 
   	alert("Se creo el Producto correctamente.");
   	document.registrarProducto.submit(); 
}

function modificar(){
	document.registrarProducto.nombreProd.focus();
}
</script>

</body>

</html>
