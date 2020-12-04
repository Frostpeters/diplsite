<main class="third">
    <div class="container">
        <div class="third__inner">
            <div class="third__data-inner {$type}">
                <div class="result__data-title">
                    {if $type == 'positive'}
                        {$const_r_search_positive_result_const|default}
                    {elseif $type == 'negative'}
                        {$const_r_search_negative_result_const|default}
                    {else}
                        {$const_r_search_neutral_const|default}
                    {/if}<span>{$comments|count}</span>
                </div>
                <ul class="third__list">
                    {foreach from=$comments item=i name=foo}
                        <li class="result__list-item">
                            <a href="{$i.page}" target="_blank">{$i.text}</a>
                        </li>
                    {/foreach}
                </ul>
            </div>
        </div>
    </div>
</main>