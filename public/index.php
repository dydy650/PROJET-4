<?php
session_start ();
require ('../class/Autoload.php');

use \App\Autoloader;
use \App\controller\BlogController;
use \App\controller\AdminController;

Autoloader::Register ();

$blogController = new BlogController();
$adminController = new AdminController();

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'home' || $_GET['action'] == '') {
            $blogController->home ();
        } elseif ($_GET['action'] == 'billetList') {
            $blogController->listBillets ();
        } elseif ($_GET['action'] == 'billet') {
            $blogController->billet ();
        } elseif ($_GET['action'] == 'aboutUs') {
            $blogController->aboutUs ();
        } elseif ($_GET['action'] == 'createBillet') {
            if ($_SESSION['is_admin'] === "1") {
                $adminController->createBillet ();
            } else {
                throw new Exception('Accès refusé');
            }
        } elseif ($_GET['action'] == 'loginPage') {
            $blogController->loginPage ();
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $blogController->addComment ($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Aucun billet envoyé');
            }
        } elseif ($_GET['action'] == 'addBillet') {
            if ($_SESSION['is_admin'] === "1") {
                $adminController->addBillet ();
            } else {
                throw new Exception('Accès refusé');
            }
        } elseif ($_GET['action'] == 'addUser') {
                $adminController->addUser ();
        } elseif ($_GET['action'] == 'login') {
            $blogController->login ();
        } elseif ($_GET['action'] == 'adminHome'){
            if ($_SESSION['is_admin'] === "1") {
                $adminController->adminHome ();
            } else {
                throw new Exception('Accès refusé');
            }
        } elseif ($_GET['action'] == 'logout') {
            $blogController->logout ();
        } elseif ($_GET['action'] == 'deleteBillet' AND isset($_GET['id'])) {
            if ($_SESSION['is_admin'] === "1") {
                $id = $_GET['id'];
                $adminController->deleteBillet ($id);
            } else {
                throw new Exception('Accès refusé');
            }
        } elseif ($_GET['action'] == 'deleteComment' AND isset($_GET['id'])) {
            if ($_SESSION['is_admin'] === "1") {
                $id = $_GET['id'];
                $adminController->deleteComment ($id);
            } else {
                throw new Exception('Accès refusé');
            }
        } elseif ($_GET['action'] == 'editBillet' AND isset($_GET['id'])) {
            if ($_SESSION['is_admin'] === "1") {
                $id = $_GET['id'];
                $adminController->editBillet ($id);
            } else {
                throw new Exception('Accès refusé');
            }
        } elseif ($_GET['action'] == 'updateBillet' AND isset($_GET['id'])) {
            if ($_SESSION['is_admin'] === "1") {
                $id = $_GET['id'];
                $adminController->updateBillet ($id);
            } else {
                throw new Exception('Accès refusé');
            }
        } elseif ($_GET['action'] == 'signalComment' AND isset($_GET['id'])) {
            $id = $_GET['id'];
            $adminController->signalComment ($id);
        } elseif ($_GET['action'] == 'signalCommentList') {
            if ($_SESSION['is_admin'] === "1") {
                $adminController->signalCommentList ();
            } else {
                throw new Exception('Accès refusé');
            }
        }else{
            throw new Exception('Pas d\'autres pages disponibles pour le moment');
        }
    } else {
       $blogController->home ();
    }
}
catch (Exception $e) {
    $blogController ->error($e);
}

