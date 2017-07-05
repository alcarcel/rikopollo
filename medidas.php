<?php
include 'head.php';
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
                    <h1 class="page-header">MEDIDAS</h1>
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
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				Gestionar Medida
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-lg-6">
					<form role="form">
						<div class="form-group">						
						<label>Nombre Medida</label>
						<input class="form-control" name="nombreProv" id="nombreProv" placeholder="Ingrese valor...">
						</div>
						<div class="form-group">						
						<label>Calidad Medida</label>
						<input class="form-control" name="nombreProv" id="nombreProv" placeholder="Ingrese valor...">
						</div>
						<div class="form-group">
						<label>Estado</label>
							<select class="form-control" name="estadoProv" id="estadoProv">
								<option value="">Seleccione una opcion...</option>
								<option value="1">Activo</option>
								<option value="0">Inactivo</option>
							</select>
						</div>
						
				
				<button type="submit" class="btn btn-primary">Registrar</button>
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
                             Listado MEDIDAS
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="detalleCategoria">
                                    <thead>
                                        <tr>
                                            <th>ID Categoria</th>
                                            <th>Nombre Categoria</th>
                                            <th>Estado</th>
                                            <th>Registrado por:</th>
                                            <th>Fecha Registro</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>1</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">4</td>
                                            <td class="center">X</td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>2</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td class="center">5</td>
                                            <td class="center">C</td>
                                        </tr>
                                        <tr class="odd gradeA">
                                            <td>3</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td class="center">5.5</td>
                                            <td class="center">A</td>
                                        </tr>
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
			$('#detalleCategoria').dataTable();			
        });
    </script>

</body>

</html>
