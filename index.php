<?php
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION['loggedin'] == true) {
	//si no existe, va a la página de autenticacion
	header("Location: inicio.php");	
	//salimos de este script
	exit();
}

include 'head.php';

?>
	
<div id="dvLoading"></div>
<script type="text/javascript" src="assets/scripts/apprise.js"></script>
<link rel="stylesheet" href="assets/css/apprise.css" type="text/css" />
<script>
	function flogin(){
	var usuario=$('#usuario').val()
	var password=$('#password').val()
    //var idpc=$('#idpc1').val()    
	var loginpost = {'usuario':usuario,'password':password/*,'idpc':idpc*/};
	$.post('procesador.php', loginpost, function(myData) {
		if(myData.reply=='ok'){
			loginform.submit()
		}
		if(myData.reply=='error'){
			apprise("Usuario o clave erronea, intentelo de nuevo");
		}
    }, 'json');
	return false
}

swal("Feliz 2016","FELIZ 2016 DE PARTE DE TODA LA FAMILIA DE PRACTISISTEMAS!","success");
</script>



</head>
<body class="body-Login-back">

    <div class="container">
       
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <img src="assets/img/logo.png" alt=""/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Inicie Sesión</h3>
                    </div>
                    <div class="panel-body">
						<form role="form" method='POST' action='inicio.php'  id='loginform' onsubmit='return flogin();'>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ingrese Usuario..." name="usuario" id="usuario" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ingrese Clave..." name="password" id="password"  type="password" value="">
                                </div>
                                <!--
								action="checklogin.php"
								<div class="checkbox">
									<label>
                                        <input name="remember" type="checkbox" value="Recordar Datos">Recordar Datos
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->                                
								<button type="submit" name="Submit" value='Login' class="btn btn-lg btn-success btn-block">Ingresar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'scripts.php';
?>

</body>

</html>