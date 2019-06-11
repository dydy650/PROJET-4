<?php
namespace App\model;

//require_once('DBManager.php'); 
use App\model\Entity\Billet;

class BilletManager extends DBManager
{  
    //connexion a la BDD --> fonction de recupération des donnees

    public function getBillets() //liste des billets
    {
        
        $datas =$this->db->query('SELECT id, title, content, DATE_FORMAT(billet_date, \'%d/%m/%Y \') AS billet_date FROM billets ORDER BY id DESC LIMIT 0, 10');
        $billets = array();
        $datas->setFetchMode(\PDO::FETCH_CLASS,Billet::class); // on veux recupérer une class billet
        while ($billet = $datas->fetch())  // tant qu on peut lire une ligne on fait la boucle
        {
            $billets[] = $billet; // on rajoute la ligne dans le tableau
        }
        $datas->closeCursor(); // on libere la memoire
        return $billets; //le tableau est bien rempli
    }


    public function getBillet($id) // afficher 1 billet
    {
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(billet_date, \'%d/%m/%Y \') AS billet_date FROM billets WHERE id = ?');
        $req->execute(array($id));
        $req->setFetchMode(\PDO::FETCH_CLASS,Billet::class); // Ligne necessaire pour utiliser les entitiés ddans les vues
        $billet = $req->fetch();
        return $billet;
    }
    /**
     * @param Billet $billet
     * @return bool
     */
    public function postBillet($billet) // On recoit le billet a enregistrer
    {
        $req = $this->db->prepare('INSERT INTO billets(title, content, billet_date) VALUES(?, ?, NOW())');
        $req->execute(array($billet->getTitle(),$billet->getContent()));
        return $this->db->lastInsertId ();
    }
    /**
     * @param int $id
     * @return bool
     */
    public function deleteBillet($id) // suppression de la ligne dans la BDD
    {
        $req = $this->db->prepare("DELETE FROM billets WHERE id = ?");
        $result = $req->execute(array($id));
        return $result;

    }

    /**
     * @param Billet $billet
     * @return bool
     */
    public function updateBillet($billet)
    {
        $req =  $this->db->prepare('UPDATE billets SET title = ?, content = ? WHERE id = ?');
        $result = $req->execute(array($billet->getTitle(),$billet->getContent(),$billet->getId()));
        return $result;
    }

}


