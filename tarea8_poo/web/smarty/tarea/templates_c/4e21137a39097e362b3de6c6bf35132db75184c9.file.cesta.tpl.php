<?php /* Smarty version Smarty-3.1.16, created on 2014-01-18 16:52:25
         compiled from "../web/smarty/tarea/templates/cesta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143710377952dab149914978-93631625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e21137a39097e362b3de6c6bf35132db75184c9' => 
    array (
      0 => '../web/smarty/tarea/templates/cesta.tpl',
      1 => 1389734538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143710377952dab149914978-93631625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'productoscesta' => 0,
    'producto' => 0,
    'coste' => 0,
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52dab149b87222_78319667',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52dab149b87222_78319667')) {function content_52dab149b87222_78319667($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: cesta.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Cesta de la Compra con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagcesta">

<div id="contenedor">
  <div id="encabezado">
    <h1>Cesta de la compra</h1>
  </div>
  <div id="productos">

    <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productoscesta']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
        <p>
            <span class='codigo'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
</span>
            <span class='nombre'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombre();?>
</span>
            <span class='precio'><?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
</span>
        </p>

    <?php } ?>
    <hr />
    <p><span class='pagar'>Precio total: <?php echo $_smarty_tpl->tpl_vars['coste']->value;?>
 €</span></p>
    <form action='pagar.php' method='post'>
        <p><span class='pagar'>
            <input type='submit' name='pagar' value='Pagar'/>
        </span></p>
    </form>
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
</html>
<?php }} ?>
