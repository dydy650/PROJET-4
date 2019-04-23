<?php


namespace App\controller;


use App\model\BilletManager;

class AdminController extends AbstractController
{
    public function adminHome()
    {
        $this->render('../view/adminHome.phtml');

    }
    public function adminBillet()
    {
        $this->render('../view/adminBillet.phtml');

    }
    /**
     * @param $title
     * @param $content
     */
    public function addBillet($title, $content)
    {
        $billetManager = new BilletManager();
        $billet= new Billet();
        $billet
            ->setTitle($title)
            ->setContent($content);

        $success = $billetManager->postBillet($billet);

    }
}