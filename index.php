<?php
namespace Oc\Projet_5;

session_start();

require("controllers/frontend.php");
require("controllers/backend.php");
// require("models/Manager.php");
// require("models/Articles.php");
// require("models/ArticlesManager.php");
// require("models/CommentsArticles.php");
// require("models/CommentsArticlesManager.php");
// require("models/CommentsPortraits.php");
// require("models/CommentsPortraitsManager.php");
// require("models/Portraits.php");
// require("models/PortraitsManager.php");
// require("models/Projects.php");
// require("models/ProjectsManager.php");
// require("models/User.php");
// require("models/UserManager.php");

function autoLoad($class)
{
    $class = str_replace('\\', '/', $class);
    $class = str_replace(__NAMESPACE__, strtolower(__NAMESPACE__), $class);

    require $class . '.php'; 
}
spl_autoload_register('Oc\Projet_5\autoLoad');

// function autoLoad($class)
// {
//     require 'models/' . $class . '.php';
// }
// spl_autoload_register('autoLoad');

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
