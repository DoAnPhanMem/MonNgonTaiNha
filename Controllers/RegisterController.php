<?php
require_once("Models/registerModel.php");
class RegisterController {
    var $register_model;
    public function __construct()
    {
        $this->register_model = new Register();
    }
    function register()
    {
        $data_theme = $this->register_model->theme();

        require_once('Views/index.php');
    }
}