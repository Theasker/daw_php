<?php /* Smarty version Smarty-3.1.16, created on 2014-01-24 14:29:42
         compiled from "../web/smarty/tarea/templates/detallesproducto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101375631452e24763b15634-30487615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f05dec4ac1455fcaa674edde7c36eb1c7098c109' => 
    array (
      0 => '../web/smarty/tarea/templates/detallesproducto.tpl',
      1 => 1390573774,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101375631452e24763b15634-30487615',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52e24763d39913_18425043',
  'variables' => 
  array (
    'ordenador' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52e24763d39913_18425043')) {function content_52e24763d39913_18425043($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: productos.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de Productos con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagproductos">

<div id="caracteristicas">
  <div id="encabezado">
    <h2><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h2>
    <p>Código: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</p>
  </div>
 
    <h3>Caracteristicas:</h3>
    <p id="productos">Procesador: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</p>
    <p id="productos">RAM: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getram();?>
</p>
    <p id="productos">Disco Duro: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdisco();?>
</p>
    <p id="productos">Tarjeta Gráfica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</p>
    <p id="productos">Unidad óptica: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdisco();?>
</p>
    <p id="productos">Sistema operativo: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getso();?>
</p>
    <p id="productos">Otros: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</p>
    <p id="productos">PVP: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getpvp();?>
</p>
    
    <h3>Descripción:</h3>
    <p id="productos"><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</p>
    
    <br class="divisor" />
    <a  id="productos" href="productos.php">Volver</a>
 
</div>
</body>
</html><?php }} ?>
