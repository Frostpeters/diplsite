<?php

class Controllers_DataHandler extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app, $smarty;
        $smarty->assign('search_result_title', 'Результат пошуку');
        $smarty->assign('search_by_const', 'Поиск произведен по: ');
        $smarty->assign('search_on_site_const', 'На сайте: ');
        $smarty->assign('search_neutral_const', 'Нейтральний результат: ');
        $smarty->assign('search_choose_lang_const', 'Мовний фільтр: ');
        $smarty->assign('search_positive_result_const', 'Good results found: ');
        $smarty->assign('search_negative_result_const', 'Bad results found: ');
        if (isset($_GET['id']) && $_GET['id']) {
            $add = '';
            if (isset($_GET['lang']) && $_GET['lang']){
                $lang = str_replace('/', '', $_GET['lang']);
                if ($lang == 'ua'){
                    $add = " AND `lang` = 'ukrainian' ";
                }elseif ($lang == 'en'){
                    $add = " AND `lang` = 'english' ";
                }elseif ($lang == 'ru'){
                    $add = " AND `lang` = 'russian' ";
                }
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
