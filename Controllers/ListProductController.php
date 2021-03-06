<?php
require_once("Models/listProductModel.php");
class ListProductController
{
    var $home_model;
    public function __construct()
    {
        $this->home_model = new ListProductModel();
    }

    function list()
    {
        $products = $this->home_model->listProduct();


        require_once('Views/index.php');
    }
    function search($keySearch)
    {
        $products = $this->home_model->search($keySearch);


        require_once('Views/index.php');
    }
    function filterByCategoryId($categoryId)
    {
        $products = $this->home_model->getByCategory($categoryId);


        require_once('Views/index.php');
    }
}
?>
