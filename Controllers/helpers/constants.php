<?php
global $smarty;

$const = [
    'header' => [
        'header_phone' => '+380930519560',
        'header_logo' => '/../../media/img/logo.svg',
        'header_language_filter' => 'Мовний фільтр',
        'header_menu_list' => [['link' => '/', 'title' => 'Головна'],['link' => '/about', 'title' => 'Про нас']],
    ],
    'footer' => [
        'f_copyright' => '<p>made by Genia Rak</p><p>CNUT %DATE%©</p>',
    ],
    'index' => [
        'i_title' => 'Select site',
        'i_button_search' => 'Search',
        'i_quick_search' => 'Quick Search',
        'i_last_search' => 'Last search',
        'i_search_text' => 'Search text: <b class="bold">%SEARCH%</b> on site: %SITE% in time: %TIME%',
    ],
    'result' => [
        'r_search_result_title' => 'Результат пошуку',
        'r_search_by_const' => 'Поиск произведен по: ',
        'r_search_on_site_const' => 'На сайте: ',
        'r_search_neutral_const' => 'Нейтральний результат: ',
        'r_search_choose_lang_const' => 'Мовний фільтр: ',
        'r_search_positive_result_const' => 'Good results found: ',
        'r_search_negative_result_const' => 'Bad results found: ',
    ],
];
foreach ($const as $p_value) {
    foreach ($p_value as $key => $value) {
        if (!empty($value)) {
            $smarty->assign('const_' . $key, $value);
        }
    }
}