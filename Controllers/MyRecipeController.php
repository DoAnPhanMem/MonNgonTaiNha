<?php
require_once("Models/MyRecipe.php");
class MyRecipeController{
    var $recipe_model;
    public function __construct()
    {
        $this->recipe_model = new MyRecipe();
    }
    public function recipe() 
    {   $dataInfo = array(
        'name' => ''
        );
        $data_CountRow =  $this->recipe_model->getALlRecipe();
        $data_recipes = $this->recipe_model->limit(0,6);
        $numRow =ceil(count( $data_CountRow)/6);


        require_once('Views/personal/my-recipe/my-recipe.php');
    }
    public function create(){
        $data_themes = $this->recipe_model->theme();
        require_once('Views/personal/my-recipe/create.php');
    }
    public function create_action(){
        if(isset($_POST['post-themes'])){
            //set MaBaiDang
            $idRecent =  $this->recipe_model->getIdRecent();
            if((intval($idRecent) + 1) >= 10){
                $idNew = "BD0";
            }
            else{
                $idNew = "BD00";
            }
            $idNew .= ($idRecent + 1);
            // set time
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $dateUpdate =  date('Y-m-d H:i:s');
            //set video 
          //  print_r($_FILES['post-video']);
            $videoFileName = '';
            if(isset($_FILES['post-video']) && $_FILES['post-video']['size'] > 0){
                $videoFile = $_FILES['post-video'] ;
                $videoFile['name'] = $idNew. $videoFile['name'];
                $videoFileName = $videoFile['name'] ;
                $tmpVideoPath = $videoFile['tmp_name'];
                $newVideoPath = "./public/videos/recipes/" . $videoFile['name'];
                $status = move_uploaded_file($tmpVideoPath, $newVideoPath);
            }
            //get step 
            $data_steps =  array();
            foreach(json_decode( $_POST['post-steps']) as $index => $object){ 
                foreach ($object as $key => $value) {
                    $data_steps [$index][$key] = $value; 
                }  
            }
            //set DoKho
            $stepCount =  count($data_steps);
            if( $stepCount >= 20){
                $doKho = 5;
            }
            else if( $stepCount >= 15){
                $doKho = 4;
            }
            else if($stepCount >= 10){
                $doKho = 3;
            }
            else if($stepCount >= 5){
                $doKho = 2;
            }
            else {
                $doKho = 1;
            }
            $data_recipe = array(
                'MaBaiDang' =>$idNew,
                'MaND' => '1', //tạm,
                'Video' =>$videoFileName,
                'TieuDe' => $_POST['post-name'],
                'MoTa' => $_POST['post-description'],
                'KhauPhan' => $_POST['post-ration'],
                'TrangThai' =>'Chưa duyệt',
                'DoKho' => $doKho, 
                'GhiChu' => $_POST['post-note'],
                'LuotXem' => '0',
                'NgayCapNhat' => $dateUpdate
            );
            $this->recipe_model->create($data_recipe);
            $data_themes = json_decode($_POST['post-themes']) ;
            $this->recipe_model->create_themeDetail( $data_themes, $idNew );
            // save imgs to folder 
            $data_imgs = array();
            $imgFiles = array_filter($_FILES['post-imgs']['name']); // xóa các item null
            $imgsLength= count($_FILES['post-imgs']['name']);
            for($i = 0 ; $i < $imgsLength; $i++){
                $_FILES['post-imgs']['name'][$i] = $idNew.$i.$_FILES['post-imgs']['name'][$i];  

                $tmpFilePath = $_FILES['post-imgs']['tmp_name'][$i];
                if($tmpFilePath != ''){
                    $newFilePath = "./public/img/recipes/" . $_FILES['post-imgs']['name'][$i];
                    $data_imgs[$i] = $_FILES['post-imgs']['name'][$i]; 
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        //Other code goes here
                       
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
            $this->recipe_model->create_step($data_steps, $idNew);
        }
    }
    
    public function edit_recipe(){
        if(isset($_GET['id'])){
            $id = ($_GET['id']);
            $data_recipe = $this->recipe_model->getRecipe($id);
            $recipe_imgs = $this->recipe_model->getImgsByRecipe($id);
            $recipe_steps = $this->recipe_model->getStepsByRecipe($id);
            $recipe_stocks = $this->recipe_model->getStocksByRecipe($id);
            $recipe_themes = $this->recipe_model->getThemesByRecipe($id);
            $data_themes = $this->recipe_model->theme();
/*             print_r($data_themes); */
            require_once('Views/personal/my-recipe/edit.php');
        }   
    }
    public function edit_recipe_action(){
        $id = ($_POST['id']);
       
        $this->recipe_model->delete_step($id);
        $this->recipe_model->delete_stock($id);
        $this->recipe_model->delete_themeDetail($id);
        // set img
        if(isset($_FILES['post-imgs']) ){   
            $postFile =  $_FILES['post-imgs'];
            $lengthPostImg = 0;
            foreach($postFile['error'] as $key => $value){
                if($value === 0){
                    $lengthPostImg++;
                }
            }
            if(($lengthPostImg) > 0){
               
                $recipe_imgs = $this->recipe_model->getImgsByRecipe($id);
                $lengthRecipeImg =  count($recipe_imgs);
                $lengthRemove = ($lengthRecipeImg  + $lengthPostImg) -  4;

                if($lengthRemove > 0){

                    $this->removeImgs($recipe_imgs, $lengthRemove);
                }
                  
                    $imgsLength = count($postFile['name']);
                    $data_imgs = array();
                    for($i = 0 ; $i < $imgsLength ; $i++){
                        $postFile['name'][$i] = $id.$i. $postFile['name'][$i];  
                        $tmpFilePath = $postFile['tmp_name'][$i];
                        if($tmpFilePath != ''){
                            $newFilePath = "./public/img/recipes/" . $postFile['name'][$i];
                            $data_imgs[$i] = $postFile['name'][$i]; 
                            if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                                //Other code goes here
                            }
                        }
                }
                $this->recipe_model->create_img($data_imgs, $id);
               
                
            }
        }
       
       
 
         //set video 
        // remove video in folder
       

        $videoName = "";
        if(isset($_FILES['post-video']) && $_FILES['post-video']['size'] != 0 ){
            if(isset($_POST['post-video-old'])){
                unlink($_POST['post-video-old']);
            }
            $videoFile = $_FILES['post-video'];
            $videoFile['name'] = $id . $videoFile['name'];
            $videoName = $videoFile['name'] ;
            $tmpVideoPath = $videoFile['tmp_name'];
            $newVideoPath = "./public/videos/recipes/" . $videoFile['name'];
            $status = move_uploaded_file($tmpVideoPath, $newVideoPath);
        }
        
        // set time
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $dateUpdate =  date('Y-m-d H:i:s');

         //get step 
         $data_steps =  array();
         foreach(json_decode( $_POST['post-steps']) as $index => $object){ 
             foreach ($object as $key => $value) {
                 $data_steps [$index][$key] = $value; 
             }  
         }
         
         //set DoKho
         $stepCount =  count($data_steps);
         if( $stepCount >= 20){
             $doKho = 5;
         }
         else if( $stepCount >= 15){
             $doKho = 4;
         }
         else if($stepCount >= 10){
             $doKho = 3;
         }
         else if($stepCount >= 5){
             $doKho = 2;
         }
         else {
             $doKho = 1;
         }


         $data_recipe = array(
             'MaBaiDang' =>$id,
             'MaND' => '1', //tạm,
             'Video' =>$videoName,
             'TieuDe' => $_POST['post-name'],
             'MoTa' => $_POST['post-description'],
             'KhauPhan' => $_POST['post-ration'],
             'TrangThai' =>'Chưa duyệt',
             'DoKho' => $doKho, 
             'GhiChu' => isset($_POST['post-note']) ? $_POST['post-note'] : '',
             'LuotXem' => '0',
             'NgayCapNhat' => $dateUpdate
         );
         $this->recipe_model->update($data_recipe);

         $data_stocks = array();
         // print_r(json_decode($_POST['post-stocks']));
          foreach(json_decode($_POST['post-stocks']) as $index => $object){ 
              foreach ($object as $key => $value) {
                  $data_stocks[$index][$key] = $value; 
              }  
          }
         $this->recipe_model->create_stock($data_stocks, $id);
         $this->recipe_model->create_step($data_steps, $id);
         $data_themes = json_decode($_POST['post-themes']);
         $this->recipe_model->create_themeDetail( $data_themes, $id);


        header('Location: ?act=personal&handle=recipe');
    }
    function delete_recipe(){
        $id = $_GET['id'];
        $this->recipe_model->delete_recipe($id);
    }
    function removeImgs($recipe_imgs,$lengthRemove ){
        // remove img in folder 
        $index = 0;
        $imgDelete = [];
        foreach($recipe_imgs as $key => $value){
            unlink("./public/img/recipes/".$value['HinhAnh']);
            $imgDelete[] = $value['MaHinhAnh'];
            $index = $index +1;
            if($index  == $lengthRemove){
                break;
            }
        }
        // remove img name in server 
        $this->recipe_model->delete_img($imgDelete);
      
    }
}
?>
