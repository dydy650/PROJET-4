<?php


namespace App\controller;


abstract class AbstractController
{
    public $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://'. $_SERVER['HTTP_HOST']. "/PHP/P4/";
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