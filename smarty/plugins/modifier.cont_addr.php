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
function smarty_modifier_cont_addr($string)
{
    global $globals;

	$trans = array(
			"\"image/"			=> "\"/image/",
			"../"			=> "/",
			//' src="'		=> ' src="/templates/amparo/assets/images/img-valid.png" data-lazysrc="yes" data-src="'
		);

	if(isset($globals['cont_addr']) && is_array($globals['cont_addr'])){
        $trans = array_merge($trans, $globals['cont_addr']);
    }

	return strtr($string, $trans);
}
