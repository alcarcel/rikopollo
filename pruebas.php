<?php
// datos para la conexion a mysql
define('DB_SERVER','localhost');
define('DB_NAME','TU_BASE_DE_DATOS');
define('DB_USER','TU_USUARIO');
define('DB_PASS','TU_CLAVE');
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
mysql_select_db(DB_NAME,$con);
?>


<?php
    session_start();
    session_destroy();
 
    header('location: index.php');
?>


<?php
session_start();
include_once "conexion.php";

function verificar_login($user,$password,&$result) {
    $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'";
    $rec = mysql_query($sql);
    $count = 0;

    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }

    if($count == 1)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}

if(!isset($_SESSION['userid']))
{
    if(isset($_POST['login']))
    {
        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)
        {
            $_SESSION['userid'] = $result->idusuario;
            header("location:index.php");
        }
        else
        {
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
        }
    }
?>

<style type="text/css">
*{
	font-size: 14px;
}
form.login {
    background: none repeat scroll 0 0 #F1F1F1;
    border: 1px solid #DDDDDD;
    font-family: sans-serif;
    margin: 0 auto;
    padding: 20px;
    width: 278px;
}
form.login div {
    margin-bottom: 15px;
    overflow: hidden;
}
form.login div label {
    display: block;
    float: left;
    line-height: 25px;
}
form.login div input[type="text"], form.login div input[type="password"] {
    border: 1px solid #DCDCDC;
    float: right;
    padding: 4px;
}
form.login div input[type="submit"] {
    background: none repeat scroll 0 0 #DEDEDE;
    border: 1px solid #C6C6C6;
    float: right;
    font-weight: bold;
    padding: 4px 20px;
}
.error{
    color: red;
    font-weight: bold;
    margin: 10px;
    text-align: center;
}
</style>

<form action="" method="post" class="login">
	<div><label>Username</label><input name="user" type="text" ></div>
	<div><label>Password</label><input name="password" type="password"></div>
	<div><input name="login" type="submit" value="login"></div>
</form>
<?php
} else {
	echo 'Su usuario ingreso correctamente.';
	echo '<a href="logout.php">Logout</a>';
}
?>

CREATE TABLE `usuarios` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(20) NOT NULL,
  `password` VARCHAR(10) NOT NULL,
  PRIMARY KEY  (`idusuario`)
)

--USUARIOS--
CREATE TABLE `rikopollo`.`usuarios` ( 
`usua_id` INT(10) NOT NULL AUTO_INCREMENT, 
`usua_nombre` VARCHAR(50) NOT NULL, 
`usua_usuario` VARCHAR(50) NOT NULL, 
`usua_clave` VARCHAR(50) NOT NULL, 
`usua_fecharegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(), 
PRIMARY KEY (`usua_id`)
) ENGINE = InnoDB;

--REGISTRO DE USUARIO--
INSERT INTO `usuarios` 
(`usua_id`, `usua_nombre`, `usua_usuario`, `usua_clave`, `usua_fecharegistro`) 
VALUES 
(NULL, 'administrador general', 'admricopollo', 'r1c0p0ll0', CURRENT_TIMESTAMP);

CREATE TABLE `rikopollo`.`proveedor` ( `prov_id` INT(10) NOT NULL AUTO_INCREMENT ,  `prov_nombreEmpresa` VARCHAR(50) NOT NULL ,  `prov_nombreContacto` VARCHAR(50) NOT NULL ,  `prov_telefonoContacto` INT(10) NOT NULL ,  `prov_direccion` VARCHAR(50) NOT NULL ,  `prov_tipoPago` INT(10) NOT NULL ,  `prov_facturacion` INT(10) NOT NULL ,  `prov_estado` INT(10) NOT NULL ,  `prov_registradopor` VARCHAR(50) NOT NULL ,  `prov_fechaModificacion` TIMESTAMP on update CURRENT_TIMESTAMP() NOT NULL DEFAULT CURRENT_TIMESTAMP() ,  `prov_fecharegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ,    PRIMARY KEY  (`prov_id`)) ENGINE = InnoDB;
CREATE TABLE `rikopollo`.`productos` ( `prod_id` INT NOT NULL , `cate_id` INT NOT NULL , `medi_id` INT NOT NULL , `prod_nombre` INT NOT NULL , `prod_precioCompra` INT NOT NULL , `prod_minimoAlerta` INT NOT NULL , `prod_promocion` INT NOT NULL , `prod_registradopor` INT NOT NULL , `prod_fechacreacion` INT NOT NULL ) ENGINE = InnoDB;
CREATE TABLE `rikopollo`.`productomenu` ( `prme_id` INT(10) NOT NULL AUTO_INCREMENT , `menu_id` INT(10) NOT NULL , `prod_id` INT(10) NOT NULL , `prme_medida` VARCHAR(50) NOT NULL , `prme_registradopor` VARCHAR(50) NOT NULL , `prme_fecharegistro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() , PRIMARY KEY (`prme_id`)) ENGINE = InnoDB;













 <form role="form">
                                        <div class="form-group">
                                            <label>Text Input</label>
                                            <input class="form-control">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Text Input with Placeholder</label>
                                            <input class="form-control" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Static Control</label>
                                            <p class="form-control-static">email@example.com</p>
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file">
                                        </div>
                                        <div class="form-group">
                                            <label>Text area</label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Checkboxes</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 1
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 2
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Inline Checkboxes</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">1
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">2
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox">3
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Radio Buttons</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Inline Radio Buttons</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Selects</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Multiple Selects</label>
                                            <select multiple class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Button</button>
                                        <button type="reset" class="btn btn-success">Reset Button</button>
                                    </form>

									
3165763384