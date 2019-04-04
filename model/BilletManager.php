<?php
namespace App\model;

//require_once('DBManager.php'); 
class BilletManager extends DBManager
{  
    //connexion a la BDD --> fonction de recupération des donnees
    public function getBillets()
    {
        
        $datas =$this->db->query('SELECT id, title, content, DATE_FORMAT(billet_date, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_fr FROM billets ORDER BY billet_date DESC LIMIT 0, 5');
         $billets = array();
            while ($row = $datas->fetch()) 
        {
            $billets[] = $row;
        }
        $datas->closeCursor();
        return $billets;
    }


    public function getBillet($id)
    {
    
        $req = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(billet_date, \'%d/%m/%Y à %Hh%imin%ss\') AS billet_date_fr FROM billets WHERE id = ?');
        $req->execute(array($id));
        $billet = $req->fetch();

        return $billet;
    }
}


