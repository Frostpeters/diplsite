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
 * @param string $string input string
 * @param string $search text to search for
 * @param string $replace replacement text
 *
 * @return string
 */
function smarty_modifier_include($string, $var1 = false, $var2 = false)
{
    global $smarty, $app;

    if ($tpl = $app->extAllTpl($string)) {
        if ($var1) $smarty->assign("tpl_var1", $var1);
        if ($var2) $smarty->assign("tpl_var2", $var2);
        return $smarty->fetch($tpl);
    }

    return "";
}
