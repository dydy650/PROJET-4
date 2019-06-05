<?php
session_start ();

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
    elseif ($_GET['action'] == 'billetList')
    {
       $blogController->listBillets();
    }
    elseif($_GET['action'] == 'billet')
    {
        $blogController->billet();
    }
    elseif ($_GET['action'] == 'aboutUs')
    {
        $blogController->aboutUs();
    }
    elseif ($_GET['action'] == 'contact')
    {
        $blogController->contact();
    }
     elseif ($_GET['action'] == 'contact_confirmation')
     {
         $blogController->contactConfirmation();
     }
     elseif ($_GET['action'] == 'createBillet')
     {
         $adminController->createBillet ();
     }
     elseif ($_GET['action'] == 'loginPage')
    {
        $blogController->loginPage();
    }
    elseif ($_GET['action'] == 'viewComment')
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
     elseif ($_GET['action'] == 'addBillet')
     {
         $adminController->addBillet();
     }
      elseif ($_GET['action'] == 'addUser')
     {
         $adminController->addUser();
     }
     elseif ($_GET['action'] == 'login')
     {
         $blogController->login();
     }
     elseif ($_GET['action'] == 'adminHome')
     {
         $adminController->adminHome();
     }
     elseif ($_GET['action'] == 'logout')
     {
         $blogController->logout();
     }
     elseif ($_GET['action'] == 'deleteBillet' AND isset($_GET['id']))
     {
         $id = $_GET['id'];
         $adminController->deleteBillet($id);
     }
     elseif ($_GET['action'] == 'editBillet' AND isset($_GET['id']))
     {
         $id = $_GET['id'];
         $adminController->editBillet($id);
     }
     elseif ($_GET['action'] == 'updateBillet')
     {
         $adminController->updateBillet();
     }
}

else {
    echo'Pas d\'autres pages disponibles pour le moment';
    }

function vd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}
