<?php

class project extends Controllers_Controller
{
    public function getTemplates($template_name = false)
    {
        global $smarty;
        if ($template_name) {
            $smarty->assign('block', $template_name . '.tpl');
        }

        return $this->_templateFile = 'index.tpl';
    }
}
