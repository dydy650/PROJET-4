<?php


namespace App\controller;


use App\model\UserManager;
use App\model\BilletManager;
use App\model\DBManager;
use App\model\Entity\Billet;
use App\model\Entity\User;


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

    public function deleteBillet()
    {
        $this->render ('../view/deleteBillet.phtml');

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
        if (empty($_POST['title']) || empty($_POST['content'])) {
            echo "il manque des datas";
            throw new \Exception('error !');
        } else {

            $billetManager = new BilletManager();
            $billet = new Billet();
            $billet
                ->setTitle ($_POST['title'])
                ->setContent ($_POST['content']);

            $id = $billetManager->postBillet ($billet);
            if ($id === false) {
                throw new \Exception('Impossible d\'ajouter le billet !');
            } else {
                header ('Location: index.php?action=billet&id=' . $id);
            }
        }

    }

   /*public function editBillet()
    {

    }*/


    /**
     * @throws \Exception
     */
    public function addUser()
    {

        if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password2"])){
            throw new \Exception('error !');
        }else{
            if (isset($_POST["user"]) && isset($_POST["password"]) && isset($_POST["password2"])) {
                if ($_POST["password"] == $_POST["password2"]) {
                    $adminManager =  new UserManager();
                    $user= new User;
                    $user
                        ->setUser ($_POST['user'])
                        ->setPassword($_POST["password"]);

                   $NU = $adminManager->postUser($user);

                }
            }
        }
    }

}
