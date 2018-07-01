<?php

function homepage_action() {
    global $page;
    global $smarty;

    display_page($smarty, $page, 0);

}

function page_not_found_action() {
    global $smarty;
    $smarty->display('notfound.tpl');
}

function contact_action()
{
    global $admin;
    global $page;
    global $smarty;
    display_page($smarty, $page, 0);
}

function register_action()
{
    global $page;
    global $smarty;
    display_page($smarty, $page, 0);
}

 function login_action()
 {
     global $page;
     global $smarty;
     display_page($smarty, $page, 0);
 }

function logout_action() {
    global $page;
    global $smarty;
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
 function display_page($smarty, $page, $admin) {
     global $admin;
     global $smarty;
     $smarty->assign('title', strtoupper($page));
     $smarty->display('header.tpl');
     if (isset($_SESSION['username'])){
         if ($_SESSION['username'] == 'HooHahKong'){
             $smarty->display('admin_menu.tpl');
         } else {
             $smarty->display('menu_logged_in.tpl');
         }
     } else {
         $smarty->display('menu.tpl');
     }
     $smarty->display($page . '.tpl');
     $smarty->display('footer.tpl');
 }


function edit_action() {
    global $artID, $artTit, $artCont, $artIntro;

    global $page;
    global $smarty;

    $smarty->assign('article_id', $artID);
    $smarty->assign('article_title', $artTit);
    $smarty->assign('article_intro', $artIntro);
    $smarty->assign('article_content', $artCont);
    display_page($smarty, $page, 1);
}