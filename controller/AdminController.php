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
            echo "il manque des datas";
            throw new \Exception('error !');
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
           /* if ($id === false) {
                throw new \Exception('Impossible d\'ajouter le billet !');
            } else {
                header ('Location: index.php?action=billet&id=' . $id);
            }
        }*/

    }
    public function addUser()
    {
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password2"])) {
            echo 'error';
            //throw new \Exception('error !');
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
            $this->addFlash('success','le billet a bien été supprimé');
        }else{
            $this->addFlash('warning','erreur le billet n a pas été supprimé');
                  }
        header ('Location:index.php?action=home');
    }
    public function editBillet($id)
   {
       $billetManager = new BilletManager();
       $billet = $billetManager->getBillet ($id);
       $this->render ('../view/editBillet.phtml', array("billet" => $billet));
   }
    public function updateBillet()
    {
        $billetManager = new BilletManager();
        $billet = new Billet();
        $billet
            ->setTitle ($_POST['title'])
            ->setContent ($_POST['content']);

        $id = $billetManager->updateBillet($billet);
        if ($id){
            $this->addFlash('success','Le chapitre a été modifié');
        }else{
            $this->addFlash('danger','votre chapitre n\'a pas pu etre mis à jour');
        }
        header ('Location: index.php?action=billet&id=' . $id);
    }
}


