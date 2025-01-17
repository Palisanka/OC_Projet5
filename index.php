<?php

session_start();

require("controllers/frontend.php");
require("controllers/backend.php");

function autoLoad($class)
{
    $class = str_replace('\\', '/', $class);
    $class = str_replace(__NAMESPACE__, strtolower(__NAMESPACE__), $class);

    require $class . '.php'; 
}
spl_autoload_register('autoLoad');

if (isset($_GET['action'])) {
// FRONTEND
    if ($_GET['action'] == 'home') {
        home();
    }
    if ($_GET['action'] == 'services') {
        services();
    }
    if ($_GET['action'] == 'about') {
        about();
    }
    if ($_GET['action'] == 'portfolio') {
        portfolio();
    }
    if ($_GET['action'] == 'contact') {
        contact();
    }
    if ($_GET['action'] == 'login') {
        login();
    }
    if ($_GET['action'] == 'mentions_legales') {
        mentions_legales();
    }
// FRONTEND BLOG
    if ($_GET['action'] == 'blog') {
        blog();
    }
    if ($_GET['action'] == 'articles') {
        blogArticles();
    }
    if ($_GET['action'] == 'portraits') {
        blogPortraits();
    }
// BACKEND
    if ($_GET['action'] == 'sign_in') {
        signIn();
    }
    if ($_GET['action'] == 'admin') {
        admin();
    }
    if ($_GET['action'] == 'admin_article') {
        admin_article();
    }
    if ($_GET['action'] == 'update_article') {
        update_article();
    }
    if ($_GET['action'] == 'admin_portrait') {
        admin_portrait();
    }
    if ($_GET['action'] == 'update_portrait') {
        update_portrait();
    }
    if ($_GET['action'] == 'admin_projet') {
        admin_project();
    }
    if ($_GET['action'] == 'admin_comments') {
        admin_comments();
    }
    if ($_GET['action'] == 'admin_profil') {
        admin_profil();
    }
} else {
    home();
}
