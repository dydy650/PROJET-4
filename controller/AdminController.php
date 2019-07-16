<?php
namespace App\controller;

use App\model\UserManager;
use App\model\BilletManager;
use App\model\Entity\Billet;
use App\model\Entity\User;
use App\model\CommentManager;

class AdminController extends AbstractController
{
    public function adminHome()
    {
        $this->render ('../view/adminHome.phtml');
    }
    public function createBillet()
    {
        $this->render ('../view/createBillet.phtml');
    }
    /*
     * @param $title
     * @param $content
     */
    public function addBillet()
    {
        //une condition qui vérifie si les données $_POST sont présentes, sinon on lève une Exception
        //On instancie un nouveau billet, donc vide
        //On hydrate le billet avec les données $_POST, puisqu\'on sait qu\'elles sont présentes
        //On envoie le billet hydraté au model
        if (empty($_POST['title']) || empty($_POST['content'])) {
            throw new \Exception('error : il manque des datas !');
        } else {
            $billetManager = new BilletManager();
            $billet = new Billet();
            $billet
                ->setTitle ($_POST['title'])
                ->setContent ($_POST['content']);
            $id = $billetManager->postBillet ($billet);
            if ($id){
                $this->addFlash('success','Le chapitre a été créé');
            }else{
                $this->addFlash('danger','votre chapitre n\'a pas pu etre enregistré');
            }
            header ('Location: index.php?action=billet&id=' . $id);
        }

    }
    public function addUser()
    {
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password2"])) {
            throw new \Exception('error !');
        } else {
                 if ($_POST['password'] === $_POST['password2']) {
                $userManager = new UserManager();
                $user = new User;
                $user
                    ->setUsername ($_POST['username'])
                    ->setPassword ($_POST["password"]);
               $result = $userManager->postUser($user);
               if ($result){
                   $this->addFlash('success','votre compte est enregistré');
               }else{
                   $this->addFlash('danger','votre compte n\'a pas pu etre enregistré');
               }
                header ('Location:index.php?action=loginPage');
                }
            }
        }
    public function deleteBillet($id)
    {
        $billetmanager = new BilletManager();
        $delete = $billetmanager->deleteBillet($id);
        if ($delete)
        {
            $this->addFlash('success','le chapitre a bien été supprimé');
        }else{
            $this->addFlash('warning','erreur le chapitre n a pas été supprimé');
                  }
        header ('Location:index.php?action=home');
    }
    public function deleteComment($id)
    {
        $commentmanager = new CommentManager();
        $delete = $commentmanager->deleteComment($id);
        if ($delete)
        {
            $this->addFlash('success','le commentaire a bien été supprimé');
        }else{
            $this->addFlash('warning','erreur le commentaire n a pas été supprimé');
        }
        header ('Location:index.php?action=home');
    }
    public function editBillet($id) // je recupère les datas du billet et je redigier vers la page edit pre rempli
   {
       $billetManager = new BilletManager();
       $billet = $billetManager->getBillet($id);
       $this->render ('../view/editBillet.phtml', array("billet" => $billet));
   }
    public function updateBillet($id)
    {
        $billetManager = new BilletManager();
        $billet = new billet();
        $billet
            ->setId ($_GET['id'])
            ->setTitle ($_POST['title'])
            ->setContent($_POST['content']);
        $update = $billetManager->updateBillet($billet);
        if ($update){
            $this->addFlash('success','Le chapitre a été modifié');
        }else{
            $this->addFlash('danger','votre chapitre n\'a pas pu etre mis à jour');
        }
        header ('Location: index.php?action=billet&id=' . $id);
    }

    /**
     * @param $id
     */
    public function signalComment($id)
    {
        $commentManager = new CommentManager();

        $signal = $commentManager->signalComment($id);
        if ($signal){
            $this->addFlash('success','Commentaire signalé');
        }else{
            $this->addFlash('danger','impossible de signaler le commentaire');
        }
        header ('Location: '.$_SERVER['HTTP_REFERER']);
    }
    public function signalCommentList()
    {
        $commentManager = new CommentManager();
        $comments = $commentManager->getSignalComment();
        $this->render('../view/adminSignalComment.phtml', array("comments" => $comments));
    }
}


