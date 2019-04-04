<?php
namespace App\controller; 

use \App\model\Model;
use \App\model\BilletManager;
use \App\model\CommentManager;
use Exception;

class BlogController
{
	public function home()
	{
        require('../view/home.php');
    
	}
     public function aboutUs()
	{
        require('../view/aboutUs.phtml');
    
	}
    
     public function contact()
	{
        require('../view/contact.phtml');
    
	}
    
     public function login()
	{
        require('../view/userConnexion.phtml');
    
	}
     
      public function listBillets()
    {
        $billetManager = new \App\model\BilletManager();
        $billets = $billetManager->getBillets(); 
        require('../view/articleList.phtml');
    }
    
    public function billet()
    {
        $billetManager = new \App\model\BilletManager();
        $commentManager = new \App\model\CommentManager();
        
        $billet = $billetManager->getBillet($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        require('../view/article_postView.phtml');
    }

    /**
     * @param $billet_id
     * @param $author
     * @param $comment
     * @throws Exception
     */
    public function addComment($billet_id, $author, $comment)
      {
            $commentManager = new \App\model\CommentManager();

            $affectedLines = $commentManager->postComments($billet_id, $author, $comment);

         if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
            }
        else {
            header('Location: index.php?action=article&id=' . $billet_id);
            }
        }

}

  
   
         


