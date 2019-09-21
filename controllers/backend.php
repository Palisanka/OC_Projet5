<?php 
function admin()
{   
    ob_start();
    include('views/backend/adminView.php');
    $content = ob_get_clean();
    require("views/backend/template.php");
}

function admin_article()
{   
    // $sessionConnect = sessionConnect();

    // get an article and modifie it
    $articleManager = new ArticlesManager(); // on créé un nouvel objet et on lui passe la fonction get: objet qui contient des méthodes
    $articles = $articleManager->getList(); // $chapter devient alors un objet

    // get all informations about new chapters 
    if (isset($_POST['title']) && isset($_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])) // condition pour s'assurer que $_POST n'est pas vide
    {   // d'abord on créé un objet article et on renvoie des données
        $articles = new Articles([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
        $articleManager->addArticle($articles); // on appelle la fonction addArticle avec pour argument l'objet $articles

        header('Location: index.php?action=admin_article');
        exit();
    }
    ob_start();
    include('views/backend/articleView.php');
    $content = ob_get_clean();
    require("views/backend/template.php");
}

function admin_portrait()
{   
    ob_start();
    include('views/backend/portraitView.php');
    $content = ob_get_clean();
    require("views/backend/template.php");
}

function admin_projet()
{   
    ob_start();
    include('views/backend/projetView.php');
    $content = ob_get_clean();
    require("views/backend/template.php");
}

function admin_comments()
{   
    ob_start();
    include('views/backend/commentsView.php');
    $content = ob_get_clean();
    require("views/backend/template.php");
}

function admin_messages()
{   
    ob_start();
    include('views/backend/messagesView.php');
    $content = ob_get_clean();
    require("views/backend/template.php");
}

function admin_profil()
{   
    ob_start();
    include('views/backend/profilView.php');
    $content = ob_get_clean();
    require("views/backend/template.php");
}
