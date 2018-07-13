<?php
session_start();
require('../private/smarty/Smarty.class.php');
require('../private/model.php');
require('../private/controller.php');


$smarty = new Smarty();
$smarty->setCompileDir('../private/tmp')
        ->setTemplateDir('../private/views');

define('ARTICLES_PER_PAGE', 5);

// TERNARY OPERATOR
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$pageno = isset($_GET['pageno']) ? $_GET['pageno'] : '1';
$searchterm = isset($_GET['searchterm']) ? '%' . $_GET['searchterm'] . '%' : '%';
$artID = isset($_GET['article_id']) ? $_GET['article_id'] : null;
$artLabel = isset($_GET['article_label']) ? $_GET['article_label'] : null;
$artTit = isset($_GET['article_title']) ? $_GET['article_title'] : null;
$artIntro = isset($_GET['article_intro']) ? $_GET['article_intro'] : null;
$artCont = isset($_GET['article_content']) ? $_GET['article_content'] : null;
$artImage = isset($_GET['article_image']) ? $_GET['article_image'] : null;
$mailadres = isset($_GET['mailadres']) ? $_GET['mailadres'] : null;
$hash = isset($_GET['hash']) ? $_GET['hash'] : null;
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



//if (isset($_GET['submit_searchterm'])) {
//    if {
//
//    } else {
//
//    }
//} else {
//    if (!isset($_SESSION['searchterm'])) {
//        $_SESSION['searchterm'] = '%';
//    }
//}


if (isset($_POST['submit_login'])) {
    verify_login();
}

if (isset($_POST['submit_logout'])) {
    verify_logout();
}

if (isset($_POST['submit_add'])) {
    verify_add();
}

if (isset($_POST['submit_edit'])) {
    verify_edit();
}

if (isset($_POST['submit_delete'])) {
    verify_delete();
}

if (isset($_POST['submit_contact'])) {
    verify_mail();
}

if (isset($_SESSION['username']) && $_SESSION['username']== 'HooHahKong'){
        switch ($page) {
            case 'home' : homepage_action(); break;
            case 'news' : news_action(); break;
            case 'contact' : contact_action(); break;
            case 'logout' : logout_action(); break;
            case 'news_article' : article_action($artID); break;
            case 'add' : add_action(); break;
            case 'admin' : admin_action(); break;
            case 'edit' : edit_action(); break;
            default: page_not_found_action(); break;
        }
} else {
    switch ($page) {
        case 'home' :
            homepage_action();
            break;
        case 'news' :
            news_action();
            break;
        case 'contact' :
            contact_action();
            break;
        case 'login' :
            login_action();
            break;
        case 'news_article' :
            article_action($artID);
            break;
        default:
            page_not_found_action();
            break;
    }

}