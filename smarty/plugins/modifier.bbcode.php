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
function smarty_modifier_bbcode($string)
{
	$trans = array(
			"[b]"			=> "<strong>", 
			"[B]"			=> "<strong>", 
			"[/B]"			=> "</strong>", 
			"[/b]"			=> "</strong>",
			"[strong]"		=> "<strong>", 
			"[STRONG]"		=> "<strong>", 
			"[/STRONG]"		=> "</strong>", 
			"[/strong]"		=> "</strong>",
			
			"[h4]"			=> "<strong class='h4'>", 
			"[H4]"			=> "<strong class='h4'>", 
			"[/H4]"			=> "</strong>", 
			"[/h4]"			=> "</strong>",
			
			"[i]"			=> "<i>", 
			"[I]"			=> "<i>", 
			"[/I]"			=> "</i>", 
			"[/i]"			=> "</i>",
			
			"[span]"			=> "<span>", 
			"[SPAN]"			=> "<span>",
			"[/span]"			=> "</span>", 
			"[/SPAN]"			=> "</span>",
			
			"[br]"			=> "<br>",
			"[BR]"			=> "<br>",
			"[spec_menu]"	=> "</span><br><span class=\"nav-b2\">",
			"[/spec_menu]"	=> "",
		);
		return strtr($string, $trans);
}
