<!-- pages-title-start -->
<?php if (0==0) { ?>
    <div class="create-recipe">
    <div class="create-recipe__top">
        <h1 class="create-recipe__title"><?=$data_recipe[0]['TieuDe']?></h1>
        <hr />
    </div>
    <div>
      
        <div class="create-recipe__form-item">
        <input required type="hidden" name="id" value="<?=$data_recipe[0]['MaBaiDang']?>" >  
            <h2>Chủ đề </h2>
            <div class="create-recipe__item-content">
                <div class="create-recipe__theme-content">
                    <div class="create-recipe__themes-selected">
                        <?php 
                            foreach($recipe_themes as $key => $value){
                                ?>
                                <div class="create-recipe__theme-item">
                                <p><?= $value['TenChuDe']?></p>
                                </i>
                            </div>
                          <?php  }
                        ?>
                    </div>

                   
                    <div class="create-recipe__theme-results">
                        
                    </div>
                    <input type="hidden"  class = "post-themes-edit" name="post-themes" value="">
                </div>
            </div>
        </div>
        <div class="create-recipe__form-item">
                <div class="create-recipe__form-row">
                
                        <div class="create-recipe__description">
                            <h2>Mô tả </h2>
                            <div class="create-recipe__item-content">
                                <p name="post-description"  id="create-recipe__description" cols="30" rows="10"><?=trim($data_recipe[0]['MoTa'])?></p>
                            </div>
                        </div>
                    
                        <?php 
                        if($data_recipe[0]['Video'] != ''){ ?>
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
                      <?php } ?>
                       
                       
                   
                </div>
               
                <div class="edit-recipe__imgs">
                <h2>Hình ảnh</h2>
                    <div class="create-recipe__form-row">
                        <?php foreach($recipe_imgs as $key => $value) { ?>
                            <div class="create-recipe__images">
                                <div class="create-recipe__item-content">
                                    <label  class="create-recipe__image-label">
                                        <img class="active" src="./public/img/recipes/<?= $value['HinhAnh'] ?>" alt=""/>  
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
                    </div>
                <?php }?>
                </div>
                
                
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
                            <input disabled type="text"  name=""   value ="<?= $value["NoiDung"] ?>" placeholder="Nội dung "  class="create-recipe__step-content">  
                            <input disabled type="number" min=0  name="" value = "<?= $hour ?>" placeholder="Giờ "  class="create-recipe__step-hour">  
                            <input disabled type="number" min=0  name="" value = "<?= $minute ?>" placeholder="Phút"  class="create-recipe__step-minute">  
                            <input disabled type="number" min=0 name="" value = "<?= $second ?>" placeholder="Giây"  class="create-recipe__step-second">  
                           
                         </div>
                        
                    <?php }?>
                </div>
                
               
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
        <?php 

        //ĐỪng xóa cái này
            if(isset($_GET['status'])){ 
                $status =($_GET['status']);
                if($status == 'n'){  ?>
                    <a href="admin/?mod=post&act=approval&status=y&id=<?=$data_recipe[0]['MaBaiDang']?>" onclick="return confirm('Công thức này sẽ được hiển thi trên trang web ?');" class = "btn detail-recipe-btn__accept">Duyệt</a>
              <?php }?>
                    <a href="" class = "btn  detail-recipe-btn__ejct">Từ chối</a>
              <?php  }?>
            
        
    </div>
</div>

<?php }?>