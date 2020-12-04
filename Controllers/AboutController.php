<?php

class Controllers_AboutController extends Controllers_Controller
{
    /**
     * Performs page rendering logic.
     */
    protected function indexAction()
    {
        global $app;
        $app->project->getTemplates('about');
    }
}
