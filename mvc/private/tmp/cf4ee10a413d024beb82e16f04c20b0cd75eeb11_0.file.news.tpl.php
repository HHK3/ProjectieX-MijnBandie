<?php
/* Smarty version 3.1.32, created on 2018-07-01 19:15:25
  from 'C:\Users\joelt\Documents\ma\bewijzenmap\periode1.4\proj\MyBand\Week45\mvc\private\views\news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b390c2d7bab96_47295454',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf4ee10a413d024beb82e16f04c20b0cd75eeb11' => 
    array (
      0 => 'C:\\Users\\joelt\\Documents\\ma\\bewijzenmap\\periode1.4\\proj\\MyBand\\Week45\\mvc\\private\\views\\news.tpl',
      1 => 1530465323,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b390c2d7bab96_47295454 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br><br><br><br><br><br>
<form method="get" action="index.php">
    <input type="hidden" name="page" value="news">
    <input name="searchterm">
    <input class="search" type="submit" name="submit" value="Search">
</form>

<p>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['article']->value) {
?>
        <h2><?php echo $_smarty_tpl->tpl_vars['article']->value[1];?>
</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['article']->value[3];?>
</p>
        <hr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</p>

<?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
    <a href="index.php?page=news&pageno=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
">PREVIOUS</a>
    <?php } else { ?>
    <a>PREVIOUS</a>
<?php }?>

<a>- <?php echo $_smarty_tpl->tpl_vars['current_page']->value;?>
 -</a>


<?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['number_of_pages']->value) {?>
    <a href="index.php?page=news&pageno=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
">NEXT</a>
    <?php } else { ?>
    <a>NEXT</a>

<?php }?>

<?php }
}
