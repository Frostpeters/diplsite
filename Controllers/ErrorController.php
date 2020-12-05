<?php

class Controllers_ErrorController extends Controllers_Controller
{
    /**
     * Handles page display logic.
     */
    protected function indexAction()
    {
        $this->codeAction();
    }

    public function codeAction()
    {
        global $app;
        $code = '500';
        $title = 'Unknown error';
        if (isset($this->_args['code']) && is_numeric($this->_args['code'])) {
            if ($this->_args['code'] == '403') {
                $code = '403';
                $title = '403 / Forbidden';
            } elseif ($this->_args['code'] == '404') {
                $code = '404';
                $title = '404 / File not found';
            } elseif ($this->_args['code'] == '500') {
                $code = '500';
                $title = '500 / Internal server error';
            }
        }
        http_response_code($code);

        $app->project->getTemplates($code);
    }
}
