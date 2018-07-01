<br>
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
</form>