
    <?php 
    if(0==0){   
       echo "<script>alert('ngu ngo')</script>";  
        $nameRecipe = $_POST['nameRecipe'];
        $dateUpdate = $_POST['dateUpdate'];
        $timeCooking = $_POST['timeCooking'];
        $statusRecipe  = $_POST['statusRecipe'];
       
        include("../MyRecipe.php");
        $controller_obj = new MyRecipe();
        $data_recipes  = $controller_obj->fitterRecipe($nameRecipe, $dateUpdate,$timeCooking,$statusRecipe);
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
?>
<!-- -->