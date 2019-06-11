<?php

namespace App\model;
 
//require_once('DBManager.php'); 
use App\model\Entity\Comment;

class CommentManager extends DBManager
{

    /**
     * @param $billet_id
     * @return bool|\PDOStatement
     */
    public function getComments($billet_id)
    {
        
        $comments= $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date FROM comments WHERE billet_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($billet_id));
        $comments->setFetchMode(\PDO::FETCH_CLASS,Comment::class);
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
       //$comments->setFetchMode(\PDO::FETCH_CLASS,Comment::class);

        return $affectedLines;
    }
    public function signalComment($id)
    {
        $req = $this->db->prepare ('UPDATE comments SET is_signaled = 1 WHERE id = ?');
        $result = $req->execute (array($id));
        return $result;
    }
    public function getSignalComment()
    {
        $req = $this->db->query('SELECT id, comment, author FROM comments WHERE is_signaled = 1');
        $comments = array();
        $req->setFetchMode ( \PDO::FETCH_CLASS, Comment::class);
        while ($comment = $req->fetch ())
        {
            $comments[] = $comment;
        }
        $req->closeCursor(); // on libere la memoire
        return $comments;
    }


        /* public function signalComment($comment)
         {
             $req =  $this->db->prepare('UPDATE comments SET is_signaled = 1 WHERE id = ?');
             $result = $req->execute (array($comment->getIsSignaled());
             return $result;
         }*/

    /*public function getSignalComment()
    {
        $datas =$this->db->query('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS comment_date FROM comments WHERE is_signaled = 1 ORDER BY comment_date DESC');
        $comments = array();
        $datas->setFetchMode(\PDO::FETCH_CLASS,Comment::class);
        while ($row = $datas->fetch())
        {
            $comments[] = $row;
        }
        $datas->closeCursor();
        return $comments;
    }*/
}     
   


