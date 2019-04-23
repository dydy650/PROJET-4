
<?php

namespace App\model;

use App\model\Entity\Login;

class LoginManager extends DBManager

//  Récupération de l'utilisateur et de son pass hashé
$req = $this->$bdd->prepare('SELECT password FROM admin');
$req->execute(array($req->getUser(),$req->getPassword());
$resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        echo 'Vous êtes connecté !';
    }
    else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}