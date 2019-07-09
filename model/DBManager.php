<?php
namespace App\model;

abstract class DBManager
{
    protected $db;
    
    public function __construct()
    {
        // Analyse sans sections
        $config = parse_ini_file("../config.ini");
        $host=$config['host'];
        $dbname=$config['dbname'];
        $username=$config['username'];
        $password=$config['password'];

        try {
            $this->db = new \PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        }

        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}