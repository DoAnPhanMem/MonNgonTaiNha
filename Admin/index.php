<?php
session_start();
if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) {
    $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
    $act = isset($_GET['act']) ? $_GET['act'] : "admin";
    switch ($mod) {
        case 'banner':
            require_once('MVC/controllers/BannerController.php');
            $controller_obj = new BannerController();
            switch ($act) {
                case 'list':
                    $controller_obj->list();
                    break;
                case 'add':
                    $controller_obj->add();
                    break;
                case 'store':
                    $controller_obj->store();
                    break;
                case 'detail':
                    $controller_obj->detail();
                    break;
                case 'delete':
                    $controller_obj->delete();
                    break;
                case 'edit':
                    $controller_obj->edit();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;
                default:
                    $controller_obj->list();
                    break;
            }
            break;
        case 'user':
            require_once('MVC/controllers/UserController.php');
            $controller_obj = new UserController();
            switch ($act) {
                case 'list':
                    $controller_obj->list();
                    break;
                case 'detail':
                    $controller_obj->detail();
                    break;
                case 'add':
                    $controller_obj->add();
                    break;
                case 'store':
                    $controller_obj->store();
                    break;
                case 'delete':
                    $controller_obj->delete();
                    break;
                case 'edit':
                    $controller_obj->edit();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;
                default:
                    $controller_obj->list();
                    break;
            }
            break;
        case 'recipe':
            require_once('MVC/controllers/RecipeController.php');
            $controller_obj = new RecipeController();
            switch ($act) {
                case 'list':
                    $controller_obj->list();
                    break;
                case 'add':
                    $controller_obj->add();
                    break;
                case 'store':
                    $controller_obj->store();
                    break;
                case 'delete':
                    $controller_obj->delete();
                    break;
                case 'edit':
                    $controller_obj->edit();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;
                default:
                    $controller_obj->list();
                    break;
            }
            break;
        case 'theme':
            require_once('MVC/controllers/ThemeController.php');
            $controller_obj = new ThemeController();
            switch ($act) {
                case 'list':
                    $controller_obj->list();
                    break;
                case 'detail':
                    $controller_obj->detail();
                    break;
                case 'add':
                    $controller_obj->add();
                    break;
                case 'store':
                    $controller_obj->store();
                    break;
                case 'delete':
                    $controller_obj->delete();
                    break;
                case 'edit':
                    $controller_obj->edit();
                    break;
                case 'update':
                    $controller_obj->update();
                    break;
                default:
                    $controller_obj->list();
                    break;
            }
            break;
        
        case 'post':
            require_once('MVC/controllers/PostController.php');
            $controller_obj = new PostController();
            switch ($act) {
                case 'list':
                    $controller_obj->list();
                    break;
                case 'add':
                    $controller_obj->add();
                    break;
                case 'detail':
                    $controller_obj->detail();
                    break;
                case 'store':
                    $controller_obj->store();
                    break;
            }
            break;

            case 'login':
                require_once('MVC/controllers/LoginController.php');
                $controller_obj = new LoginController();
                switch ($act) {
                    case 'admin':
                        $controller_obj->admin();
                        break;
                    default:
                        $controller_obj->admin();
                        break;
                }
                break;
                case 'statistical':
                    require_once('MVC/controllers/LoginController.php');
                    $controller_obj = new LoginController();
                    switch ($act) {
                        case 'admin':
                            $controller_obj->admin();
                            break;
                        default:
                            $controller_obj->statistical();
                            break;
                    }
                    break;
         default:
            header('location: ?mod=login');
            
    }
} else {
    if (isset($_SESSION['isLogin_Nhanvien']) && $_SESSION['isLogin_Nhanvien'] == true) {
        $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
        $act = isset($_GET['act']) ? $_GET['act'] : "admin";
        switch ($mod) {
            case 'loaisanpham':
                require_once('MVC/controllers/LoaisanphamController.php');
                $controller_obj = new LoaisanphamController();
                switch ($act) {
                    case 'list':
                        $controller_obj->list();
                        break;
                    case 'detail':
                        $controller_obj->detail();
                        break;
                    default:
                        $controller_obj->list();
                        break;
                }
                break;
            case 'danhmuc':
                require_once('MVC/controllers/DanhmucController.php');
                $controller_obj = new DanhmucController();
                switch ($act) {
                    case 'list':
                        $controller_obj->list();
                        break;
                    case 'detail':
                        $controller_obj->detail();
                        break;
                    default:
                        $controller_obj->list();
                        break;
                }
                break;
            case 'sanpham':
                require_once('MVC/controllers/SanphamController.php');
                $controller_obj = new SanphamController();
                switch ($act) {
                    case 'list':
                        $controller_obj->list();
                        break;
                    case 'detail':
                        $controller_obj->detail();
                        break;
                    default:
                        $controller_obj->list();
                        break;
                }
                break;
            case 'khuyenmai':
                require_once('MVC/controllers/KhuyenmaiController.php');
                $controller_obj = new KhuyenmaiController();
                switch ($act) {
                    case 'list':
                        $controller_obj->list();
                        break;
                    case 'detail':
                        $controller_obj->detail();
                        break;
                    default:
                        $controller_obj->list();
                        break;
                }
                break;
                case 'login':
                    require_once('MVC/controllers/LoginController.php');
                    $controller_obj = new LoginController();
                    switch ($act) {
                        case 'admin':
                            $controller_obj->admin();
                            break;
                        default:
                            $controller_obj->admin();
                            break;
                    }
                    break;
            case 'hoadon':
                require_once('MVC/controllers/HoadonController.php');
                $controller_obj = new HoadonController();
                switch ($act) {
                    case 'list':
                        $controller_obj->list();
                        break;
                    case 'chitiet':
                        $controller_obj->chitiet();
                        break;
                    case 'delete':
                        $controller_obj->delete();
                        break;
                    case 'xetduyet':
                        $controller_obj->xetduyet();
                        break;
                    default:
                        $controller_obj->list();
                        break;
                }
                break;
            default:
            header('location: ?mod=login');
                // require_once('MVC/controllers/LoginController.php');
                // $controller_obj = new LoginController();
                // $controller_obj->admin();
                // break;
        }
    } else {
        // $mod = isset($_GET['mod']) ? $_GET['mod'] : "login";
        // $act = isset($_GET['act']) ? $_GET['act'] : "login";
        // require_once('MVC/controllers/LoginController.php');
        // $controller_obj = new LoginController();
        // switch ($mod) {
        //     case 'login':
        //         switch ($act) {
        //             case 'login':
        //                 $controller_obj->login();
        //                 break;
        //             case 'login_action':
        //                 $controller_obj->login_action();
        //                 break;
        //             default:
        //                 $controller_obj->login();
        //                 break;
        //         }
        //     default:
        //         $controller_obj->login();
        //         break;
        // }
        header('location: ../?act=taikhoan');
    }
}
