<?php
require_once __DIR__.'/ErrorController.php';
class Controllers_DataComments extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app, $smarty;
        $smarty->assign('search_neutral_const', 'Нейтральний результат: ');
        $smarty->assign('search_positive_result_const', 'Good results found: ');
        $smarty->assign('search_negative_result_const', 'Bad results found: ');
        if (isset($_GET['id'], $_GET['type']) && $_GET['id'] && $_GET['type']) {
            $id = str_replace('/', '', $_GET['id']);
            $type = str_replace('/', '', $_GET['type']);
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
            $smarty->assign('type', $type);
            $data = $app->tbHelper->decodeRows(pdo_query(sprintf("SELECT * FROM `results` WHERE `search_id` = ? AND `type_result` = ? %s", $add), [$id, $type]), ['text', 'processing_result']);
            $smarty->assign('comments', $data);
            $app->project->getTemplates('comments');
        }else{
            $error = new Controllers_ErrorController();
            $error->codeAction();
        }
    }
}
