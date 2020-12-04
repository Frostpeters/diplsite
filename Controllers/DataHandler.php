<?php

class Controllers_DataHandler extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app, $smarty;
        if (isset($_GET['id']) && $_GET['id']) {
            $langs = $app->project->getLangFilter($_GET['id']);
            $smarty->assign('filter', $langs);
            $add = '';
            if (isset($_GET['lang']) && $_GET['lang']) {
                $save = false;
                $lang = str_replace('/', '', $_GET['lang']);
                foreach ($langs as $value) {
                    if ($value['lang'] == $lang) {
                        $save = true;
                    }
                }
                if ($save) {
                    $_SESSION['lang'] = $lang;
                }
                header('Location: /result?id=' . $_GET['id']);
            }
            if (isset($_SESSION['lang']) && $_SESSION['lang'] != 'all') {
                $add = sprintf(" AND `lang` = '%s' ", $_SESSION['lang']);
            }
            $positive = [];
            $negative = [];
            $neutral = [];
            $search_word = pdo_query("SELECT * FROM `search` WHERE `id` = ?", [str_replace('/', '', $_GET['id'])])[0];
            $data = $app->tbHelper->decodeRows(pdo_query(sprintf("SELECT * FROM `results` WHERE `search_id` = ? %s", $add), [str_replace('/', '', $_GET['id'])]), ['text', 'processing_result']);
            foreach ($data as $value) {
                if ($value['type_result'] == 'positive') {
                    $positive[] = $value;
                } elseif ($value['type_result'] == 'negative') {
                    $negative[] = $value;
                } elseif ($value['type_result'] == 'neutral') {
                    $neutral[] = $value;
                }
            }
            $smarty->assign('search', $search_word);
            $smarty->assign('positive', $positive);
            $smarty->assign('negative', $negative);
            $smarty->assign('neutral', $neutral);
        }
        $app->project->getTemplates('result');
    }
}
