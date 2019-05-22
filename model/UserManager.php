<?php
namespace App\model;

use App\model\Entity\User;

class UserManager extends DBManager
{

    /**
     * @param $user
     * @return mixed
     */
    public function postUser($user) //j'enregistre un user dans la BDD user
    {
        //je hash le password que je stock dans une variable
        $hash = md5($_POST["password"], PASSWORD_DEFAULT);
        var_dump($hash);
        var_dump ($user->getUser());
        //Puis on stock le résultat dans la base de données :
        $query = $this->db->prepare('INSERT INTO user (username, password) VALUES(username; $hash);');
        var_dump("New entry database");
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

