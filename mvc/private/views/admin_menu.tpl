<div class="responsive-bar">
    <div class="logo">
        <img src="img/logo.png">
    </div>
    <div class="menu">
        <h4>Menu</h4>
    </div>
</div>
<nav>
    <a href="#">
        <div class="logo">
            <img src="img/logo.png">
        </div>
    </a>
    <ul>
        <li><a href="index.php?page=home">Home</a></li>
        <li><a href="index.php?page=news">News</a></li>
        <li><a href="index.php?page=contact">Contact</a></li>
        <li><a href="index.php?page=admin">Admin</a></li>
        <li>
            <form id="logout" action="index.php" method="post">
                <button type="submit" class="btn-link" name="submit_logout"><a>Logout</a></button>
            </form>
        </li>

        {*<form method="get" action="index.php">*}
        {*<input type="hidden" name="page" value="news">*}
        {*<input name="searchterm">*}
        {*<input type="submit" name="submit" value="ZOEK">*}
        {*</form>*}

    </ul>
</nav>




{*<h2>{$title}</h2>*}
