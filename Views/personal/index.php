<section class = "personal">
    <div class="row">
        <div class="header-personal l-3">
            <div class="header-personal_info">
                <img  
                    src="public/img/avatar/<?= (isset($dataInfo['name'])) ? $dataInfo['name'] : 'avatarDefault.png' ?>"
                    class="header-personal__info-img" 
                />
                <h4 class = "header-personal__info-name">Phạm Văn Thiên</h4>
            </div>
            <nav>
                <ul class = "navbar-list">
                    <li class = "navbar-item"><a href="?act=personal&handle=profile"> Thông tin tài khoản</a></li>
                    <li class = "navbar-item"><a href="?act=personal&handle=recipe"> Công thức của tôi</a></li>
                    <li class = "navbar-item"><a href="?act=personal&handle=recipe"> Thoát</a></li>
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
                            require_once("./Controllers/MyRecipeController.php");
                            $controller_obj = new MyRecipeController();
                            $controller_obj->create();
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
