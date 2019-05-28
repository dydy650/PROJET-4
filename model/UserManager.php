<?php
namespace App\model;

use App\model\Entity\User;

class UserManager extends DBManager
{

    /**
     * @param User $user
     * @return bool vrai si utilisateur enregistre sinon faux
     */
    public function postUser($user) //j'enregistre un user dans la BDD user
    {
        //je hash le password que je stock dans une variable
        $hash = md5($_POST["password"]);
        //Puis on stock le résultat dans la base de données :
        $req = $this->db->prepare('INSERT INTO user (username, password) VALUES(:username, :password)');
        return $req->execute(array(
            'username'=> $user->getUsername(),
            'password'=> $hash)
        );
    }




    /**
     * @param $username
     * @return User
     */
    public function getUser($username) // afficher 1 user
    {

        $req = $this->db->prepare('SELECT id, username, password, is_admin FROM user WHERE  username = ?');
        $req->execute(array($username));
        $req->setFetchMode(\PDO::FETCH_CLASS,User::class); // Ligne necessaire pour utiliser les entitiés ddans les vues
        $user= $req->fetch();
        return $user;
    }


}

