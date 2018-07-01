<?php
/* Smarty version 3.1.32, created on 2018-07-01 19:22:44
  from 'C:\Users\joelt\Documents\ma\bewijzenmap\periode1.4\proj\MyBand\Week45\mvc\private\views\edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b390de420f711_12547722',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8aab42342fc708310ed51869da198a3b318aaffd' => 
    array (
      0 => 'C:\\Users\\joelt\\Documents\\ma\\bewijzenmap\\periode1.4\\proj\\MyBand\\Week45\\mvc\\private\\views\\edit.tpl',
      1 => 1530465762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b390de420f711_12547722 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<div class="edit">
    <form class="modal-content animate" id="edit" action="index.php" method="post">
        <input type="hidden" name="article_id" value="<?php echo $_smarty_tpl->tpl_vars['article_id']->value;?>
"/>
        <label><b>Titel</b></label><br>
        <input type="text" name="article_title" value="<?php echo $_smarty_tpl->tpl_vars['article_title']->value;?>
" size="30">
        <br><br>
        <label><b>Intro</b></label><br>
        <input type="text" name="article_intro" value="<?php echo $_smarty_tpl->tpl_vars['article_intro']->value;?>
" size="30">
        <br><br>
        <label>Content</label><br>
        <textarea name="article_content" cols="30" ><?php echo $_smarty_tpl->tpl_vars['article_content']->value;?>
</textarea>
         <br>
            <input type="submit" name="submit_edit" value="GO">
    </form>
</div><?php }
}
