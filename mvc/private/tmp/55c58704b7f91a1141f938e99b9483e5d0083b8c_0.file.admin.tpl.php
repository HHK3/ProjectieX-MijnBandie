<?php
/* Smarty version 3.1.32, created on 2018-07-01 19:19:52
  from 'C:\Users\joelt\Documents\ma\bewijzenmap\periode1.4\proj\MyBand\Week45\mvc\private\views\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b390d38e57ad4_59591133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55c58704b7f91a1141f938e99b9483e5d0083b8c' => 
    array (
      0 => 'C:\\Users\\joelt\\Documents\\ma\\bewijzenmap\\periode1.4\\proj\\MyBand\\Week45\\mvc\\private\\views\\admin.tpl',
      1 => 1530465591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b390d38e57ad4_59591133 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br><br><br><br><br><br>

<p>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
    <h2><?php echo $_smarty_tpl->tpl_vars['article']->value[1];?>
</h2>
    <p><?php echo $_smarty_tpl->tpl_vars['article']->value[2];?>
</p>
    <p><?php echo $_smarty_tpl->tpl_vars['article']->value[3];?>
</p>
    <form id="delete" action="index.php" method="post">
        <input type="hidden" name="article_id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value[0];?>
"/>
        <button type="submit" class="btn-link" name="submit_delete">DELETE</button>
    </form>
    <form id="edit" action="index.php" method="get">
        <a href="index.php?page=edit&article_id=<?php echo $_smarty_tpl->tpl_vars['article']->value[0];?>
&article_title=<?php echo $_smarty_tpl->tpl_vars['article']->value[1];?>
&article_intro=<?php echo $_smarty_tpl->tpl_vars['article']->value[2];?>
&article_content=<?php echo $_smarty_tpl->tpl_vars['article']->value[3];?>
" name="edit">EDIT</a>
    </form>
    <hr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</p>

<?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
    <a href="index.php?page=admin&pageno=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
">PREVIOUS</a>
<?php } else { ?>
    <a>PREVIOUS</a>
<?php }?>

<a>- <?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 -</a>


<?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['number_of_pages']->value) {?>
    <a href="index.php?page=admin&pageno=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
">NEXT</a>
<?php } else { ?>
    <a>NEXT</a>

<?php }?>



<h1>ADMIN</h1>
<?php }
}
