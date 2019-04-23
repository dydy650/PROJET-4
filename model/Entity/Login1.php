<?php

namespace App\model\Entity;

class Login
{
    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Login
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Login
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    private $user;
    private $password;
}