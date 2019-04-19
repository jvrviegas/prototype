<?php /* Smarty version Smarty-3.1.14, created on 2019-01-29 01:26:15
         compiled from "C:\xampp\htdocs\prestashop\themes\default\maintenance.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7738155345c4f9da7e3b712-98341056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88490c94c47e76272e5e99cce2384fff667716a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\themes\\default\\maintenance.tpl',
      1 => 1438180730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7738155345c4f9da7e3b712-98341056',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'favicon_url' => 0,
    'css_dir' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
    'HOOK_MAINTENANCE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5c4f9da7e78615_77683743',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4f9da7e78615_77683743')) {function content_5c4f9da7e78615_77683743($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include 'C:\\xampp\\htdocs\\prestashop\\tools\\smarty\\plugins\\modifier.escape.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<head>
		<title><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_title']->value, 'htmlall', 'UTF-8');?>
</title>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)){?>
		<meta name="description" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_description']->value, 'htmlall', 'UTF-8');?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)){?>
		<meta name="keywords" content="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['meta_keywords']->value, 'htmlall', 'UTF-8');?>
" />
<?php }?>
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)){?>no<?php }?>index,follow" />
		<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['css_dir']->value;?>
maintenance.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="maintenance">
			
			 <p><img src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['logo_image_width']->value){?>width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
"<?php }?> <?php if ($_smarty_tpl->tpl_vars['logo_image_height']->value){?>height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
"<?php }?> alt="logo" /><br /><br /></p>
			 <?php echo $_smarty_tpl->tpl_vars['HOOK_MAINTENANCE']->value;?>

			 <p id="message">
				<?php echo smartyTranslate(array('s'=>'In order to perform website maintenance, our online store will be temporarily offline.'),$_smarty_tpl);?>
<br /><br />
				<?php echo smartyTranslate(array('s'=>'We apologize for the inconvenience and ask that you please try again later.'),$_smarty_tpl);?>

			 </p>

			 <span style="clear:both;">&nbsp;</span>
		</div>
	</body>
</html>
<?php }} ?>