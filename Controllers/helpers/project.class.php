<?php

use Sentiment\Analyzer;

require_once __DIR__ . '/../../vendor/pear/text_languagedetect/Text/LanguageDetect.php';

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

    public function analizeData($id = false)
    {
        global $app;
        if ($id) {
            $ld = new Text_LanguageDetect();
            $analyzer = new Analyzer();
            $data = pdo_query("SELECT * FROM `comments` WHERE `search_id` = ?", [$id]);
            if (!empty($data)) {
                foreach ($data as $value) {
                    $value['text'] = json_decode($value['text'], true);
                    $lang = $ld->detectSimple($value['text']);
                    $output = $analyzer->getSentiment($value['text']);
                    if ($output['compound'] >= 0.05) {
                        $type_result = 'positive';
                    } elseif ($output['compound'] < 0.05 && $output['compound'] > -0.05) {
                        $type_result = 'neutral';
                    } else {
                        $type_result = 'negative';
                    }
                    pdo_query("INSERT INTO `results` (`search_id`, `comment_id`, `text`, `processing_result`, `type_result`, `lang`, `page`, `created`) VALUES(?,?,?,?,?,?,?,now())", [
                        $value['search_id'], $value['id'], json_encode($value['text']), json_encode($output), $type_result, $lang, $value['page']
                    ]);
                }
            }
        }
    }

}
