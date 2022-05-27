<?php
require_once("Models/personal.php");
class PersonalController{
    var $personal_model;
    public function __construct()
    {
        $this->personal_model = new Personal();
    }
    public function personal() 
    {
        require_once('Views/index.php');
    }
}
?>