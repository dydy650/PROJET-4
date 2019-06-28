<?php
namespace App\controller;

use \App\model\BilletManager;
use \App\model\CommentManager;
use App\model\Entity\Comment;
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
           // echo ('Impossible d\'ajouter le commentaire');
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
        //on verifie si on a qqch en post
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            throw new \Exception('error !');
        }
        //on va recupérer l objet User de la base
        $userManager = new UserManager();
        $user = $userManager->getUser ($_POST["username"]);
        //récupérer cette entité $user venant de la base (qui contient donc les vrais datas, on s'intéresse surtout au password ;) )
        //faire un hash md5 du password reçu en POST
        $hash = md5 ($_POST["password"]);

        //comparer le hash md5 reçu en post à celui de l'entité venant de la base ($user-getPassword())
        if ($hash === $user->getPassword()){
            echo ("connexion reussi");
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['is_admin'] = $user->getIsAdmin();

            if ($user->getIsAdmin () === "1") {
                echo ("admin");
                header ('Location:index.php?action=adminHome');
            } else {
                echo ("pas admin");
                $_SESSION['is_admin'] = $user->getIsAdmin();
               header ('Location:index.php?action=home');
            }
        } else {
            echo ("Username ou mot de passe incorrection");
        }
        //Si c'est le même, on stocke en session le username et le is_admin : on est connecté!
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
