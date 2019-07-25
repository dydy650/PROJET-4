<?php
namespace App\controller;

use \App\model\BilletManager;
use \App\model\CommentManager;
use App\model\Entity\Comment;
use App\model\Entity\User;
use App\model\UserManager;

class BlogController extends AbstractController
{
    public function home()
    {
        $this->render ('../view/home.phtml');
    }
    public function aboutUs()
    {
        $this->render ('../view/aboutUs.phtml');
    }
    /*public function error($e){

        $this->addFlash ('danger', $e->getMessage());

        $this->render ('../view/error.phtml');
    }*/
    public function loginPage()
    {
        $this->render ('../view/loginPage.phtml');
    }
    public function listBillets()
    {
        $billetManager = new BilletManager();
        $billets = $billetManager->getBillets ();
        $this->render ('../view/billetList.phtml', array("billets" => $billets)); // je veux appeler la articlelist et celle ci aura $billets en parametre
    }
    public function billet()
    {
        $billetManager = new BilletManager();
        $commentManager = new CommentManager();

        $billet = $billetManager->getBillet ($_GET['id']);
        $comments = $commentManager->getComments ($_GET['id']);
        $this->render('../view/billet_postView.phtml', array("billet" => $billet, "comments" => $comments));
    }

    /**
     * @param $billet_id
     * @param $author
     * @param $content
     * @throws \Exception
     */
    public function addComment($billet_id, $author, $content)
    {
        $commentManager = new CommentManager();
        $comment = new Comment(); // je creé un Objet qui regroupe toute les infos de mon commentaire que je vais utiliser ensuite dans ma methode postComment
        $comment
            ->setAuthor ($author)
            ->setComment ($content)
            ->setBilletId ($billet_id);
        $affectedLines = $commentManager->postComment($comment);
        if ($affectedLines === false) {
             $this->addFlash('danger','Impossible d\'ajouter le commentaire');
        } else {
            $this->addFlash('success','Commentaire ajouté');
            header ('Location: index.php?action=billet&id=' . $billet_id);
        }
    }

    /**
     * @throws \Exception
     */
    public function login()
    {
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            throw new \Exception('error !');
        }
        $userManager = new UserManager();
        $user = $userManager->getUser ($_POST["username"]);
        $hash = md5 ($_POST["password"]);
        if ($user instanceof User && $hash === $user->getPassword()){
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['is_admin'] = $user->getIsAdmin();
            if ($user->getIsAdmin () === "1") {
                header ('Location:index.php?action=adminHome');
            } else {
                $_SESSION['is_admin'] = $user->getIsAdmin();
               header ('Location:index.php?action=home');
            }
        } else {
            throw new \Exception('Username ou mot de passe incorrection');
        }
    }

    public function logout()
    {
        $_SESSION = array();
        session_destroy ();
        header ('Location:index.php?action=loginPage');
        exit();
    }
    public function error(\Exception $e){
        $this->addFlash ('warning', $e->getMessage ());
        $this->render ('../view/error.phtml');
    }
}
