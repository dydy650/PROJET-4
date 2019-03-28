<?php
namespace App\model;

class Model extends DBManager
{  
    
    public function test()
    {
        
        $datas = $this->db->query('SELECT * FROM comments ');    
        $comments = array();
        while ($row = $datas->fetch()) 
        {
            $comments[] = $row; 
        
        }
        return $comments;
    }
}     
   

    
    
    
  