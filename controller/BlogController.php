<?php
namespace App\controller; 

use \App\model\BilletManager;
use \App\model\CommentManager;
use App\model\Entity\Comment;

class BlogController extends AbstractController
{

    public function home()
    {
        $this->render('../view/home.phtml');

    }

    public function aboutUs()
    {
        $this->render('../view/aboutUs.phtml');

    }

    public function contact()
    {
        $this->render('../view/contact.phtml');

    }

    public function contactConfirmation()
    {
        $this->render('../view/contact_confirmation.phtml');
    }

    public function login()
    {
        $this->render('../view/login.phtml');

    }

    public function listBillets()
    {
        $billetManager = new BilletManager();
        $billets = $billetManager->getBillets();
        $this->render('../view/articleList.phtml', array("billets" => $billets)); // je veux appeler la articlelist et celle ci aura $billets en parametre
    }

    public function billet()
    {
        $billetManager = new BilletManager();
        $commentManager = new CommentManager();

        $billet = $billetManager->getBillet($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        $this->render('../view/article_postView.phtml', array("billet" => $billet, "comments" => $comments));
    }

    /**
     * @param $billet_id
     * @param $author
     * @param $comment
     * @throws \Exception
     */
    public function addComment($billet_id, $author, $content)
    {
        $commentManager = new CommentManager();
        $comment= new Comment(); // je creé un Objet qui regroupe toute les infos de mon commentaire que je vais utiliser ensuite dans ma methode postComment
        $comment
            ->setAuthor($author)
            ->setComment($content)
            ->setBilletId($billet_id);

        $affectedLines = $commentManager->postComment($comment);

        if ($affectedLines === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=article&id=' . $billet_id);
        }
    }


   /* public function NewConnexion($user, $password)
    {
        $NC = new AdminManager();
    }*/




}

  
   
         


