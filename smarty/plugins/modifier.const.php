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
function smarty_modifier_const($name, $default = '')
{
	global $prefs;
    if(isset($prefs[$name], $prefs[$name]['data']) && strlen($prefs[$name]['data'])){
        return $prefs[$name]['data'];
    }elseif(isset($prefs["const_".$name], $prefs["const_".$name]['data']) && strlen($prefs["const_".$name]['data'])){
        return $prefs["const_".$name]['data'];
    }
    return $default;
}
