<?php 
    require_once("MVC/Models/statistical.php");
    class StatisticalController {
        var $statistical_model;
        public function __construct()
        {
            $this->statistical_model = new statistical();
        }
        public function statistical()
        {
            require_once("MVC/Views/Admin/index.php");
        }

    }
?>