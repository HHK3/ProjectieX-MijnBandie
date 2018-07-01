<?php
/* Smarty version 3.1.32, created on 2018-06-21 10:24:11
  from 'C:\Users\joelt\Documents\ma\bewijzenmap\periode1.4\bap\mvc\private\views\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2b60ab714cc1_44850299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e90f7ed180f637b8e41469413b7550686c61a93' => 
    array (
      0 => 'C:\\Users\\joelt\\Documents\\ma\\bewijzenmap\\periode1.4\\bap\\mvc\\private\\views\\menu.tpl',
      1 => 1529568977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2b60ab714cc1_44850299 (Smarty_Internal_Template $_smarty_tpl) {
?><h2><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h2>
<hr>
<a href="index.php?page=home">HOME</a>
<a href="index.php?page=news">NEWS</a>
<a href="index.php?page=contact">CONTACT</a>
<hr>
<form method="get" action="index.php">
    <input type="hidden" name="page" value="news">
    <input name="searchterm">
    <input type="submit" name="submit" value="ZOEK">
</form><?php }
}
