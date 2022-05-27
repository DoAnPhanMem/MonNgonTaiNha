<?php
require_once("Models/MyRecipe.php");
class MyRecipeController{
    var $recipe_model;
    public function __construct()
    {
        $this->recipe_model = new MyRecipe();
    }
    public function recipe() 
    {
        require_once('Views/index.php');
    }
}
?>