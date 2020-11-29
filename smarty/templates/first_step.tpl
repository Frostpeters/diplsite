<main class="main">
    <div class="container">
        <div class="main__inner">
            <form class="main__form">
                <input type="hidden" name="action" value="search">
                <p class="main__form-title">{$title|default:'Search Form'}</p>
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
                    <label for="checkbox" class="main__form-checkbox-name">{$quick_search|default:"Quick Search"}</label>
                </div>
                <textarea type="text" class="main__form-input required" name="search_text"></textarea>
                <input type="submit" class="main__form-submit" value="{$button_search|default:"Search"}">
            </form>
        </div>
    </div>
</main>