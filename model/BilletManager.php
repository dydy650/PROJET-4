<?php
namespace App\model;

//require_once('DBManager.php'); 
use App\model\Entity\Billet;

class BilletManager extends DBManager
{  
    //connexion a la BDD --> fonction de recupération des donnees
    public function getBillets()
    {
        
        $datas =$this->db->query('SELECT id, title, content, DATE_FORMAT(billet_date, \'%d/%m/%Y \') AS billet_date_fr FROM billets ORDER BY billet_date DESC LIMIT 0, 5');
        $billets = array();
        $datas->setFetchMode(\PDO::FETCH_CLASS,Billet::class);
            while ($row = $datas->fetch()) 
        {
            $billets[] = $row;
        }
        $datas->closeCursor();
        return $billets;
    }


    public function getBillet($id)
    {
    
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(billet_date, \'%d/%m/%Y \') AS billet_date FROM billets WHERE id = ?');
        $req->execute(array($id));
        $req->setFetchMode(\PDO::FETCH_CLASS,Billet::class); // Ligne necessaire pour utiliser les entitiés ddans les vues
        $billet = $req->fetch();
        return $billet;
    }
}


