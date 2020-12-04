<main class="main">
    <div class="container">
        <div class="main__inner">
            <form class="main__form">
                <input type="hidden" name="action" value="search">
                <p class="main__form-title">{$const_i_title|default:'Search Form'}</p>
                <select name="search_site" id="" class="main__form-select required">
                    <option value="" class="main__form-select-option">
                        <p class="123">-</p>
                    </option>
                    {foreach from=$sites item=i key=k}
                        <option value="{$k}" class="main__form-select-option">
                            <p class="123">{$i}</p>
                        </option>
                    {/foreach}
                </select>
                <div class="main__form-checkbox">
                    <input type="checkbox" id="checkbox" class="main__form-checkbox-type" name="fast_search">
                    <label for="checkbox"
                           class="main__form-checkbox-name">{$const_i_quick_search|default:"Quick Search"}</label>
                </div>
                <textarea type="text" class="main__form-input required" name="search_text"></textarea>
                <input type="submit" class="main__form-submit" value="{$const_i_button_search|default:"Search"}">
            </form>

            {if $last_search|default:false}
                <div class="main__last">
                    <p class="last_search_title">
                        {$const_i_last_search|default:"Last search"}
                    </p>
                    <ul class="main__last-list">
                        {foreach from=$last_search item=i}
                            <li class="main__last-item">
                                <a href="/result?id={$i.id}" class="main__last-link">
                                    {$const_i_search_text|default:"Search text: %SEARCH% on site: %SITE% in time: %TIME%"|replace:["%SEARCH%", "%SITE%", "%TIME%"]:[{$i.search_text},{$i.search_site},{$i.created}]}
                                </a>
                            </li>
                        {/foreach}
                    </ul>
                </div>
            {/if}
        </div>
    </div>
</main>