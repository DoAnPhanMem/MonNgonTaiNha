<?php
require_once("MVC/models/user.php");
class UserController
{
    var $user_model;
    public function __construct()
    {
        $this->user_model = new user();
    }
    public function list()
    {
        $data = $this->user_model->All();
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/list.php");
    }
    public function detail()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->user_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/detail.php");
    }
    public function add()
    {
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/add.php");
    }
    public function store()
    {
        $data = array(
            'Ho' =>    $_POST['Ho'],
            'Ten'  =>   $_POST['Ten'],
            'GioiTinh' => $_POST['GioiTinh'],
            'SDT' => $_POST['SDT'],
            'Email' =>    $_POST['Email'],
            'DiaChi'  =>   $_POST['DiaChi'],
            'TaiKhoan' => $_POST['TaiKhoan'],
            'MatKhau' => md5($_POST['MatKhau']),
            'MaQuyen' =>  '2',
            'TrangThai'  =>  '1'
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->user_model->store($data);
    }
    public function delete()
    {
        $id = $_GET['id'];
        $this->user_model->delete($id);
    }
    public function edit()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $data = $this->user_model->find($id);
        require_once("MVC/Views/Admin/index.php");
        //require_once("MVC/Views/authors/edit.php");
    }
    public function update()
    {
        $data = array(
            'MaND' => $_POST['MaND'],
            'Ho' =>    $_POST['Ho'],
            'Ten'  =>   $_POST['Ten'],
            'GioiTinh' => $_POST['GioiTinh'],
            'SDT' => $_POST['SDT'],
            'Email' =>    $_POST['Email'],
            'DiaChi'  =>   $_POST['DiaChi'],
            'TaiKhoan' => $_POST['TaiKhoan'],
            'MatKhau' => md5($_POST['MatKhau']),
            'MaQuyen' =>  $_POST['MaQuyen'],
            'TrangThai'  =>  $_POST['TrangThai'],
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }
        $this->user_model->update($data);
    }
}
