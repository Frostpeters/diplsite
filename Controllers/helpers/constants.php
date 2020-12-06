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
    'about' => [
        'about_text' => '            <h1 class="about__title-h1">Про цей проект</h1>
            <p class="about__description">
                Привіт, мене зввти Женя і я розробник цього проекту.
            </p>
            <div class="about__description">
                Що із себе представляє цей проект? Це простий парсер для пошуку та обробки коментарів на різноманітних сайтах.
                Ви досить швидко зможете отримати інформацію, про то, що ж люди думають про той чи інший продукт (бренд)
                На данний час у нас присутній лише парсер для коментарів із <a href="facebook.com" class="about__link">facebook.com</a>, але згодом ми будемо додавати парсери і для інших сайтів.
            </div>
            <h2 class="about__title-h2">
                Як ним користуватися?
            </h2>
            <p class="about__description">
                Все досить просто. Насамперед на <a href="/" class="about__link">домашній сторінці</a> вибираємо сайт на котрому буде пошук, після вписуємо пошукове слово.
                За бажанням ви можете вибрати швидкий пошук. У такому випадку кількість коментарів буде обмежено всього 1000 коментарями.
                Після натиснути кнопку пошуку і трохи почекати.
                Після нетривалого пошуку ви отримаєте результат. На першій сторінці буде представлено максимум по 50 коментарів для позитивного і негативного результату.
                Перейшовши на посилання позитивного / негативного / нейтрального результатів ви зможете бачити повну картину.
                На сайті присутнє запам`ятовування останніх пошукових запитів і мовної фільтр.
            </p>
            <h2 class="about__title-h2">
Що цей сайт може?
            </h2>
            <ul class="about__list">
                <li class="about__list-item">Пошук коментрів</li>
                <li class="about__list-item">Обробка на тональність коментарів</li>
                <li class="about__list-item">Мовний фільтр</li>
                <li class="about__list-item">Історія вашого пошуку</li>
                <li class="about__list-item">Доброзичливий інтерфейс</li>
            </ul>
            <h2 class="about__title-h2">
Трохи інйормації про нас.
            </h2>
            <p class="about__description">
Це дипломний проект студента групи МКІп - 191 Рак Є.О. "Комп`ютерна система пошуку та обробка інформації з веб джерел"<br />
                Над поектом працювали:
            </p>
            <ol class="about__list">
                <li class="about__list-ol"><strong>Програміст:</strong> Рак Євген (група МКІп - 191)</li>
                <li class="about__list-ol"><strong>Верстальник:</strong> Коваленко Дмитро (група МКІн - 191)</li>
            </ol>'
    ]
];
foreach ($const as $p_value) {
    foreach ($p_value as $key => $value) {
        if (!empty($value)) {
            $smarty->assign('const_' . $key, $value);
        }
    }
}