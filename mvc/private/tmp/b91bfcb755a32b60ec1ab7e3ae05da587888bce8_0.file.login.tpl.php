<?php
/* Smarty version 3.1.32, created on 2018-07-01 20:11:28
  from 'C:\Users\joelt\Documents\ma\bewijzenmap\periode1.4\proj\MyBand\Week45\mvc\private\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b39195095f4f1_83695376',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b91bfcb755a32b60ec1ab7e3ae05da587888bce8' => 
    array (
      0 => 'C:\\Users\\joelt\\Documents\\ma\\bewijzenmap\\periode1.4\\proj\\MyBand\\Week45\\mvc\\private\\views\\login.tpl',
      1 => 1530467723,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b39195095f4f1_83695376 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form class="modal-content animate" id="login" action="index.php" method="post">
    <div class="container">
        <h1>Inloggen</h1>
        <p class="text">Vul de volgende gegevens in om in te loggen.</p>
        <hr>
        <br>
        <label><b>Username</b></label>
        <input type="text" placeholder="Username" name="username_log" required>
        <br><br>
        <label><b>Wachtwoord</b></label>
        <input type="password" placeholder="Wachtwoord" name="password_log" required>
        <button type="submit" name="submit_login">Login</button>
    </div>
</form><?php }
}
