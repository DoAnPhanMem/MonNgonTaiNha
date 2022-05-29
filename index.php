<?php
session_start();
$mod = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($mod) {
    case 'home':
        require_once('Controllers/HomeController.php');
        $controller_obj = new HomeController();
        $controller_obj->list();
        break;
    case 'theme':
        require_once('Controllers/ThemeController.php');
        $controller_obj = new ThemeController();
        $controller_obj->list();
        break;
    case 'checkout':
        $act = isset($_GET['handle']) ? $_GET['handle'] : "list";
        require_once('Controllers/CheckoutController.php');
        $controller_obj = new CheckoutController();
        switch ($act) {
            case 'list':
                $controller_obj->list();
                break;
            case 'save':
                $controller_obj->save();
                break;
            case 'order_complete':
                $controller_obj->order_complete();
                break;
            default:
                $controller_obj->list();
                break;
        }
        break;
    case 'detail':
        require_once('Controllers/DetailController.php');
        $controller_obj = new DetailController();
        $controller_obj->list();
        break;
    case 'cart':
        $act = isset($_GET['handle']) ? $_GET['handle'] : "list";
        require_once('Controllers/CartController.php');
        $controller_obj = new CartController();
        switch ($act) {
            case 'list':
                $controller_obj->list_cart();
                break;
            case 'update':
                $controller_obj->update_cart();
                break;
            case 'add':
                $controller_obj->add_cart();
                break;
            case 'delete':
                $controller_obj->delete_cart();
                break;
            case 'deleteall':
                $controller_obj->deleteall_cart();
                break;
            default:
                $controller_obj->list_cart();
                break;
        }
        break;
    case 'account':
        $act = isset($_GET['handle']) ? $_GET['handle'] : "account";
        require_once('Controllers/LoginController.php');
        $controller_obj = new LoginController();
        if ((isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true)) {
            switch ($act) {
                case 'logout':
                    $controller_obj->logout();
                    break;
                default:
                    header('location: ?act=error');
                    break;
            }
            break;
        } else {
                switch ($act) {
                    case 'login':
                        $controller_obj->login();
                        break;
                    case 'login-action':
                        $controller_obj->login_action();
                        break;
                    case 'register':
                        $controller_obj->register();
                        break;
                    case 'register-action':
                        $controller_obj->register_action();
                        break;
                    default:
                        $controller_obj->login();
                        break;
                }
                break;
            }
    case 'personal' :
        require_once('Controllers/PersonalController.php');
        $controller_obj = new PersonalController();
        if ((isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true)) {
            $controller_obj->personal();
            break;
        }
        else{
            header('location: ?act=error');
            break;
        } 
    default:
        require_once('Controllers/HomeController.php');
        $controller_obj = new HomeController();
        $controller_obj->list();
        break;
}
