<?php
namespace App\model;

//require_once('DBManager.php'); 
use App\model\Entity\Billet;

class BilletManager extends DBManager
{  
    //connexion a la BDD --> fonction de recupération des donnees

    public function getBillets() //liste des billets
    {
        
        $datas =$this->db->query('SELECT id, title, content, DATE_FORMAT(billet_date, \'%d/%m/%Y \') AS billet_date FROM billets ORDER BY billet_date DESC LIMIT 0, 5');
        $billets = array();
        $datas->setFetchMode(\PDO::FETCH_CLASS,Billet::class);
            while ($row = $datas->fetch()) 
        {
            $billets[] = $row;
        }
        $datas->closeCursor();
        return $billets;
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
     * @param $billet
     * @return bool
     */
    public function postBillet($billet)
    {
        $billets = $this->db->prepare('INSERT INTO billets(id, title, content, billet_date) VALUES(?, ?, ?, NOW())');
        $req = $billets>execute(array($billet->getId(),$billet->getTitle(),$billet->getContent()));
        $billets->setFetchMode(\PDO::FETCH_CLASS,Billet::class);

        return $req;
    }

    public function modifyBillet()
    {}

    public function deleteBillet()
    {}
}


