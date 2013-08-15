<?php /* Smarty version Smarty-3.1.14, created on 2013-08-13 23:50:57
         compiled from "smarty/templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1605153824520aea3d1f07a7-71575516%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c73c3ab5389ae998a7b3a148aaa1503d76c187' => 
    array (
      0 => 'smarty/templates/login.tpl',
      1 => 1376448656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1605153824520aea3d1f07a7-71575516',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_520aea3d22a057_26409894',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520aea3d22a057_26409894')) {function content_520aea3d22a057_26409894($_smarty_tpl) {?><div id="login">
	<form action="login_submit" method="get" accept-charset="utf-8">
		<input type="text" name="usuario" value="" placeholder="Usuário"><br />		
		<input type="password" name="password" value="" placeholder="Senha"><br />
		<input type="submit" name="login" value="Logar">
		</form>
</div><?php }} ?>