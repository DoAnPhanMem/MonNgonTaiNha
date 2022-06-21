<?php
require_once("Models/MyRecipe.php");
class DetailController
{
    var $detail_model;
    public function __construct()
    {
       $this->detail_model = new MyRecipe();
    }
    
    function list()
    {
        if(isset($_GET['id'])){
            $id = ($_GET['id']);
            $data_recipe = $this->detail_model->getRecipe($id);
            $recipe_imgs = $this->detail_model->getImgsByRecipe($id);
            $recipe_steps = $this->detail_model->getStepsByRecipe($id);
            $recipe_stocks = $this->detail_model->getStocksByRecipe($id);
            $recipe_themes = $this->detail_model->getThemesByRecipe($id);
            $data_themes = $this->detail_model->theme();
            $comments =  $this->detail_model->getCommentByRecipe($id);
        }   
        require_once('Views/index.php');
    }
}
?>