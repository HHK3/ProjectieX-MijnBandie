
<section class="sec5">
    <br>
<div class="main">
    <h1>NEWS</h1>
    <form method="get" action="index.php">
        <input type="hidden" name="page" value="news">
        <input name="searchterm">
        <input class="search" type="submit" name="submit" value="Search">
    </form>
    <br>
    <div class="news">

            {counter assign=index print=0}
            {foreach from=$articles item=article}
                {counter}
                 {if $index <= 2}
                     <div class="newsArticle">
                         <img src="{$article[4]}" class="imageNews" alt="{$article[1]}">
                         <h2>{$article[1]}</h2>
                         <h5>{$article[2]}</h5>
                         <br>
                         <a href="index.php?page=news_article&article_id={$article[0]}">Lees meer</a>
                         <br>
                     </div>
                     <br>
                {/if}
                {if $index >= 3 && $index <= 6}
                    <div class="newsArticle 1">
                        <img src="{$article[4]}" class="imageNews" alt="{$article[1]}">
                        <h2>{$article[1]}</h2>
                        <h5>{$article[2]}</h5>
                        <br>
                        <a href="index.php?page=news_article&article_id={$article[0]}">Lees meer</a>
                        <br>
                    </div>
                    <br>
                {/if}
            {/foreach}
    </div>
</div>

<div id="slid">
    {if $current_page gt 1}
        <a href="index.php?page=news&pageno={$current_page - 1}">PREVIOUS</a>
        {else}
        <a>PREVIOUS</a>
    {/if}

    <a>- {$current_page} -</a>


    {if $current_page lt $number_of_pages}
        <a href="index.php?page=news&pageno={$current_page + 1}">NEXT</a>
        {else}
        <a>NEXT</a>

    {/if}
</div>
</section>