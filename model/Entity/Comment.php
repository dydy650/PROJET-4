<?php
namespace App\model\Entity;


/**
 * @property  comment_date_fr
 */
class Comment
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Comment
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     * @return Comment
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommentDate()
    {
        return $this->comment_date_fr;
    }



    /**
     * @param mixed $comment_date
     * @return Comment
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBilletId()
    {
        return $this->billet_id;
    }

    /**
     * @param mixed $billet_id
     * @return Comment
     */
    public function setBilletId($billet_id)
    {
        $this->billet_id = $billet_id;
        return $this;
    }

    private $id;
    private $author;
    private $comment;
    private $comment_date;
    private $billet_id;

}