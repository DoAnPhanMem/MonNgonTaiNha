<section class = "personal">
    <header class="header-personal">
    <h1> Đây là header trang cá nhân</h1>
        <nav>
            <ul>
                <li><a href="?act=personal&handle=account"> Thông tin cá nhân</a></li>
                <li><a href="?act=personal&handle=recipe"> Công thức của tôi</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="content-personal">
        <?php 
             $act = isset($_GET['handle']) ? $_GET['handle'] : "account";
             switch ($act) {
                 case 'account':
                     require_once("my-account.php");
                     break;
                 case 'recipe':
                     require_once("my-recipe/my-recipe.php");
                     break;
                 default:
                     require_once("my-account.php");
                     break;
             }
        ?>
    </div>
</section>