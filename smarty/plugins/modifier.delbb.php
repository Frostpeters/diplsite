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
function smarty_modifier_delbb($string)
{
		$string = preg_replace('[spec_menu.*spec_menu]', '', $string);
		$trans = array(
			"[b]"			=> "", 
			"[B]"			=> "", 
			"[/B]"			=> "", 
			"[/b]"			=> "",

			"[span]"			=> "", 
			"[SPAN]"			=> "", 
			"[/SPAN]"			=> "", 
			"[/span]"			=> "",
			
			"[i]"			=> "", 
			"[I]"			=> "", 
			"[/I]"			=> "", 
			"[/i]"			=> "",
			
			"[br]"			=> "",
			"[BR]"			=> "",
			"[spec_menu]"	=> "",
			"[/spec_menu]"	=> "",
			"["				=> "",
			"]"				=> "",
		);
		return strtr($string, $trans);
}
