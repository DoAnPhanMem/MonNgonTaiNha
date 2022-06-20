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
            'hoTen'  =>   $_POST['hoTen'],
            'gioiTinh' => $_POST['gioiTinh'],
            'sdt' => $_POST['sdt'],
            'email' =>    $_POST['email'],
            'diaChi'  =>   $_POST['diaChi'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'maQuyen' =>  '2',
            'trangThai'  =>  '1'
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

            'hoTen' =>    $_POST['hoTen'],
            'gioiTinh' => $_POST['gioiTinh'],
            'sdt' => $_POST['sdt'],
            'email' =>    $_POST['email'],
            'diaChi'  =>   $_POST['diaChi'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'maQuyen' =>  $_POST['maQuyen'],
            'trangThai'  =>  $_POST['trangThai'],
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
