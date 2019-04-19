<?php /* Smarty version Smarty-3.1.14, created on 2019-01-29 01:26:17
         compiled from "C:\xampp\htdocs\prestashop\themes\default\mobile\order-opc-payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4521653695c4f9da9ee5c40-92458780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '000233dfdf670c7f8b8a5e6089de36edfdb95085' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\themes\\default\\mobile\\order-opc-payment.tpl',
      1 => 1438180730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4521653695c4f9da9ee5c40-92458780',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_PAYMENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5c4f9da9f22b49_26431630',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4f9da9f22b49_26431630')) {function content_5c4f9da9f22b49_26431630($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('default', 'page_title', null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Payment: '),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->getSubTemplate ('./page-title.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div data-role="content">
	<fieldset data-role="controlgroup">
		<?php echo $_smarty_tpl->tpl_vars['HOOK_PAYMENT']->value;?>

	</fieldset>
</div>
<?php }} ?>