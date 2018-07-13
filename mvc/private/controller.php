<?php

function homepage_action() {
    global $page;
    global $smarty;

    //MODEL
    $articles = get_some_articles();
    $smarty->assign('articles', $articles);
    //VIEWS
    display_page($smarty, $page, 0);

}

function page_not_found_action() {
    global $smarty;

    //VIEWS
    $smarty->display('notfound.tpl');
}

function contact_action()
{
    global $admin;
    global $page;
    global $smarty;

    //VIEWS
    display_page($smarty, $page, 0);
}

function add_action()
{
    global $page;
    global $smarty;


    //VIEWS
    display_page($smarty, $page, 1);
}

function register_action()
{
    global $page;
    global $smarty;


    //VIEWS
    display_page($smarty, $page, 0);
}


function article_action($artID)
{
    global $page;
    global $smarty;

    //MODEL
    $article = get_article($artID);
    $smarty->assign('article', $article);
    //VIEWS
    display_page($smarty, $page, 0);
}

 function login_action()
 {
     global $page;
     global $smarty;

     //VIEWS
     display_page($smarty, $page, 0);
 }

function logout_action() {
    global $page;
    global $smarty;

    //VIEWS

    display_page($smarty, $page, 1);
}
 function admin_action() {
     global $smarty;
     global $pageno;
     global $page;
     global $searchterm;
     //MODEL
     $articles = get_some_articles();
     $number_of_pages = get_number_of_pages();

     $smarty->assign('current_page', $pageno);
     $smarty->assign('number_of_pages', $number_of_pages);
     $smarty->assign('articles', $articles);
     //VIEWS
     display_page($smarty, $page, 1);
 }

function admin_success_action()
{
    global $smarty;
    global $pageno;
    global $page;
    global $searchterm;
    //MODEL
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page', $pageno);
    $smarty->assign('number_of_pages', $number_of_pages);
    $smarty->assign('articles', $articles);
    //VIEWS
    display_page($smarty, $page, 1);
}

function news_action()
{
    global $smarty;
    global $pageno;
    global $page;
    global $searchterm;
    //MODEL
    $articles = get_some_articles();
    $number_of_pages = get_number_of_pages();
    $smarty->assign('current_page', $pageno);
    $smarty->assign('number_of_pages', $number_of_pages);
    $smarty->assign('articles', $articles);
    //VIEWS
    display_page($smarty, $page, 0);
}

function edit_action() {
    global $artID, $artTit, $artCont, $artIntro, $artImage;

    global $page;
    global $smarty;

    $smarty->assign('article_id', $artID);
    $smarty->assign('article_title', $artTit);
    $smarty->assign('article_intro', $artIntro);
    $smarty->assign('article_content', $artCont);
    $smarty->assign('article_image', $artImage);

    display_page($smarty, $page, 1);
}

 function display_page($smarty, $page, $admin) {
     global $admin;
     global $smarty;
     $smarty->assign('title', strtoupper($page));
     $smarty->display('header.tpl');
     if (isset($_SESSION['username']) && $_SESSION['username']== 'HooHahKong'){
             $smarty->display('admin_menu.tpl');
         } else {
         $smarty->display('menu.tpl');
     }
     if (!isset($_SESSION['username'])) {
         $smarty->display( 'sidebar.tpl');
     }
     $smarty->display($page . '.tpl');
     $smarty->display('footer.tpl');
 }


