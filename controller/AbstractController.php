<?php


namespace App\controller;


abstract class AbstractController
{
    public $baseUrl;
    public $is_admin;


    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        $this->baseUrl = 'http://'. $_SERVER['HTTP_HOST']. "/PHP/P4/";
        if(isset($_SESSION['is_admin'])&&($_SESSION['is_admin'] === "1" )){
            $this->is_admin = true;
        } else {
            $this->is_admin = false;
            //var_dump ($this->is_admin);
            //var_dump ($_SESSION['is_admin']);
        }
    }

    /**
     * @param $view
     * @param array $params
     */
    protected function render($view, $params = array()) // methode qui permet de supprimer les requires dans les methodes ci dessus
    {
        foreach ($params as $key => $value) {
            $this->$key = $value;
        }
        require $view;

    }
}