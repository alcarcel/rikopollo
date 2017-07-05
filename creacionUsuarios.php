<?php
include 'funciones/handler.php';
?>

<script>

</script>
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
                    <h1 class="page-header">USUARIOS</h1>
                </div>
                <!--End Page Header -->
            </div>
			
	<div class="row">
	<div class="col-lg-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				Gestionar Usuarios
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-lg-12">
					<form role="form" action="funciones/registrarUsuario.php" method="POST" name="registrarUsuario">
						<div class="row">
						<div class="col-lg-12">
						<div class="form-group">
						<?php 
							$sqlTipoUsuario = "SELECT * FROM tipo_usuario";
							$resTipoU = $conexion->query($sqlTipoUsuario);
							$cantTipoU = $resTipoU->num_rows;						
						?>
							<label>Tipo Usuario</label>
							<select class="form-control" name="tipoUsuario" id="tipoUsuario">
								<option value="">Seleccione una opcion...</option>
								<?php 
									if ($cantTipoU > 0){
										while($regTipoU = $resTipoU->fetch_assoc()){
											echo '<option value="'.$regTipoU['tius_id'].'">'.$regTipoU['tius_descripcion'].'</option>';
										}
									}else{
										echo '<div class="alert alert-info"><strong>NO SE ENCONTRARON RESULTADOS</strong></div>';
									}
								?>
							</select>
						</div>
						
						<div class="form-group">
						<?php 
							$sqlSucursal = "SELECT * FROM sucursal";
							$resSucursal = $conexion->query($sqlSucursal);
							$cantSucusal = $resSucursal->num_rows;
						?>
							<label>Sucursual</label>
							<select class="form-control" name="sucursalUsr" id="sucursalUsr">
								<option value="">Seleccione una opcion...</option>
								<?php 
									if($cantSucusal>0){
										while($regSucursal=$resSucursal->fetch_assoc()){
											echo '<option value="'.$regSucursal['sucr_id'].'">'.$regSucursal['sucr_descripcion'].'</option>';
										}
									}
								?>
							</select>
						</div>
						
						<div class="form-group">						
							<label>Nombre Usuario</label>
							<input class="form-control" name="nombreUsr" id="nombreUsr" placeholder="Ingrese valor...">
						</div>
						
						<div class="form-group">						
							<label>Usuario</label>
							<input class="form-control" name="usuario" id="usuario" placeholder="Ingrese valor...">
						</div>
						
						<div class="form-group">						
							<label>Telefono</label>
							<input class="form-control" name="telefonoUsr" id="telefonoUsr" placeholder="Ingrese valor...">
						</div>
						
						<div class="form-group">
							<label>Estado Usuario</label>
							<select class="form-control" name="estadoUsr" id="estadoUsr">
								<option value="">Seleccione una opcion...</option>
								<option value="1">ACTIVO</option>
								<option value="0">INACTIVO</option>
							</select>
						</div>
						
						<div class="form-group" id="botones">
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
	
	<div class="col-lg-9">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Listado Productos
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
					<?php
					
					$sql = "SELECT usua.*, tius.tius_descripcion, sucr.sucr_descripcion FROM usuarios AS usua, tipo_usuario AS tius, sucursal AS sucr WHERE usua.usua_id=tius.tius_id AND sucr.sucr_id=usua.sucr_id;";
					$result = $conexion->query($sql);
					
					$numfilas = $result->num_rows;
					
					if ($result->num_rows > 0) {						
					?>
                                <table class="table table-striped table-bordered table-hover" id="detalleUsuarios">
                                    <thead>
                                        <tr>
                                            <th>ID Usuario</th>
                                            <th>Tipo Usuario</th>
											<th>Sucursal</th>
											<th>Nombre</th>
                                            <th>Usuario</th>
											<th>Telefono</th>
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
							echo "<td>".$row['usua_id']."</td>";
							echo "<td>".$row['tius_descripcion']."</td>";
							echo "<td>".$row['sucr_descripcion']."</td>";
							echo "<td>".$row['usua_nombre']."</td>";
							echo "<td>".$row['usua_usuario']."</td>";
							echo "<td>".$row['usua_telefono']."</td>";
							echo "<td>".$row['usua_estado']."</td>";
							echo "<td>".$row['usua_registradopor']."</td>";
							echo "<td>".$row['usua_fecharegistro']."</td>";
							echo "<td><input type='button' class='btn btn-outline btn-primary btn-xs' value='Modificar' onclick='modificar()' id='btn1'></td>";
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
			$('#detalleUsuarios').dataTable();			
		});
		
		
		$(document).ready(function(){
    $("#btn1").click(function(){
        $("#nombreUsr").val("Cargar Nombre");
    });
	$("#btn1").click(function(){
        $("#telefonoUsr").val("2799428");
    });
	$("#btn1").click(function(){
        $("#usuario").val("admusuario");
    });
	
	$("#btn1").click(function(){
        $("#clave").val("******");
    });	
	$("#btn1").click(function(){
        $("#tipoUsuario").html("<option value='1'>ACTIVO</option>");
    });
	
    $("#btn1").click(function(){
        $("#botones").html("<input type='button' class='btn btn-primary' value='Actualizar' onclick='valida_envio()'> <button type='reset' class='btn btn-success'>Borrar</button>");
    });
    $("#btn3").click(function(){
        $("#test3").val("Dolly Duck");
    });
});
	</script> 
<script>
function valida_envio(){
	if (document.registrarUsuario.tipoUsuario.selectedIndex==0){ 
      	alert("Debe seleccionar un tipo de usuario.") 
      	document.registrarUsuario.tipoUsuario.focus() 
      	return 0; 
   	}
	if (document.registrarUsuario.sucursalUsr.selectedIndex==0){ 
      	alert("Debe seleccionar una Sucursal.") 
      	document.registrarUsuario.sucursalUsr.focus() 
      	return 0; 
   	}
	if (document.registrarUsuario.nombreUsr.value.length==0){ 
      	alert("Tiene que escribir un Nombre") 
      	document.registrarUsuario.nombreUsr.focus() 
      	return 0; 
   	}
	if (document.registrarUsuario.usuario.value.length==0){ 
      	alert("Tiene que escribir un usuario de ingreso") 
      	document.registrarUsuario.usuario.focus() 
      	return 0; 
   	}
	if (document.registrarUsuario.telefonoUsr.value.length==0){ 
      	alert("Tiene que escribir un telefono") 
      	document.registrarUsuario.telefonoUsr.focus() 
      	return 0; 
   	}
	if (document.registrarUsuario.estadoUsr.selectedIndex==0){ 
      	alert("Debe seleccionar una Estado.") 
      	document.registrarUsuario.estadoUsr.focus() 
      	return 0; 
   	}
	
		
   	//el formulario se envia 
   	alert("Se creo el Producto correctamente.");
   	document.registrarUsuario.submit(); 
}

function modificar(){
	document.registrarUsuario.nombreProd.focus();
}


</script>

</body>

</html>
