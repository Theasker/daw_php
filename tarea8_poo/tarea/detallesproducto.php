<?php
require_once('include/DB.php');
require_once('../Smarty/libs/Smarty.class.php');


// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = '../web/smarty/tarea/templates/';
$smarty->compile_dir = '../web/smarty/tarea/templates_c/';
$smarty->config_dir = '../web/smarty/tarea/configs/';
$smarty->cache_dir = '../web/smarty/tarea/cache/';

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('ordenador', DB::obtieneOrdenador($_REQUEST['cod']));


// Mostramos la plantilla
$smarty->display('detallesproducto.tpl');

?>
