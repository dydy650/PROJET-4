<?php


namespace App\controller;


use App\model\BilletManager;
use App\model\Entity\Billet;

class AdminController extends AbstractController
{
    public function adminHome()
    {
        $this->render('../view/adminHome.phtml');

    }
    public function adminBillet()
    {
        $this->render('../view/adminBillet.phtml');

    }
    /**
     * @param $title
     * @param $content
     */
    public function addBillet()
    {
        //une condition qui vérifie si les données $_POST sont présentes, sinon on lève une Exception
        //On instancie un nouveau billet, donc vide
        //On hydrate le billet avec les données $_POST, puisqu'on sait qu'elles sont présentes
        //On envoie le billet hydraté au model
        if (empty($_POST['title']) || empty($_POST['content']))
        {
            echo "il manque des datas";
            throw new \Exception('error !');
        }else{

            $billetManager = new BilletManager();
            $billet= new Billet();
            $billet
                ->setTitle($_POST['title'])
                ->setContent($_POST['content']);

            $id = $billetManager->postBillet($billet);
            if ($id === false) {
                throw new \Exception('Impossible d\'ajouter le billet !');
            } else {
                header ('Location: index.php?action=article&id=' .$id);
            }
        }


    }


}

        //Si on reçoit l'id du billet, on fait une redirection vers ce billet (header)
        //Sinon on lève une exception
        /*$success = $billetManager->postBillet($billet);
        if ($success === false) {
            throw new \Exception('Impossible d\'ajouter le billet !');
        } else {
            header('Location: index.php?action=article&id=' . $id);
        }*/
