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
            $videoFile = $_FILES['post-video'];
            $tmpVideoPath = $videoFile['tmp_name'];
            $newVideoPath = "./public/videos/recipes/" . $videoFile['name'];
            $status = move_uploaded_file($tmpVideoPath, $newVideoPath);


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
                'Video' =>$videoFile['name'],
                'TieuDe' => $_POST['post-name'],
                'MoTa' => $_POST['post-description'],
                'KhauPhan' => $_POST['post-ration'],
                'TrangThai' =>'Chưa duyệt',
                'DoKho' => $doKho, 
                'GhiChu' => $_POST['post-note'],
                'LuotXem' => 'null',
                'NgayCapNhat' => $dateUpdate
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
            header('Location:?act=personal&handle=recipe');
            
        }
    }
}
