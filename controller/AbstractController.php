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
        $file = $_SERVER['SCRIPT_NAME'];
        $path = str_replace ('public/index.php','',$file);
        $this->baseUrl = 'http://'. $_SERVER['HTTP_HOST']. $path;
        $this->is_admin = isset($_SESSION['is_admin'])&&($_SESSION['is_admin'] === "1" );
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
    protected function  addFlash($type, $message)
    {
        $_SESSION['message'] = ['type'=>$type, 'message'=>$message];
    }
}