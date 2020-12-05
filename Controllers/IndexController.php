<?php
class Controllers_IndexController extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app, $smarty;
        $sites = ['facebook' => 'facebook.com'];
        $smarty->assign('sites', $sites);

        $last_search = pdo_query("SELECT * FROM `search` ORDER BY `created` DESC LIMIT 10");
        $smarty->assign('last_search', $last_search);

        if (isset($_POST['action']) && $_POST['action'] == 'search') {
            pdo_query("INSERT INTO `search` (`search_text`, `created`, `search_site`) VALUES(?, now(), ?)", [$_POST['search_text'], $_POST['search_site']]);
            $id = pdo_lastInsertId();
            $limit = 3000;
            if (isset($_POST['fast_search']) && $_POST['fast_search']){
                $limit = 1000;
            }
            $url = sprintf('scrapy crawl %s -a email="%s" -a pass="%s" -a find="%s" -a search_id="%d" -a count="%d"',
                $_POST['search_site'], defined('EMAIL') ? EMAIL : '', defined('PASSWORD') ? PASSWORD : '', $_POST['search_text'], $id, $limit);
            chdir(__DIR__ . '/../../../spider/spider/quotespider/quotespider');
            shell_exec($url);
            $app->project->analizeData($id);
            $_SESSION['lang'] = 'all';

            die(json_encode(['success' => true, 'return' => $id]));
        }
        $app->project->getTemplates('first_step');
    }
}
