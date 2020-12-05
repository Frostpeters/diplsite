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
        'f_copyright' => '<p>розробник Genia Rak</p><p>CNUT %DATE%©</p>',
    ],
    'index' => [
        'i_title' => 'Оберіть сайт',
        'i_button_search' => 'Пошук',
        'i_quick_search' => 'Обмежений пошук (максимум 1000 коментарів)',
        'i_last_search' => 'Останні пошуки',
        'i_search_text' => 'Пошук за словом: <b class="bold">%SEARCH%</b> на сайті: <b class="bold">%SITE%</b>  в: <b class="bold">%TIME%</b> ',
    ],
    'result' => [
        'r_search_result_title' => 'Результат пошуку',
        'r_search_by_const' => 'Пошук по слову: ',
        'r_search_on_site_const' => 'На сайті: ',
        'r_search_neutral_const' => 'Нейтральний результат: ',
        'r_search_choose_lang_const' => 'Мовний фільтр: ',
        'r_search_positive_result_const' => 'Позитивний результат: ',
        'r_search_negative_result_const' => 'Негативний результат: ',
    ],
];
foreach ($const as $p_value) {
    foreach ($p_value as $key => $value) {
        if (!empty($value)) {
            $smarty->assign('const_' . $key, $value);
        }
    }
}