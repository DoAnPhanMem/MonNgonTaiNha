<section class = "personal">
    <div class="row">
    <header class="header-personal l-4">
    <h1> Đây là header trang cá nhân</h1>
        <nav>
            <ul>
                <li><a href="?act=personal&handle=profile"> Thông tin cá nhân</a></li>
                <li><a href="?act=personal&handle=recipe"> Công thức của tôi</a></li>
            </ul>
        </nav>
    </header>
    <div class="content-personal l-8">
        <?php 
             $act = isset($_GET['handle']) ? $_GET['handle'] : "profile";
             switch ($act) {
                 case 'profile':
                     require_once("profile.php");
                     break;
                 case 'recipe':
                     require_once("my-recipe/my-recipe.php");
                     break;
                 default:
                     require_once("profile.php");
                     break;
             }
        ?>
    </div>
    </div>
    
    
    
</section>
