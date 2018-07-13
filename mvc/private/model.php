<?php

function make_connection() {
    $mysqli = new mysqli('localhost', 'root', '', 'myband_db');
    if ($mysqli->connect_errno) {
        die ('Connection error: ' . $mysqli->connect_errno . '<br>');
    }
    return $mysqli;
}
function get_article($artID) {
    $mysqli = make_connection();
    $query = "SELECT title, slug, body, imagelink FROM articles WHERE articleID = $artID";
    $stmt = $mysqli->prepare($query) or die ('Error prep1');
    $stmt->bind_result($title, $intro, $content, $imagelink) or die ('Error bind1');
    $stmt->execute() or die ('Error exc1');
    while ($stmt->fetch()) {
        $article = array();
        $article['title'] = $title;
        $article['intro'] = $intro;
        $article['content'] = $content;
        $article['image'] = $imagelink;
    }
    return $article;

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

function verify_login() {

// Hoort de bezoeker hier uberhaupt wel te zijn?
    if (!isset($_POST['submit_login'])) {
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
    $artImgHidden = $_POST['article_hidden_image'];

    if ($_FILES['article_image']['size'] == 0) {
        $mysqli = make_connection();
        $query = "UPDATE articles ";
        $query .= "SET title = '$artTit', slug = '$artIntro', body = '$artCont' ";
        $query .= "WHERE articleID = '$artID'";
        $result = mysqli_query($mysqli, $query) or die ('Error updating');
        header("Location: index.php?page=admin&success_editing=yes");
    } else {
        $mysqli = make_connection();
        $query = "SELECT articleID FROM articles WHERE imagelink = '$artImgHidden'";
        $result = mysqli_query($mysqli, $query) or die ('Error deleting12343');
        if ($result->num_rows == 0) {
            $temp_location = $_FILES['article_image']['tmp_name'];
            $target_location = 'images/' . time() . $_FILES['article_image']['name'];

            move_uploaded_file($temp_location, $target_location);

            $mysqli = make_connection();
            $query = "UPDATE articles ";
            $query .= "SET title = '$artTit', slug = '$artIntro', body = '$artCont', imagelink = '$target_location'";
            $query .= "WHERE articleID = '$artID'";
            $result = mysqli_query($mysqli, $query) or die ('Error updating');
            header("Location: index.php?page=admin&success_editing=yes");
        } else {
            $file = $artImgHidden;

            unlink($file);

            $temp_location = $_FILES['article_image']['tmp_name'];
            $target_location = 'images/' . time() . $_FILES['article_image']['name'];

            move_uploaded_file($temp_location, $target_location);

            $query = "UPDATE articles ";
            $query .= "SET title = '$artTit', slug = '$artIntro', body = '$artCont', imagelink = '$target_location'";
            $query .= "WHERE articleID = '$artID'";
            $result = mysqli_query($mysqli, $query) or die ('Error updating');
            header("Location: index.php?page=admin&success_editing=yes");
        }
    }
}

function verify_add()
{
    if (isset($_POST['submit_add'])) {
        $temp_location = $_FILES['article_image']['tmp_name'];
        $target_location = 'images/' . time() . $_FILES['article_image']['name'];

        move_uploaded_file($temp_location, $target_location);


        $title = $_POST['article_title'];
        $intro = $_POST['article_intro'];
        $content = $_POST['article_content'];


        $mysqli = make_connection();
        move_uploaded_file($temp_location, $target_location);
        $query = "INSERT INTO articles VALUES (0, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($query) or die ('Error preparing');
        $stmt->bind_param('ssss', $title, $intro, $content, $target_location) or die ('Error binding params');
        $stmt->execute() or die ('Error inserting image in database');
        $stmt->close();

        header('Location: index.php?page=add&success_adding=yes');
        exit();
    }
}

function verify_mail()
{
    $from     = 'From: ' . $_POST["from"];
    $to       = "25061@ma-web.nl";
    $content  = $_POST["content"];
    $subject  = $_POST["subject"];
    mail($to , $subject, $content, $from);
    header('Location: index.php?page=contact&send_mail=success');
}




