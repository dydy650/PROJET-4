<?php

namespace App\model;
 
//require_once('DBManager.php'); 
use App\model\Entity\Comment;

class CommentManager extends DBManager
{

    /**
     * @param $billet_id
     * @return array
     */
    public function getComments($billet_id)
    {
        
        $comments= $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date FROM comments WHERE billet_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($billet_id));
        //$comments->setFetchMode(\PDO::FETCH_CLASS,Comment::class);
        return $comments;
    }


    /**
     * @param Comment $comment
     * @return bool
     */
    public function postComment($comment)
    {
        $comments = $this->db->prepare('INSERT INTO comments(billet_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($comment->getBilletId(),$comment->getAuthor(),$comment->getComment()));
       //    $comments->setFetchMode(\PDO::FETCH_CLASS,Comment::class);

        return $affectedLines;
    }
}     
   


