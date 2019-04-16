<?php
namespace App\model\Entity;


class Billet {
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Billet
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Billet
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Billet
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBilletDate()
    {
        return $this->billet_date;
    }

    /**
     * @param mixed $billet_date
     * @return Billet
     */

    public function setBilletDate($billet_date)
    {
        $this->billet_date = $billet_date;
        return $this;
    }
    private $id;
    private $title;
    private $content;
    private $billet_date;


}
