<section class = "personal">
    <div class="row">
        <div class="header-personal l-3">
            <h1> Đây là header trang cá nhân</h1>
            <nav>
                <ul>
                    <li><a href="?act=personal&handle=profile"> Thông tin cá nhân</a></li>
                    <li><a href="?act=personal&handle=recipe"> Công thức của tôi</a></li>
                </ul>
            </nav>
        </div>
        <div class="content-personal l-9">
            <div class="personal-content">
                <?php 
                    $act = isset($_GET['handle']) ? $_GET['handle'] : "profile";
                    switch ($act) {
                        case 'profile':
                            require_once("profile.php");
                            break;
                        case 'recipe':
                            require_once("my-recipe/my-recipe.php");
                            break;
                        case 'create':
                            require_once("my-recipe/create.php");
                            break;
                        case 'create-action' :
                            require_once("./Controllers/MyRecipeController.php");
                            $controller_obj = new MyRecipeController();
                            $controller_obj->create_action();
                            break;
                        default:
                            require_once("profile.php");
                            break;
                    }
                ?>
            </div>
        </div>
    </div>
    
    
    
</section>
