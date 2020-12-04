<main class="result">
    <div class="container">
        <div class="result__inner">
            <p class="result__inner-title">{$const_r_search_result_title|default:"Result of Search"}</p>
            <div class="result__for">
                {$const_r_search_by_const|default:"Поиск произведен по: "}<span>{$search.search_text|default}</span>
            </div>
            <div class="result__site">
                {$const_r_search_on_site_const|default:"На сайте: "}<span>{$search.search_site|default}</span>
            </div>
            <div class="result__not-correct">
                {$const_r_search_neutral_const|default:"Необработаный результат "}<span>
                    <a href="/comments/?id={$search.id}&type=neutral" target="_blank">{$neutral|count|default:0}</a>
                </span>
            </div>
{*            <div class="result__not-correct">*}
{*                {$search_choose_lang_const|default:""}<span>*}
{*                    <a href="/result?id={$search.id}">All</a>*}
{*                    <a href="/result?id={$search.id}&lang=ua">UA</a>*}
{*                    <a href="/result?id={$search.id}&lang=en">EN</a>*}
{*                    <a href="/result?id={$search.id}&lang=ru">RU</a>*}
{*                </span>*}
{*            </div>*}
            <div class="result__data">
                {if $positive|default}
                    <div class="result__data-inner good">
                        <div class="result__data-title">
                            {$const_r_search_positive_result_const|default:"Good results found: "}<span>
                                <a href="/comments/?id={$search.id}&type=positive" target="_blank">{$positive|count}</a>
                            </span>
                        </div>
                        <ul class="result__list">
                            {foreach from=$positive item=i name=foo}
                                {if $smarty.foreach.foo.index < 50}
                                    <li class="result__list-item">
                                        <a href="{$i.page}" target="_blank">{$i.text}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                    </div>
                {/if}
                {if $negative|default}
                    <div class="result__data-inner bad">
                        <div class="result__data-title">
                            {$const_r_search_negative_result_const|default:"Bad results found: "}<span>
                                <a href="/comments/?id={$search.id}&type=negative" target="_blank">{$negative|count}</a>
                            </span>
                        </div>
                        <ul class="result__list">
                            {foreach from=$negative item=i name=foo}
                                {if $smarty.foreach.foo.index < 50}
                                    <li class="result__list-item">
                                        <a href="{$i.page}" target="_blank">{$i.text}</a>
                                    </li>
                                {/if}
                            {/foreach}
                        </ul>
                    </div>
                {/if}
            </div>
        </div>
    </div>
</main>