<?php
namespace App\controller; 

use \App\model\Model;

class BlogController
{
	public function home()
	{
        require('../view/home.php');
    
	}
    
     public function articleList()
	{
        require('../view/articleList.phtml');
    
	}
    
     public function article()
	{
        require('../view/article.phtml');
    
	}
     public function addComment()
	{
        require('../view/article_addComment.phtml');
    
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
    
    public function viewComment()
    {
        
        $model = new Model();
        $comments = $model->test(); 
        require('../view/article_viewComment.phtml');
    }
  
}

  
   
         


