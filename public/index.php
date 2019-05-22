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
     elseif ($_GET['action'] == 'createBillet'||$_GET['action'] == '')
     {
         $adminController->createBillet ();
     }
     elseif ($_GET['action'] == 'editBillet'||$_GET['action'] == '')
     {
         $adminController->editBillet();
     }
     elseif ($_GET['action'] == 'deleteBillet'||$_GET['action'] == '')
     {
         $adminController->deleteBillet();
     }
     elseif ($_GET['action'] == 'loginPage'||$_GET['action'] == '')
    {
        $blogController->loginPage();
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
     /*elseif ($_GET['action'] == 'deleteBillet')
     {
         $adminController->deleteBillet();
     }*/


}

else {
    echo'Pas d\'autres pages disponibles pour le moment';
    }

/*else {
    $blogController->home();    
    }*/


/*function vd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}*/
