
<div class="my-recipe">  
    <?php 
        if(isset($_COOKIE['msg'])){     
    ?>    
            <script>showSuccessInsert();</script>    
    <?php }
    if(isset($_COOKIE['upd'])){ ?>
        <script>showSuccessUpdate();</script> 
   <?php }
   if(isset($_COOKIE['del'])){ ?>
    <script>showSuccessDelete();
</script> 
<?php }
    ?>
    <div class="my-recipe__top">
        <h1 class="my-recipe__title">Công Thức Của Tôi</h1>
        <a class="btn-rounded btn" href = "?act=personal&handle=create"> Tạo mới</a>
    </div>
    <div class="my-recipe__content">
        <div class="my-recipe__fitter">
            <div class ="my-recipe__fitter-search">
                <i class="my-recipe__search-icon fa-solid fa-magnifying-glass"></i>
                <input class = "my-recipe__search-input" placeholder = "Nhập tên công thức" />
            </div>
            
                <select class = "my-recipe-fitter__time-update" id ="time-update">
                    <option data-time-sort ="DESC">Mới nhất</option>
                    <option data-time-sort ="ASC">Lâu nhất</option>
                </select>
            
            
                <select  class = "my-recipe-fitter__time-cooking" id = "time-cooking">
                    <option data-time-cooking = "Tất cả">Tất cả</option>
                    <option data-time-cooking = "00:30:00">Dưới 30 phút</option>
                    <option data-time-cooking = "01:00:00">Dưới 1 giờ</option>
                    <option data-time-cooking = "05:00:00">Dưới 5 giờ</option>
                </select>
            
            
            
                <select  class = "my-recipe-fitter__theme" id = "theme">
                    <option>Tất cả</option>
                    <option>Đã duyệt</option> 
                    <option>Chưa duyệt</option> 
                    <option>Từ chối</option> 
                </select>
            
        </div>
        <div class = "my-recipes" >

                <div class ="row">
                <?php foreach ($data_recipes   as  $key => $value){ ?>
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
                <?php }?>
                </div>
                <div class="my-recipe__paging">
                        <div>
                        <i class="padding-icon fa-solid fa-caret-left"></i>
                        <span class="my-recipe__paging-current">1/</span>
                        <span  class="my-recipe__paging-total">4</span>
                        <i class="padding-icon fa-solid fa-caret-right"></i>
                        </div>
                </div>
               
        </div>
    </div>
</div>
<script src="public/js/myrecipe.js"></script>
<script src="public/js/ajax.js"></script>