
<section class="sec9">
    <br>
    <h2>Edit ID: {$article_id}</h2>
<div class="edit">
    <form id="edit" enctype="multipart/form-data" method="post" action="index.php">
        <input type="hidden" name="article_id" value="{$article_id}"/>
        <label><b>Titel</b></label><br>
        <input type="text" name="article_title" value="{$article_title}" size="30">
        <br><br>
        <label><b>Intro</b></label><br>
        <input type="text" name="article_intro" value="{$article_intro}" size="30">
        <br><br>
        <label>Content</label><br>
        <textarea name="article_content" cols="30" >{$article_content}</textarea>
        <br><br>
        <input type="hidden" name="article_hidden_image" value="{$article_image}"/>
        <input type="file" name="article_image" accept="image/*" /><br><br>
        <br>
            <input type="submit" name="submit_edit" value="GO">
    </form>
</div>
</section>