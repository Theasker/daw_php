<?php /* Smarty version Smarty-3.1.16, created on 2014-01-15 15:08:22
         compiled from "..\web\smarty\tarea\templates\productos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2556252d696566d8a96-33683987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6920c457b183fe570f1c37beabcb5ee1b6a20ccd' => 
    array (
      0 => '..\\web\\smarty\\tarea\\templates\\productos.tpl',
      1 => 1389792224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2556252d696566d8a96-33683987',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d696568c0f69_23119289',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d696568c0f69_23119289')) {function content_52d696568c0f69_23119289($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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

<div id="contenedor">
  <div id="encabezado">
    <h1>Listado de productos</h1>
  </div>
    
  <!-- Dividir en varios templates -->
  <div id="cesta">      
    <?php echo $_smarty_tpl->getSubTemplate ("productoscesta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </div>
    
  <div id="productos">
    <?php echo $_smarty_tpl->getSubTemplate ("listaproductos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </div>
  
  <br class="divisor" />
  <div id="pie">
    <form action='logoff.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
    </form>        
  </div>
</div>
</body>
</html><?php }} ?>
