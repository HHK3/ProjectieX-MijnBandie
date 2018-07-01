<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<div class="edit">
    <form class="modal-content animate" id="edit" action="index.php" method="post">
        <input type="hidden" name="article_id" value="{$article_id}"/>
        <label><b>Titel</b></label><br>
        <input type="text" name="article_title" value="{$article_title}" size="30">
        <br><br>
        <label><b>Intro</b></label><br>
        <input type="text" name="article_intro" value="{$article_intro}" size="30">
        <br><br>
        <label>Content</label><br>
        <textarea name="article_content" cols="30" >{$article_content}</textarea>
         <br>
            <input type="submit" name="submit_edit" value="GO">
    </form>
</div>