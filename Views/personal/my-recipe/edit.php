<div class="create-recipe">
    <div class="create-recipe__top">
        <h1 class="create-recipe__title">Chỉnh Sửa Công Thức</h1>
        <hr />
    </div>
    <form method="POST" action="?act=personal&handle=editRecipe-action" enctype="multipart/form-data" >
      
        <div class="create-recipe__form-item">
        <input required type="hidden" name="id" value="<?=$data_recipe[0]['MaBaiDang']?>" >  

            <h2>Chủ đề </h2>
            <div class="create-recipe__item-content">
                <div class="create-recipe__theme-content">
                    <div class="create-recipe__themes-selected">
                    </div>
                    <?php
                        $themes = $data_themes;
                        ?>
                    <script> 
                        let isEdit = true;
                        var themes = <?php echo json_encode($themes) ?>;
                        var recipe_themes = <?php echo json_encode($recipe_themes) ?>; 
                        var recipe_steps = <?php  echo json_encode($recipe_steps)  ?>
                        
                    </script>

                    <div class="create-recipe__theme-search-group">
                        <i class="fa-solid create-recipe__theme-plus-icon fa-file-circle-plus"></i>
                        <input type="text" placeholder="Thêm thẻ chủ đề ...." class="create-recipe__theme-input">
                    </div>
                    <div class="create-recipe__theme-results">
                        
                    </div>
                    <input type="hidden"  class = "post-themes-edit" name="post-themes" value="">
                </div>


            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Tên công thức </h2>
            <div class="create-recipe__item-content">
                <input required type="text" name="post-name" value="<?=$data_recipe[0]['TieuDe']?>" placeholder="Nhập tên công thức " id="create-recipe__name">  
            </div>
                
        </div>
        <div class="create-recipe__form-item">
                <div class="create-recipe__form-row">
                
                        <div class="create-recipe__description">
                            <h2>Mô tả </h2>
                            <div class="create-recipe__item-content">
                                <textarea name="post-description"  id="create-recipe__description" cols="30" rows="10"><?=trim($data_recipe[0]['MoTa'])?></textarea>
                            </div>
                            
                        </div>
                    
                   
                        <div class="create-recipe__video">
                            <h2>Video </h2>
                            <div class="create-recipe__item-content">
                                <input type="file" name="post-video" id="create-recipe__video-input" accept="video/*">
                                <?php if(isset($data_recipe[0]['Video']) && $data_recipe[0]['Video']!=''&& $data_recipe[0]['Video']!=NUll){ ?>
                                <input type="hidden" name="post-video-old" value="./public/videos/recipes/<?= $data_recipe[0]['Video'] ?>">
                                <div class="create-recipe__video-group  create-recipe__video--play">
                                    <label  class="create-recipe__video-label create-recipe__video-label--change" for="create-recipe__video-input">
                                        <i class="create-recipe__add-icon fa-solid fa-plus"></i>
                                        <i class="create-recipe__change-icon fa-solid fa-repeat"></i>
                                    </label>
                                    <video controls src="./public/videos/recipes/<?= $data_recipe[0]['Video'] ?>" class="create-recipe__video-tag"></video>
                                </div>
                                <?php } else{?>
                                    <div class="create-recipe__video-group">
                                    <label  class="create-recipe__video-label create-recipe__video-label--change" for="create-recipe__video-input">
                                        <i class="create-recipe__add-icon fa-solid fa-plus"></i>
                                        <i class="create-recipe__change-icon fa-solid fa-repeat"></i>
                                    </label>
                                    <video controls src="" class="create-recipe__video-tag"></video>
                                        </div>
                                    <?php }?>
                            </div>
                        </div> 
                   
                </div>
               
                <div class="edit-recipe__imgs">
                <h2>Hình ảnh</h2>
                    <div class="create-recipe__form-row">
                        <?php for($i = 0;$i <4 ; $i++) { ?>
                            <div class="create-recipe__images">
                                <div class="create-recipe__item-content">
                                    <input  type="file"  accept="image/png, image/jpeg"  name="post-imgs[]"  class ="create-recipe__image-input img-input" id="create-recipe__image-input<?=$i?>" />
                                    <label  class="create-recipe__image-label" for="create-recipe__image-input<?= $i ?>">
                                        <?php   
                                            if(isset($recipe_imgs[$i]['HinhAnh'])){ ?>
                                            <img class="active" src="./public/img/recipes/<?= $recipe_imgs[$i]['HinhAnh'] ?>" alt=""/>  
                                        <?php } else {?>
                                            <i  class="create-recipe__add-icon fa-solid fa-plus"></i>
                                            <?php } ?>
                                    </label>
                                </div>
                            </div>   
                        <?php } ?>
                    </div>  
                </div>
                   
        </div>
        
        <div class="create-recipe__form-item">
            <h2>Thành phần </h2>
            <div class="create-recipe__stocks">
                
                <div class="create-recipe__stock-list">
                <?php foreach($recipe_stocks as $key => $value){ ?>
                    <div class = "create-recipe__stock data-index-stock = <?= $key ?>">
                    <input required type="text" name=""   value = "<?= $value['TenNguyenLieu'] ?>" placeholder="Tên nguyên liệu "  class="create-recipe__stock-name">  
                        <input required min=1  type="number" name="" value = "<?= $value['SoLuong'] ?>" placeholder="Số lượng "  class="create-recipe__stock-quantity">  
                        <input  required type="text" name="" value = "<?= $value['DonVi'] ?>" placeholder="Đơn vị "  class="create-recipe__stock-unit">  
                        <span  class="create-recipe__stock-btn-delete">
                            <i class="fa-solid fa-circle-minus"></i>
                        </span>
                    </div>
                <?php }?>
                </div>
                <span class="create-recipe__stock-btn-add" >
                    <i class="create-recipe__add-icon create-recipe__stock-add-icon fa-solid fa-plus"></i>
                    Thêm thành phần
                </span>
                <input type="hidden" class="post-stocks-edit" name="post-stocks">
            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Công thức </h2>
            <div class="create-recipe__steps">
                <div class="create-recipe__step-list">

                    <?php foreach($recipe_steps as $key => $value){ 
                        $hour = substr( $value['ThoiGian'],  0,2 );
                        $minute = substr( $value['ThoiGian'],  3, 2);
                        $second = substr( $value['ThoiGian'],  6, 2 );
                        ?>
                         <div class="create-recipe__step data-index-step= <?= $key ?>" >
                            <input required type="text"  name=""   value ="<?= $value["NoiDung"] ?>" placeholder="Nội dung "  class="create-recipe__step-content">  
                            <input required type="number" min=0  name="" value = "<?= $hour ?>" placeholder="Giờ "  class="create-recipe__step-hour">  
                            <input required type="number" min=0  name="" value = "<?= $minute ?>" placeholder="Phút"  class="create-recipe__step-minute">  
                            <input required type="number" min=0 name="" value = "<?= $second ?>" placeholder="Giây"  class="create-recipe__step-second">  
                            <span  class="create-recipe__step-btn-delete">
                                <i class="fa-solid fa-circle-minus"></i>
                            </span>
                         </div>
                        
                    <?php }?>
                </div>
                
                <span class="create-recipe__step-btn-add" >
                    <i class="create-recipe__add-icon create-recipe__stock-add-icon fa-solid fa-plus"></i>
                    Thêm bước làm
                </span>
                <input type="hidden"  class = "post-steps-edit" name="post-steps">
            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Khẩu phần </h2>
            <input value="<?=$data_recipe[0]['KhauPhan']?>" required min=1 type="number" name="post-ration"  placeholder="Khẩu phần " id="create-recipe__ration">  

        </div>
        <div class="create-recipe__form-item">
            <h2>Ghi chú</h2>
            <input type="text" name="post-note" value="<?=$data_recipe[0]['GhiChu']?>"id="create-recipe__note">
        </div>
        <button class = "btn btn-rounded create-recipe__btn-submit">Hoàn tất</button>
    </form>
</div>

<script src="public/js/edit-recipe.js"></script>

