<?php
/* Smarty version 3.1.32, created on 2018-07-01 20:06:00
  from 'C:\Users\joelt\Documents\ma\bewijzenmap\periode1.4\proj\MyBand\Week45\mvc\private\views\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3918083f8463_25367300',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1b4d3f63f5922bfbdc7f3367c05cd152a7fac19' => 
    array (
      0 => 'C:\\Users\\joelt\\Documents\\ma\\bewijzenmap\\periode1.4\\proj\\MyBand\\Week45\\mvc\\private\\views\\register.tpl',
      1 => 1530468170,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3918083f8463_25367300 (Smarty_Internal_Template $_smarty_tpl) {
?><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form id="register" action="index.php" method="post">
    <div class="container">
        <h1>Registreren</h1>
        <p class="text">Vul de volgende gegevens in om in te registreren.</p>
        <hr>
        <br>
        <label><b>Username (Min. 4 tekens & Max. 12 tekens)</b></label>
        <input type="text" placeholder="Username" name="username"  title="Min. 4 & Max. 12 tekens" required autofocus>
        <br><br>
        <label><b>Email</b></label>
        <input type="email" placeholder="Email" name="mail" required>
        <br><br>
        <label><b>Wachtwoord (Min. 6 tekens)</b></label>
        <input type="password" placeholder="Wachtwoord" name="password1" title="Zes of meer tekens" required>
        <br><br>
        <label><b>Herhaal Wachtwoord</b></label>
        <input type="password" placeholder="Herhaal wachtwoord" name="password2" required>
        <button type="submit" name="submit_register">Registreren</button>
    </div>
</form><?php }
}
