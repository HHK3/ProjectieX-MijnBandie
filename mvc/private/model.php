<?php

function make_connection() {
    $mysqli = new mysqli('localhost', 'root', '', 'myband_db');
    if ($mysqli->connect_errno) {
        die ('Connection error: ' . $mysqli->connect_errno . '<br>');
    }
    return $mysqli;
}


function get_articles() {
    $mysqli = make_connection();
    $query = "SELECT title FROM articles";
    $stmt = $mysqli->prepare($query) or die ('Error prep1');
    $stmt->bind_result($title) or die ('Error bind1');
    $stmt->execute() or die ('Error exc1');
    $results = array();
    while ($result = $stmt->fetch()) {
        $results[] = $title;
    }
    return $results;

}

function get_some_articles() {
    global $pageno, $searchterm;
    $mysqli =  make_connection();
    $firstrow = ($pageno - 1) * ARTICLES_PER_PAGE;
    $per_page = ARTICLES_PER_PAGE;

    $query =    "SELECT articleID, title, slug, body, imagelink ";
    $query .=   "FROM articles ";
    $query .=   "WHERE title LIKE ? OR ";
    $query .=   "body LIKE ? ";
    $query .=   "ORDER BY articleID ";
    $query .=   "DESC LIMIT $firstrow, $per_page";

    $stmt = $mysqli->prepare($query) or die ('Error prep3');
    $stmt->bind_param('ss', $searchterm, $searchterm) or die ('Error binding searchterm');
    $stmt->bind_result($id, $title, $intro, $content, $imagelink) or die ('Error bind1');
    $stmt->execute() or die ('Error exc1');
    $results = array();
    while ($stmt->fetch()) {
        $article = array();
        $article[] = $id;
        $article[] = $title;
        $article[] = $intro;
        $article[] = $content;
        $article[] = $imagelink;
        $results[] = $article;
    }
    return $results;
}

function calculate_pages() {
    $mysqli = make_connection();
    $query = "SELECT * FROM articles ";

    $result = $mysqli->query($query) or die ('Error query2');
    $rows = $result->num_rows;
    $number_of_pages = ceil($rows / ARTICLES_PER_PAGE);
    return $number_of_pages;
}

function get_number_of_pages() {
    $number_of_pages = calculate_pages() or die ('Error calculating');
    return $number_of_pages;
}

function verify_register() {
    // Hoort de bezoeker hier uberhaupt wel te zijn?
    if (!isset($_POST['submit_register'])) {
        header('Location: index.php');
    }

//Zijn beide wachtwoorden gelijk?
    if ($_POST['password1'] != $_POST['password2']) {
        header('Location: index.php?page=register&register_error=password_error');
        exit();
    }

//Bestaat deze username al?
    $mysqli = make_connection();
    $query = "SELECT userid FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($query)  or die ("Error prep1");
    $stmt->bind_param('s', $username);
    $username = $_POST['username'];
    $result = $stmt->execute() or die ("Error querying1");
    $row = $stmt->fetch(); //or die ('fetch1');
    if ($row) {
        header('Location: index.php?page=register&register_error=username_error');
        exit();
    }

//Bestaat dit mailadres al?
    $query = "SELECT userid FROM users WHERE mailaddress = ?";
    $stmt = $mysqli->prepare($query) or die ("Error prep2");
    $stmt->bind_param('s', $mailadres)  or die ("Error bind2");
    $mailadres = $_POST['mail'];
    $result = $stmt->execute() or die ('Error querying2');
    $row = $stmt->fetch(); // or die ('fetch2');
    if ($row) {
        header('Location: index.php?page=register&register_error=email_error');
        exit();
    }

//Gebruiker toevoegen aan database
    $query = "INSERT INTO users VALUES (0, ?, ?, ?, ?, 0)";
    $stmt = $mysqli->prepare($query)  or die ("Error prep3");
    $username = $_POST['username'];
    $mailadres = $_POST['mail'];
    $randomnumber = rand(0,1000000);
    $hash = hash('sha512', $randomnumber);
    $password = hash('sha512', $_POST['password1']);
    $stmt->bind_param('ssss', $username, $mailadres, $hash, $password)  or die ("Error bind3");
    $result = $stmt->execute() or die ('Error inserting user.');


//Gebruiker mailen
    $to = $_POST['mail'];
    $subject = 'Verifieer je account bij THE WALL';
    $message = 'Klik op de volgende link om je account te activeren:';
    $message = 'http://25061.hosts.ma-cloud.nl/myBand/public/index.php&mailadres=' . $mailadres . '&hash=' . $hash;
    $headers = 'From: 25061@ma-web.nl';
    mail($to, $subject, $message, $headers) or die ('Error mailing.');

//Gelukt
    header('Location: index.php?page=home&register=succesfull');
    exit();
}

function verify_account() {
    // Checken of mail klopt met hash
    $mysqli = make_connection();
    $query = "SELECT userid FROM users WHERE mailaddress = ? AND hash = ?";
    $stmt = $mysqli->prepare($query) or die ('Error preparing for SELECT.');
    $stmt->bind_param('ss', $mailadres, $hash);
    $mailadres = $_GET['mailadres'];
    $hash = $_GET['hash'];
    $stmt->execute();
    $stmt->bind_result($userid);
    $row = $stmt->fetch();

    if (!$userid) {
        echo 'Sorry, maar deze combo van mailadres en hash ken ik niet';
        exit();
    }
    $stmt->close();

//Account activeren
    $query = "UPDATE users SET active = 1 WHERE userid = ?";
    $stmt = $mysqli->prepare($query) or die ('Error preparing for UPDATE');
    $stmt->bind_param('i', $userid);
    $stmt->execute() or die ('Error updating');

//Gelukt
    header('Location: index.php?page=home&verified=succesfull');
    exit();
}

function verify_login() {

// Hoort de bezoeker hier uberhaupt wel te zijn?
    if (!isset($_POST['submit_log'])) {
        header('Location: index.php');
    }

// Checken of de gebruiker bestaat (en of zijn wachtwoord klopt)
    $mysqli = make_connection();
    $query = "SELECT userid, hash, active FROM users WHERE username = ? AND password = ?";
    $stmt = $mysqli->prepare($query) or die ('Error preparing');
    $stmt->bind_param('ss', $username, $password) or die ('Error binding params');
    $stmt->bind_result($userid, $hash, $active) or die ('Error binding results');
    $username = $_POST['username_log'];
    $password = $_POST['password_log'];
    $password = hash('sha512', $password) or die ('Error hashing.');
    $stmt->execute() or die ('Error executing');
    $fetch_succes = $stmt->fetch();

    if (!$fetch_succes) {
        header('Location: index.php?page=login&login_success=error');
        exit();

    } else if ($active == 0) {
        header('Location: index.php?page=login&login_success=unverified');
        exit();
    }

    setcookie('userid', $userid, time() + 3600 * 24 * 7);
    $_SESSION['userid'] = $userid;

    setcookie('hash', $hash, time() + 3600 * 24 * 7);
    $_SESSION['hash'] = $hash;

    setcookie('username', $username, time() + 3600 * 24 * 7);
    $_SESSION['username'] = $username;

    header('Location: index.php?page=home&login=success');
}

function verify_logout() {
    session_start();

    if (!isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
    }

    $_SESSION = array();
    session_destroy();

    if (isset($_COOKIE['userid'])) {
        setcookie('userid', '', time() - 3600);
        setcookie('hash', '', time() - 3600);
        setcookie('username', '', time() - 3600);
}


header('Location: index.php');


}

function verify_delete() {
    $artID = $_POST['article_id'];
    $mysqli = make_connection();
    $query = "DELETE FROM articles WHERE articleID = '$artID' ";
    $result = mysqli_query($mysqli, $query) or die ('Error deleting');
    header("Location: index.php?page=admin&success_delete=yes");

//
//
//    $id = $_GET['id'];
//    echo $id;
//    $query = "DELETE FROM articles WHERE articleID = '$artID'";
//    $result = mysqli_query($mysqli, $query) or die ('Error deleting');
}

function verify_edit() {
    $artID = $_POST['article_id'];
    $artTit = $_POST['article_title'];
    $artIntro = $_POST['article_intro'];
    $artCont = $_POST['article_content'];

    $mysqli = make_connection();
    $query = "UPDATE articles ";
    $query .= "SET title = '$artTit', slug = '$artIntro', body = '$artCont'";
    $query .= "WHERE articleID = '$artID'";
    $result = mysqli_query($mysqli, $query) or die ('Error updating');
    header("Location: index.php?page=admin&success_editing=yes");
}

