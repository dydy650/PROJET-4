<?php
namespace App\model;

class DBManager
{
    protected $db;
    
    public function __construct()
    {
        try
        {
            $this->db = new \PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}