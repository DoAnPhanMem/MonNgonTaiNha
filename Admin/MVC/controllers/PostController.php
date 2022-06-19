<?php
require_once("MVC/Models/post.php");
class PostController
{
    var $post_model;
    public function __construct()
    {
        $this->post_model = new post();
    }
    function list()
    {
        $data_post = array();
        if (isset($_GET['status'])) {
            $status = $_GET['status'];
            if($status == "y"){
                $status = "Đã duyệt";
            }
            else{
                $status = "Chưa duyệt";
            }
            $data_post = $this->post_model->getPostByStatus($status);
        }
        require_once("MVC/Views/Admin/index.php");
    }
    function approval()
    {
        if($_GET['status']){
            $status = $_GET['status'];
            if($status == "y"){
                $status = "Đã duyệt";
            }
            else{
                $status = "Từ chối";
            }
            $this->post_model->updateStatus( $_GET['id'],$status );
            $data_post = $this->post_model->getPostByStatus('Đã duyệt');   
        }
        require_once("MVC/Views/Admin/index.php");
        // header('Location: ?act=personal&handle=recipe');
    }
    

}
