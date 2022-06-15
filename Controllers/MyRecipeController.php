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
    public function create_action(){

        $idRecent =  $this->recipe_model->getIdRecent();
    
        if((intval($idRecent) + 1) >= 10){
            $idNew = "BD0";
        }
        else{
            $idNew = "BD00";
        }
        $idNew .= ($idRecent + 1);
       
        //echo $idNew;
        if(isset($_POST['post-themes'])){
            
            $data_recipe = array(
                'MaBaiDang' =>$idNew,
                'MaND' => '1', //tạm,
                'Video' =>'null',
                'TieuDe' => $_POST['post-name'],
                'MoTa' => $_POST['post-description'],
                'KhauPhan' => $_POST['post-ration'],
                'TrangThai' =>'Chưa duyệt',
                'DoKho' => '3', //tạm,
                'GhiChu' => $_POST['post-note'],
                'LuotXem' => 'null',
            );
            $this->recipe_model->create($data_recipe);


            $data_themes = json_decode($_POST['post-themes']) ;
           /*  echo "themes : "; print_r($data_themes) ;   */
            $this->recipe_model->create_themeDetail( $data_themes, $idNew );
            // save imgs to folder 
            $data_imgs = array();
            $imgFiles = array_filter($_FILES['post-imgs']['name']); // xóa các item null
            $imgsLength= count($_FILES['post-imgs']['name']);
            for($i = 0 ; $i < $imgsLength; $i++){
                $tmpFilePath = $_FILES['post-imgs']['tmp_name'][$i];
                if($tmpFilePath != ''){
                    $newFilePath = "./public/img/recipes/" . $_FILES['post-imgs']['name'][$i];
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Other code goes here
                        $data_imgs[$i] = $_FILES['post-imgs']['name'][$i]; // lưu lại tên hình
                     }
                }
            }
            $this->recipe_model->create_img($data_imgs, $idNew);


            $data_stocks = array();
           // print_r(json_decode($_POST['post-stocks']));
            foreach(json_decode($_POST['post-stocks']) as $index => $object){ 
                foreach ($object as $key => $value) {
                    $data_stocks[$index][$key] = $value; 
                }  
            }
            $this->recipe_model->create_stock($data_stocks, $idNew);

            print_r($data_stocks);
            $data_steps =  array();
            foreach(json_decode( $_POST['post-steps']) as $index => $object){ 
                foreach ($object as $key => $value) {
                    $data_steps [$index][$key] = $value; 
                }  
            }
        
            //header('Location:?act=personal&handle=recipe');
            require_once('Views/index.php');
        }
    }
}
