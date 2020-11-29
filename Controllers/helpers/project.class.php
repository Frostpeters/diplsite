<?php

class project extends Controllers_Controller
{
    public function getTemplates($template_name = false)
    {
        global $smarty;
        //header content
        $smarty->assign('header_phone', '+380930519560');

        //footer content
        $smarty->assign('copyright', '<p>made by Genia Rak</p><p>CNUT %DATE%©</p>');
        if ($template_name) {
            $smarty->assign('block', $template_name . '.tpl');
        }

        return $this->_templateFile = 'index.tpl';
    }


}
