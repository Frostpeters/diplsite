<?php
require_once __DIR__ . '/ErrorController.php';

class Controllers_DataComments extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app, $smarty;
        if (isset($_GET['id'], $_GET['type']) && $_GET['id'] && $_GET['type']) {
            $id = str_replace('/', '', $_GET['id']);
            $type = str_replace('/', '', $_GET['type']);
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
                header('Location: /comments?id=' . $id . '&type=' . $type);
            }
            if (isset($_SESSION['lang']) && $_SESSION['lang'] != 'all') {
                $add = sprintf(" AND `lang` = '%s' ", $_SESSION['lang']);
            }
            $smarty->assign('type', $type);
            $data = $app->tbHelper->decodeRows(pdo_query(sprintf("SELECT * FROM `results` WHERE `search_id` = ? AND `type_result` = ? %s", $add), [$id, $type]), ['text', 'processing_result']);
            $smarty->assign('comments', $data);
            $app->project->getTemplates('comments');
        } else {
            $error = new Controllers_ErrorController();
            $error->codeAction();
        }
    }
}
