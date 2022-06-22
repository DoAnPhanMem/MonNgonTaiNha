
    <?php 
    session_start();
    if(isset($_POST['nameRecipe'])){    
        $nameRecipe = $_POST['nameRecipe'];
        $dateUpdate = $_POST['dateUpdate'];
        $timeCooking = $_POST['timeCooking'];
        $statusRecipe  = $_POST['statusRecipe'];
        $maND = $_POST['maND'];
        include("../MyRecipe.php");
        $controller_obj = new MyRecipe();
        $data_recipes  = $controller_obj->fitterRecipe($nameRecipe, $dateUpdate,$timeCooking,$statusRecipe,$maND);
        foreach ($data_recipes   as  $key => $value){ ?>
                    <div class="l-4">
                        <div class="recipe-item">
                            <div class = "recipe-item__img">
                                <img  src="./public/img/recipes/<?= $value['HinhAnh'] ?>" alt="" >
                            </div>
                            <div class = "my-recipe__info">
                                <h2 class="recipe-item__title"><?= $value['TieuDe'] ?></h2>
                                <p>Thời gian:  <span><?= $value['ThoiGian'] ?></span></p>
                                <p>Lượt xem:  <span><?= $value['LuotXem'] ?> </span></p>
                                <p>Cập nhật lần cuối:  <span><?= $value['Ngay'] ?> </span></p>
                                <p>Trạng thái:  <span><?= $value['TrangThai'] ?></span></p>
                            </div>
                            <div class="recipe-item__action">
                                <a href="?act=personal&handle=edit-recipe&id=<?=$value['MaBaiDang']?>" class="recipe-item__edit">
                                    <i class="fa-solid fa-pen-ruler"></i>
                                </a>
                                <a href="?act=personal&handle=delete-recipe&id=<?=$value['MaBaiDang']?>" class="recipe-item__delete">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php }
    }
    if(isset($_POST['action']) ){

        include("../comment.php");
        $controller_obj = new Comment();

        if($_POST['action'] =="create" ||$_POST['action'] =="update" ){
            $data = array(
                'NoiDung' => $_POST['comment'],
                'MaND' => $_POST['maND'],
                'MaBaiDang' => $_POST['MaBaiDang']
            );  

            if($_POST['action'] =="create"){
                $controller_obj->create_cmt($data);
            }
            else{
                $data['MaBinhLuan'] = $_POST['commentID'];
                $controller_obj->update_cmt($data);
            }
           
        }

        if($_POST['action'] =="delete"){
            $controller_obj->delete_cmt($_POST['commentID']);
        }
        $comments =  $controller_obj->getCommentByRecipe($_POST['MaBaiDang']);
        foreach($comments as $key => $value) {?>
            <div class="comment-item">
                <img src="https://thuthuatnhanh.com/wp-content/uploads/2019/10/anh-avatar-girl-then-thung-391x390.jpg" class="comment-item__avatar"/>
                <div class="comment-item__main">
                    <h3 class="comment-item__main-user"><?= $value['hoTen'] ?></h3>
                    <p class="comment-item__main-content"><?= $value['Noidung'] ?></p>
                    <div class="comment-item__main-edit">
                        <input type="text" class = "comment-item__main-edit-input">
                        <button class = "comment-item__main-edit-btn">Lưu</button>
                    </div>
                    
                </div>
                <?php 
                   if(isset($_SESSION['login']) && $_SESSION['login']['maND'] == $value['MaND']){
                ?>
                    <div class="comment-item__more">
                        <i class="fa-solid fa-ellipsis"></i>
                        <div data-id-cmt = "<?=$value['MaBinhLuan']?>" class="comment-item__more-options">
                            <button class = "cmt-remove">Xóa</button>
                            <button class = "cmt-delete">Chỉnh sửa</button>
                        </div>
                    </div>
                <?php }?>
            </div>
        <?php }
     }
?>
<!-- -->