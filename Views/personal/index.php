<section class = "personal">
    <header class="header-personal">
    <h1> Đây là header trang cá nhân</h1>
        <nav>
            <ul>
                <li><a href="?act=personal&handle=profile"> Thông tin cá nhân</a></li>
                <li><a href="?act=personal&handle=recipe"> Công thức của tôi</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="content-personal">
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
</section>