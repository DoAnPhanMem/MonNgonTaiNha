<?php
require_once("Models/registerModel.php");
class RegisterController {
    var $register_model;
    public function __construct()
    {
        $this->register_model = new Register();
    }
    function register()
    {
        $data_theme = $this->register_model->theme();

        require_once('Views/index.php');
    }

    function login(){
        require_once('Views/index.php');
    }
    
    function register_action()
    {
        $check1 = 0;
        $check2 = 0;
        $data_check = $this->login_model->check_account();
        foreach ($data_check as $value) {
            if ($value['Email'] == $_POST['Email'] || $value['TaiKhoan'] == $_POST['TaiKhoan']) {
                $check1 = 1;
            }
        }

        if ($_POST['MatKhau'] != $_POST['check_password']) {
            $check2 = 1;
        }

        $data = array(
            'Ho' =>    $_POST['Ho'],
            'Ten'  =>   $_POST['Ten'],
            'GioiTinh' => "",
            'SDT' => $_POST['SĐT'],
            'Email' =>    $_POST['Email'],
            'DiaChi'  =>   "",
            'TaiKhoan' => $_POST['TaiKhoan'],
            'MatKhau' => md5($_POST['MatKhau']),
            'MaQuyen' =>  '1',
            'TrangThai'  =>  '1',
        );
        foreach ($data as $key => $value) {
            if (strpos($value, "'") != false) {
                $value = str_replace("'", "\'", $value);
                $data[$key] = $value;
            }
        }

        $this->login_model->register_action($data, $check1, $check2);
    }

}
?>