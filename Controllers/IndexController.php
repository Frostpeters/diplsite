<?php
require_once __DIR__.'/helpers/project.class.php';
class Controllers_IndexController extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app, $smarty;
        $smarty->assign('title', 'Select site');
        $smarty->assign('button_search', 'Search');
        $smarty->assign('quick_search', 'Quick Search');
        $sites = ['facebook' => 'facebook.com'];
        $smarty->assign('sites', $sites);

        if (isset($_POST['action']) && $_POST['action'] == 'search') {
            pdo_query("INSERT INTO `search` (`search_text`, `created`, `search_site`) VALUES(?, now(), ?)", [$_POST['search_text'], $_POST['search_site']]);
            $id = pdo_lastInsertId();
            $limit = 3000;
            if (isset($_POST['fast_search']) && $_POST['fast_search']){
                $limit = 500;
            }
            $url = sprintf('scrapy crawl %s -a email="EMAIL" -a pass="PASSWODR" -a find="%s" -a search_id="%s" -a count="%s"',
                $_POST['search_site'], $_POST['search_text'], $id, $limit);
//            print_r($url);die;
            chdir(__DIR__ . '/../../spider/quotespider/quotespider');
            shell_exec($url);
            die(json_encode(['success' => true, 'return' => $id]));
        }
        $app->project->getTemplates('first_step');
    }
}
