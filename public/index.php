<?php

require('../class/autoload.php');
use \App\Autoloader;
use \App\controller\BlogController;
use \App\controller\AdminController;


Autoloader::Register();

$blogController = new BlogController();
$adminController = new AdminController();
    
if (isset($_GET['action'])) 
{
     if ($_GET['action'] == 'home'||$_GET['action'] == '') 
    {
        $blogController->home();
    }
    elseif ($_GET['action'] == 'articleList') 
    {
       $blogController->listBillets();
    }
    elseif($_GET['action'] == 'article') 
    {
        $blogController->billet();
    }
    elseif ($_GET['action'] == 'aboutUs'||$_GET['action'] == '') 
    {
        $blogController->aboutUs();
    }
    elseif ($_GET['action'] == 'contact'||$_GET['action'] == '') 
    {
        $blogController->contact();
    }
     elseif ($_GET['action'] == 'contact_confirmation'||$_GET['action'] == '')
     {
         $blogController->contactConfirmation();
     }
     elseif ($_GET['action'] == 'adminBillet'||$_GET['action'] == '')
     {
         $adminController->adminBillet();
     }
     elseif ($_GET['action'] == 'login'||$_GET['action'] == '')
    {
        $blogController->login();
    }
    elseif ($_GET['action'] == 'viewComment'||$_GET['action'] == '') 
    {
        $blogController->viewComment();
    }
     elseif ($_GET['action'] == 'addComment') {
         if (isset($_GET['id']) && $_GET['id'] > 0) {
             if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                 $blogController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
             } else {
                 echo 'Erreur : tous les champs ne sont pas remplis !';
             }
         } else {
             echo 'Erreur : aucun identifiant de billet envoyé';
         }
     }

     elseif ($_GET['action'] == 'addBillet') {
         if (isset($_GET['id'])> 0) {
             if (!empty($_POST['title']) && !empty($_POST['content'])) {
                 $adminController->addBillet($_GET['title'], $_POST['content']);
             } else {
                 echo 'Erreur : tous les champs ne sont pas remplis !';
             }
         } else {
             echo 'Erreur : aucun identifiant de billet envoyé';
         }
     }

     /* --> a reécrire !
     elseif ($_GET['action'] == 'adminHome')
        if (isset($_POST['user']) && $_POST['password']) {
            $blogController->NewConnexion($user, $password);
            $admins = $Newconnexion->connexion($_POST['pseudo'], $_POST['mdp']);
            if ($admins == 1)
            { //si ligne ==1 alors l'utilisateur a rentré un bon identifiant et mot de passe
                $blogController->adminHome();
            }
        }
        else {
            $blogController->login();
        }*/
}

else {
    echo'Pas d\'autres pages disponibles pour le moment';
    }

/*else {
    $blogController->home();    
    }*/


function vd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}
