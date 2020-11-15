<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty replace modifier plugin
 * Type:     modifier<br>
 * Name:     replace<br>
 * Purpose:  simple search/replace
 *
 * @link   http://smarty.php.net/manual/en/language.modifier.replace.php replace (Smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 * @author Uwe Tews
 *
 * @param string $string  input string
 * @param string $search  text to search for
 * @param string $replace replacement text
 *
 * @return string
 */
function smarty_modifier_t($string)
{
	global $smarty_modifier_t, $app;
	if(!isset($app)) return $string;

	if(!is_array($smarty_modifier_t)){
		$tmp = pdo_query("select * from `cms_translate` ");
		foreach($tmp as $v){
			$tmp = $app->util->arrayDecode($v['translate']);
			if(!$tmp) $tmp = array();
			$smarty_modifier_t[sha1($v['file'].$v['phrase'])] = $tmp;
		}
	}
	$file = '';

	$tmp = debug_backtrace ();
	$tmp = explode('file.', $tmp[0]['file']);
	if(isset($tmp[1])){
		$tmp = explode('.php', $tmp[1]);
		$file = $tmp[0];
	}


	if(isset($smarty_modifier_t[sha1($file.$string)])){
		if(isset($_SESSION['user']['cms_lang']) && isset($smarty_modifier_t[sha1($file.$string)][$_SESSION['user']['cms_lang']]) && strlen($smarty_modifier_t[sha1($file.$string)][$_SESSION['user']['cms_lang']]))
			return $smarty_modifier_t[sha1($file.$string)][$_SESSION['user']['cms_lang']];
	}else{

		$smarty_modifier_t[sha1($file.$string)] = array();
		pdo_query(sprintf("insert into `cms_translate` (`file`, `phrase`, `created`) values('%s', '%s', now())", addslashes($file), addslashes($string)));
	}

    return $string;
}
