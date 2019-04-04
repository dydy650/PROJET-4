<?php

namespace App\model;
 
//require_once('DBManager.php'); 
class CommentManager extends DBManager
{

    /**
     * @param $billet_id
     * @return array
     */
    public function getComments($billet_id)
    {
        
        $comments= $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE billet_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($billet_id));
        return $comments;
    }

    
    public function postComments($billet_id, $author, $comment)
    {
        $comments = $this->db->prepare('INSERT INTO comments(billet_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($billet_id, $author, $comment));

        return $affectedLines;
    }
}     
   


