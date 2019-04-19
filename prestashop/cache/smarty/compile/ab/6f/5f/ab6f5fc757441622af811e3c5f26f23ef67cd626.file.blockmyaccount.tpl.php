<?php /* Smarty version Smarty-3.1.14, created on 2019-01-29 01:26:20
         compiled from "C:\xampp\htdocs\prestashop\themes\default\modules\blockmyaccount\blockmyaccount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5681978355c4f9dac329182-13397295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab6f5fc757441622af811e3c5f26f23ef67cd626' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\themes\\default\\modules\\blockmyaccount\\blockmyaccount.tpl',
      1 => 1438180730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5681978355c4f9dac329182-13397295',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5c4f9dac366080_05058037',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c4f9dac366080_05058037')) {function content_5c4f9dac366080_05058037($_smarty_tpl) {?>

<!-- Block myaccount module -->
<div class="block myaccount">
	<p class="title_block"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My account','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My account','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></p>
	<div class="block_content">
		<ul class="bullet">
			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My orders','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My orders','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></li>
			<?php if ($_smarty_tpl->tpl_vars['returnAllowed']->value){?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-follow',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My merchandise returns','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My merchandise returns','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></li><?php }?>
			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-slip',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My credit slips','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My credit slips','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My addresses','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My addresses','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></li>
			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My personal info','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My personal info','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></li>
			<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value){?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('discount',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My vouchers','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'My vouchers','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></li><?php }?>
			<?php echo $_smarty_tpl->tpl_vars['HOOK_BLOCK_MY_ACCOUNT']->value;?>

		</ul>
		<p class="logout"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockmyaccount'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockmyaccount'),$_smarty_tpl);?>
</a></p>
	</div>
</div>
<!-- /Block myaccount module -->
<?php }} ?>