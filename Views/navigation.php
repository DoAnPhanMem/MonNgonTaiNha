<?php
$act = isset($_GET['act']) ? $_GET['act'] : "home";
switch ($act) {
    case "home":
        require_once("home/home.php");
        break;
    case "list-product":
        require_once("list-congthuc/congthuc.php");
        break;
    case "search":
        require_once("list-congthuc/congthuc.php");
        break;
    case "category":
        require_once("list-congthuc/congthuc.php");
        break;
    case "shop":
        require_once("shop/shop.php");
        break;
    case "checkout":
        $act = isset($_GET['handle']) ? $_GET['handle'] : "list";
        switch ($act) {
            case 'list':
                require_once("order/checkout.php");
                break;
            case 'order_complete':
                require_once("order/order_complete.php");
                break;
            default:
                require_once("order/checkout.php");
                break;
        }
        break;
    case "detail":
        require_once("recipe-detail/recipe-detail.php");
        break;
    case "about":
        require_once("introduce/about.php");
        break;
    case "contact":
        require_once("introduce/contact.php");
        break;
    case "cart":
        require_once("cart/cart.php");
        break;
    case "account":
        $act = isset($_GET['handle']) ? $_GET['handle'] : "login";
        if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == true) {
            require_once("login/login.php");
            break;
        } else {
            switch ($act) {
                case 'login':
                    require_once("login/login.php");
                    break;
                case 'register':
                    require_once("login/register.php");
                    break;
                
                default:
                    require_once("login/login.php");
                    break;
            }
        }
        break;
    case 'register':
        require_once("register/register.php");
        break; 
    case "personal":
        require_once("personal/index.php");
        break;
    default:
        require_once("error-404.php");
        break;
}
