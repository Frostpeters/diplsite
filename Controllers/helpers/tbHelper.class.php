<?php

class tbHelper
{
    static function decodeRows($rows, $fields = array('data_l'), $forThisLn = false)
    {
        foreach ($rows as $key => $value) {
            $rows[$key] = self::decodeRow($value, $fields, $forThisLn);
        }
        return $rows;
    }

    static function decodeRow($row, $fields = array('data_l'), $forThisLn = false)
    {
        global $app;
        foreach ($fields as $key => $value) {
            $row[$value] = self::arrayDecode($row[$value]);
            if ($forThisLn) $row[$value] = self::forThisLn($row[$value]);
            if (is_array($row[$value]))
                foreach ($row[$value] as $k => $v)
                    if (!is_array($v))
                        $row[$value][$k] = stripslashes($v);
        }
        return $row;
    }

    static function forThisLn($data)
    {
        global $app;
        if (isset($app->site_lang->lang_abbreviation) && is_array($data)) {
            foreach ($data as $k => $v)
                $data[strtr(strtolower($k), array('_' . strtolower($app->site_lang->lang_abbreviation) => ''))] = $v;
        }
        return $data;
    }

    static function arrayDecode($a)
    {
        if (is_array($a)) return $a;
        if (!strlen($a)) return array();
        $return = json_decode($a, true);
        if (json_last_error() == JSON_ERROR_NONE) return $return;
        // try base
        $return = unserialize(base64_decode($a));
        if (is_array($return)) return $return;
        return array();
    }
}
