<br>
<br><br><br><br><br><br>

<p>
    {foreach from=$articles item=article}
    <h2>{$article[1]}</h2>
    <p>{$article[2]}</p>
    <p>{$article[3]}</p>
    <form id="delete" action="index.php" method="post">
        <input type="hidden" name="article_id" value="{$article[0]}"/>
        <button type="submit" class="btn-link" name="submit_delete">DELETE</button>
    </form>
    <form id="edit" action="index.php" method="get">
        <a href="index.php?page=edit&article_id={$article[0]}&article_title={$article[1]}&article_intro={$article[2]}&article_content={$article[3]}" name="edit">EDIT</a>
    </form>
    <hr>
    {/foreach}
</p>

{if $current_page gt 1}
    <a href="index.php?page=admin&pageno={$current_page - 1}">PREVIOUS</a>
{else}
    <a>PREVIOUS</a>
{/if}

<a>- {$current_page} -</a>


{if $current_page lt $number_of_pages}
    <a href="index.php?page=admin&pageno={$current_page + 1}">NEXT</a>
{else}
    <a>NEXT</a>

{/if}



<h1>ADMIN</h1>
