<?php
require_once("Models/theme.php");
class ThemeController
{
    var $theme_model;
    public function __construct()
    {
        $this->theme_model = new theme();
    }
    public function theme() 
    {   
        $data_themes = $this->theme_model->theme();
        require_once('Views/personal/theme/create.php');
    }
     public function create_action()
    {
        $imgFileName = '';
        if(isset($_FILES['post-img']) && $_FILES['post-img']['size'] > 0){
            $imgFile = $_FILES['post-img'] ;
            $imgFile['name'] = $imgFile['name'];
            $imgFileName = $imgFile['name'] ;
            $tmpimgPath = $imgFile['tmp_name'];
            $newimgPath = "./public/img/themes/" . $imgFile['name'];
            $status = move_uploaded_file($tmpimgPath, $newimgPath);
        }
        $data_theme = array(
            'MaChuDe'  => 'null',
            'TenChuDe' => $_POST['post-name'],
            'HinhAnhChuDe' =>  $imgFileName
        );
        $this->theme_model->create($data_theme);
        header('Location: ?act=personal&handle=create');
    }
}
?>
