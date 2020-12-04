<!DOCTYPE html>
<html lang="en">
<head>
    <title>Graduate work</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/main.css" type="text/css">
    <link rel="stylesheet" href="../../css/custom.css" type="text/css">

</head>


<div class="header">
    <div class="container">
        <div class="header__inner">
            <div class="header__logo">
                {if $const_header_logo|default:false}
                    <a href="/">
                        <img src="{$const_header_logo}" alt="">
                    </a>
                {/if}
            </div>
            <div class="header__menu">
                {if $const_header_phone|default:false}
                    <ul class="header__menu-phone">
                        <li class="header__menu-call">
                            <a href="tel:{$const_header_phone}">{$const_header_phone}</a>
                        </li>
                        {if $filter|default:false}
                            <li class="haeder__menu-call">
                                {$const_header_language_filter|default:"Мовний фільтр"}
                                <select class="result__language-select lang_filter">
                                    {foreach from=$filter item=i}
                                        <option value="{$i.lang}" class="result__language-option" {if $smarty.session.lang|default:false == $i.lang}selected{/if}>
                                            <p>{$i.lang}</p>
                                        </option>
                                    {/foreach}
                                </select>
                            </li>
                        {/if}
                    </ul>
                {/if}
                {if $const_header_menu_list|default:false}
                    <ul class="header__menu-list">
                        {foreach from=$const_header_menu_list item=i}
                            <li class="header__menu-item {if $smarty.server.REQUEST_URI == $i.link}active{/if}">
                                <a href="{$i.link}">{$i.title}</a>
                            </li>
                        {/foreach}
                    </ul>
                {/if}
            </div>
        </div>
    </div>
</div>
{include file=$block|default:false}
<footer class="footer">
    <div class="container">
        <div class="footer__inner">
            {$const_f_copyright|replace:"%DATE%":date('Y')}
        </div>
    </div>
</footer>
<body>
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="../../js/main.js"></script>
</body>

</html>