<?php
require_once __DIR__.'/helpers/project.class.php';
class Controllers_DataHandler extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app;
        $app->project->getTemplates('result');
    }
}
