<?php
require_once('DBManager.php'); 
class Model extends DBManager
{  
    
    public function test()
    {
        $db = $this->dbConnect();
        
        $datas = $db->query('SELECT * FROM test ');    
        $comments = array();
        while ($row = $datas->fetch()) 
        {
            $comments[] = $row; 
        
        }
        return $comments;
    }
}     
   

    
    
    
  