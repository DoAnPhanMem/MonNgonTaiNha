<?php
require_once("Models/account.php");
class AccountController
{
    var $account;
    public function __construct()
    {
        $this->account = new Account();
    }
    function login()
    {
        $data_theme = $this->account->theme();
        require_once('Views/index.php');
    }
    function login_action()
    {
        $username = $_POST['username'];
        $password = md5($_POST['pass']);
        if (strpos($username, "'") != false) {
            $username = str_replace("'", "\'", $username);
        }
        $data = array(
            'username' => $username,
            'password' => $password,
        );
        $this->account->login_action($data);
    }

    function register(){
        require_once('Views/index.php');
    }
    function register_action()
    {
        if(isset($_POST['name'])){
            $check1 = 0;
            $check2 = 0;
            $data_check = $this->account->check_account();
            foreach ($data_check as $value) {
                if ($value['email'] == $_POST['email']
                    || $value['username'] == $_POST['username']
                ) {
                    $check1 = 1;
                }
            }
    
            if ($_POST['pass'] != $_POST['pass-again']) {
                $check2 = 1;
            }
    
            $data = array(
                'hoTen' =>    $_POST['name'],
                'GioiTinh' => "",
                'email' =>    $_POST['email'],
                'DiaChi'  =>   "",
                'username' => $_POST['username'],
                'password' => md5($_POST['pass']),
                'MaQuyen' =>  '1',
                'TrangThai'  =>  '1'
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->account->register_action($data, $check1, $check2);
        }
       
    }
    function logout()
    {
        $this->account->logout();
    }
    function profile()
    {
        $data_theme= $this->account->theme();
        require_once('Views/index.php');
    }
    function update()
    {
        if (isset($_POST['Ho'])) {
            $data = array(
                'Ho' =>    $_POST['Ho'],
                'Ten'  =>   $_POST['Ten'],
                'GioiTinh' => $_POST['GioiTinh'],
                'SDT' => $_POST['SĐT'],
                'Email' =>    $_POST['Email'],
                'DiaChi'  =>   $_POST['DiaChi'],
            );
            foreach ($data as $key => $value) {
                if (strpos($value, "'") != false) {
                    $value = str_replace("'", "\'", $value);
                    $data[$key] = $value;
                }
            }
            $this->account->update_account($data);
        } else {
            if ($_POST['MatKhauMoi'] == $_POST['MatKhauXN']) {
                if (md5($_POST['MatKhau']) == $_SESSION['login']['MatKhau']) {
                    $data = array(
                        'MatKhau' => md5($_POST['MatKhauMoi']),
                    );
                    $this->account->update_account($data);
                } else {
                    setcookie('doimk', 'Mật khẩu không đúng', time() + 2);
                }
            } else {
                setcookie('doimk', 'Mật khẩu mới không trùng nhau', time() + 2);
            }
        }
        header('location: ?act=taikhoan&xuli=account#doitk');
    }
}
?>
