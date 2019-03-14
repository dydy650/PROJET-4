<?php
require('../controller/controller.php');
    
    
if (isset($_GET['action'])) 
{
     if ($_GET['action'] == 'home'||$_GET['action'] == '') 
    {
        require('../view/home.php');
    }
    elseif ($_GET['action'] == 'articleList') 
    {
       require('../view/articleList.phtml');
    }
    elseif($_GET['action'] == 'article') 
    {
        require('../view/article.phtml');
    }
    elseif ($_GET['action'] == 'aboutUs'||$_GET['action'] == '') 
    {
        require('../view/aboutUs.phtml');
    }
    elseif ($_GET['action'] == 'contact'||$_GET['action'] == '') 
    {
        require('../view/contact.phtml');
    }
     elseif ($_GET['action'] == 'login'||$_GET['action'] == '') 
    {
        require('../view/userConnexion.phtml');
    }
else {
    echo'Pas d\'autres pages disponibles pour le moment';
    }
}