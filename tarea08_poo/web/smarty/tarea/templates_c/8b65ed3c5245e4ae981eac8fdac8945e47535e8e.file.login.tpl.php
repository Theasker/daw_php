<?php /* Smarty version Smarty-3.1.16, created on 2014-01-15 14:49:43
         compiled from "..\web\smarty\tarea\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1062952d691f7378e17-90868787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b65ed3c5245e4ae981eac8fdac8945e47535e8e' => 
    array (
      0 => '..\\web\\smarty\\tarea\\templates\\login.tpl',
      1 => 1389792224,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1062952d691f7378e17-90868787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d691f7800ae4_80144189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d691f7800ae4_80144189')) {function content_52d691f7800ae4_80144189($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: login.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Login Tienda Web con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
    <form action='login.php' method='post'>
    <fieldset >
        <legend>Login</legend>
        <div><span class='error'><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>

        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' />
        </div>
    </fieldset>
    </form>
    </div>
</body>
</html><?php }} ?>
