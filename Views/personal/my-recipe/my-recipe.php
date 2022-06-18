<div class="my-recipe">

    <div class="toast-group">
    </div>
    <?php 
        if(isset($_COOKIE['msg'])){     
    ?>    
            <script>showSuccessInsert();</script>    
    <?php }
    if(isset($_COOKIE['upd'])){ ?>
        <script>showSuccessUpdate();</script> 
   <?php }
   if(isset($_COOKIE['del'])){ ?>
    <script>showSuccessDelete();</script> 
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
                    <option>Mới nhất</option>
                    <option>Lâu nhất</option>
                    <option>1 năm trước</option>
                </select>
            
            
                <select  class = "my-recipe-fitter__time-cooking" id = "time-cooking">
                    <option>Dưới 30 phút</option>
                    <option>Trên 30 phút</option>
                    <option>Trên 1 giờ</option>
                </select>
            
            
            
                <select  class = "my-recipe-fitter__theme" id = "theme">
                    <option>Tất cả</option> 
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