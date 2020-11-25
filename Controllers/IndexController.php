<?php
require_once __DIR__.'/helpers/project.class.php';
class Controllers_IndexController extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app;
        $app->project->getTemplates('first_step');
    }
}