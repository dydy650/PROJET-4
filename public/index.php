<?php

require('../class/autoload.php');
use \App\Autoloader;
use \App\controller\BlogController;
use \App\model\BilletManager;
use \App\model\CommentManager;

Autoloader::Register();

$controller = new BlogController();
    
if (isset($_GET['action'])) 
{
     if ($_GET['action'] == 'home'||$_GET['action'] == '') 
    {
        $controller->home();
    }
    elseif ($_GET['action'] == 'articleList') 
    {
       $controller->listBillets();
    }
    elseif($_GET['action'] == 'article') 
    {
        $controller->billet();
    }
    elseif ($_GET['action'] == 'aboutUs'||$_GET['action'] == '') 
    {
        $controller->aboutUs();
    }
    elseif ($_GET['action'] == 'contact'||$_GET['action'] == '') 
    {
        $controller->contact();
    }
     elseif ($_GET['action'] == 'login'||$_GET['action'] == '') 
    {
        $controller->login();
    }
    elseif ($_GET['action'] == 'viewComment'||$_GET['action'] == '') 
    {
        $controller->viewComment();
    }
     elseif ($_GET['action'] == 'addComment') {
         if (isset($_GET['id']) && $_GET['id'] > 0) {
             if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                 $controller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
             } else {
                 echo 'Erreur : tous les champs ne sont pas remplis !';
             }
         } else {
             echo 'Erreur : aucun identifiant de billet envoyé';
         }
     }

else {
    echo'Pas d\'autres pages disponibles pour le moment';
    }
}
else {
    $controller->home();    
    }


function vd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}
