<?php
/* Smarty version 3.1.30, created on 2020-11-15 17:38:38
  from "/var/www/testmvc/sipmvc/smarty/templates/404.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb14b7ec9f2c5_89818028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2a6a6d30ad126b7810671e9551026101ba48b2a' => 
    array (
      0 => '/var/www/testmvc/sipmvc/smarty/templates/404.tpl',
      1 => 1605445262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5fb14b7ec9f2c5_89818028 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<body>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<h1>404/File Not Found</h1>
		<p>The page you're looking for does not appear to exist.</p>
	</body>
</html>
<?php }
}
