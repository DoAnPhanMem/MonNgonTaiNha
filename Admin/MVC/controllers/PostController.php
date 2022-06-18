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
        $data = array();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($id > 1) {
                $id = 0;
            }
            $data = $this->post_model->trangthai($id);
        } else {
            $data = $this->post_model->BaiDang();
        }
        require_once("MVC/Views/Admin/index.php");
    }
    function xetduyet()
    {
        $data = array(
            'MaBaiDang' => $_GET['id'],
            'TrangThai' => 1,
        );
        $this->post_model->update($data);
    }
    function delete()
    {
        if (isset($_GET['id'])) {
            $this->post_model->delete($_GET['id']);
        }
    }
    function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->post_model->BaiDang();
        require_once("MVC/Views/Admin/index.php");
    }
}
