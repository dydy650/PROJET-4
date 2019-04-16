<?php
namespace App\model;

class AdminManager extends DBManager
{

    public function connexion(user, password)
    {

        $datas = $this->db->query('SELECT * FROM admin WHERE user = ? and password = ?');
        $admins = array();
        while ($row = $datas->fetch())
        {
            $admins[] = $row;

        }
        return $admins;
    }
}

