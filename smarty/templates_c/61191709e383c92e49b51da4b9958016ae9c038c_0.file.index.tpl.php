<?php
/* Smarty version 3.1.30, created on 2020-11-15 17:48:59
  from "/var/www/testmvc/diplsite/smarty/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5fb14deb38d276_72035937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61191709e383c92e49b51da4b9958016ae9c038c' => 
    array (
      0 => '/var/www/testmvc/diplsite/smarty/templates/index.tpl',
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
function content_5fb14deb38d276_72035937 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<?php $_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<body>
<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<h1>Welcome</h1>
		<p>This is the default <a href="http://sipmvc.mludd.se">sipMVC</a> index page. If you are seeing this page instead of the page you were expecting then please contact the administrator of the website you are attempting to view.</p>
		<p>For more information about sipMVC please visit <a href="http://sipmvc.mludd.se">sipMVC.mludd.se</a>, the <a href="/about">About page</a> or check out the README file included with sipMVC.</p>
	</body>
</html>
<?php }
}
