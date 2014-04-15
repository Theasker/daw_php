<?php /* Smarty version Smarty-3.1.16, created on 2014-01-23 21:55:53
         compiled from "../web/smarty/tarea/templates/listaproductos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102996588352d5b7252f5682-20067881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30d1ff748978ffcb2cdc3cb2dfc18203a9f0b842' => 
    array (
      0 => '../web/smarty/tarea/templates/listaproductos.tpl',
      1 => 1390514150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102996588352d5b7252f5682-20067881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d5b725322ba8_11716040',
  'variables' => 
  array (
    'productos' => 0,
    'producto' => 0,
    'ordenadores' => 0,
    'ordenador' => 0,
    'encontrado' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d5b725322ba8_11716040')) {function content_52d5b725322ba8_11716040($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['producto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['producto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->key => $_smarty_tpl->tpl_vars['producto']->value) {
$_smarty_tpl->tpl_vars['producto']->_loop = true;
?>
  <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
    <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
    <input type='submit' name='enviar' value='Añadir'/>
    
    
    <?php $_smarty_tpl->tpl_vars["encontrado"] = new Smarty_variable(0, null, 0);?>
    <?php  $_smarty_tpl->tpl_vars['ordenador'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ordenador']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ordenadores']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ordenador']->key => $_smarty_tpl->tpl_vars['ordenador']->value) {
$_smarty_tpl->tpl_vars['ordenador']->_loop = true;
?>
      <?php if ($_smarty_tpl->tpl_vars['producto']->value->getcodigo()==$_smarty_tpl->tpl_vars['ordenador']->value->getcodigo()) {?>       
        <?php $_smarty_tpl->tpl_vars["encontrado"] = new Smarty_variable(1, null, 0);?>
      <?php }?>
    <?php } ?>
    <?php if ($_smarty_tpl->tpl_vars['encontrado']->value==1) {?>
      <a href="detallesproducto.php?cod=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
"> 
        <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</a></form></p>
      <?php } else { ?>
        <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
<?php }?>

<?php } ?>
<?php }} ?>
