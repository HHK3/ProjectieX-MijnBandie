<br>
<br><br><br><br><br><br>
<form method="get" action="index.php">
    <input type="hidden" name="page" value="news">
    <input name="searchterm">
    <input class="search" type="submit" name="submit" value="Search">
</form>

<p>
    {foreach from=$articles item=article}
        <h2>{$article[1]}</h2>
        <p>{$article[3]}</p>
        <hr>
    {/foreach}
</p>

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

