<?php
require_once("Models/home.php");
class HomeController
{
    var $home_model;
    public function __construct()
    {
       $this->home_model = new Home();
    }
    
    function list()
    {
        $newestItems = $this->home_model->newestItem();

        // var_dump($newestItems);
        require_once('Views/index.php');
    }
}