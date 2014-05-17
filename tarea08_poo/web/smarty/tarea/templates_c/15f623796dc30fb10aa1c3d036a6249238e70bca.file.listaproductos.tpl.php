<?php /* Smarty version Smarty-3.1.16, created on 2014-01-15 15:08:22
         compiled from "..\web\smarty\tarea\templates\listaproductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1200852d69656ae64c6-11699159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15f623796dc30fb10aa1c3d036a6249238e70bca' => 
    array (
      0 => '..\\web\\smarty\\tarea\\templates\\listaproductos.tpl',
      1 => 1389792226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1200852d69656ae64c6-11699159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'productos' => 0,
    'producto' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d69656b9d691_68922618',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d69656b9d691_68922618')) {function content_52d69656b9d691_68922618($_smarty_tpl) {?>    <?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
        <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
        <input type='submit' name='enviar' value='Añadir'/>
        <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
    <?php } ?>
<?php }} ?>
