<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsFilter
 */

/**
 * Smarty htmlspecialchars variablefilter plugin
 *
 * @param string $source input string
 *
 * @return string filtered output
 */
function smarty_variablefilter_delbb($source)
{
	$source = preg_replace('[spec_menu.*spec_menu]', '', $source);
		//$a = preg_replace('/\[(spec_menu)=("?)(.{9,}?)\2\]/', '', $a);
	$trans = array(
		"[b]"			=> "", 
		"[B]"			=> "", 
		"[/B]"			=> "", 
		"[/b]"			=> "",
		
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
	return strtr($source, $trans);
}
