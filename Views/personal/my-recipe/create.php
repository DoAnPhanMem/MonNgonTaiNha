<div class="create-recipe">
    <div class="create-recipe__top">
        <h1 class="create-recipe__title">Thêm Công Thức</h1>
        <hr />
    </div>
    <form method="POST" action="?act=personal&handle=create-action" enctype="multipart/form-data" >
        <div class="create-recipe__form-item">
            <h2>Chủ đề </h2>
            <div class="create-recipe__item-content">
                <div class="create-recipe__theme-content">
                    <div class="create-recipe__themes-selected">
                    </div>
                    <?php
                        $themes = array(
                            '1' =>   'ăn nhẹ',
                            '2'  =>  'món á'
                        ); 
                        ?>
                    <script> 
                        var themes = <?php echo json_encode($themes) ?>;
                        
                    </script>
                    <div class="create-recipe__theme-search-group">
                        <i class="fa-solid create-recipe__theme-plus-icon fa-file-circle-plus"></i>
                        <input type="text" placeholder="Thêm thẻ chủ đề ...." class="create-recipe__theme-input">
                    </div>
                    <div class="create-recipe__theme-results">
                        
                    </div>
                    <input type="hidden" name="post-themes" value="">
                </div>


            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Tên công thức </h2>
            <div class="create-recipe__item-content">
                <input required type="text" name="post-name" placeholder="Nhập tên công thức " id="create-recipe__name">  
            </div>
                
        </div>
        <div class="create-recipe__form-item">
                <div class="create-recipe__form-row">
                    
                        <div class="create-recipe__description">
                            <h2>Mô tả </h2>
                            <div class="create-recipe__item-content">
                                <textarea name="post-description" id="create-recipe__description" cols="30" rows="10">

                                </textarea>
                            </div>
                            
                        </div>
                    
                   
                        <div class="create-recipe__video">
                            <h2>Video </h2>
                            <div class="create-recipe__item-content">
                                <input type="file" name="post-video" id="create-recipe__video-input" accept="video/*">
                                <div class="create-recipe__video-group ">
                                    <label  class="create-recipe__video-label create-recipe__video-label--change" for="create-recipe__video-input">
                                        <i class="create-recipe__add-icon fa-solid fa-plus"></i>
                                        <i class="create-recipe__change-icon fa-solid fa-repeat"></i>
                                    </label>
                                    <video controls src="" class="create-recipe__video-tag"></video>
                                </div>
                             

                            </div>
                        </div> 
                   
                </div>
                <div class="create-recipe__images">
                    <h2>Hình ảnh</h2>
                    <div class="create-recipe__item-content">
                        <input required type="file"  accept="image/png, image/jpeg" multiple name="post-imgs[]" id="create-recipe__image-input">
                        <label  class="create-recipe__image-label" for="create-recipe__image-input">
                            <i  class=" create-recipe__add-icon fa-solid fa-plus"></i>
                            <!-- <img src="./public/img/recipes/1.jpg" alt=""> -->
                        </label>
                    </div>
                    <div class="create-recipe__images-preview ">
                         <p><i>Chưa có ảnh nào được chọn</i></p>
                        <label  class="create-recipe__image-label--add-more" for="create-recipe__image-input">
                            <i  class=" create-recipe__add-icon fa-solid fa-plus"></i>
                        </label>
                    </div>
                       
                </div>        
        </div>
        
        <div class="create-recipe__form-item">
            <h2>Thành phần </h2>
            <div class="create-recipe__stocks">
                <div class="create-recipe__stock-list">
                    
                </div>
                
                <span class="create-recipe__stock-btn-add" >
                    <i class="create-recipe__add-icon create-recipe__stock-add-icon fa-solid fa-plus"></i>
                    Thêm thành phần
                </span>
                <input type="hidden" name="post-stocks">
            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Công thức </h2>
            <div class="create-recipe__steps">
                <div class="create-recipe__step-list">
                    
                </div>
                
                <span class="create-recipe__step-btn-add" >
                    <i class="create-recipe__add-icon create-recipe__stock-add-icon fa-solid fa-plus"></i>
                    Thêm bước làm
                </span>
                <input type="hidden" name="post-steps">
            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Khẩu phần </h2>
            <input required min=1 type="number" name="post-ration"  placeholder="Khẩu phần " id="create-recipe__ration">  

        </div>
        <div class="create-recipe__form-item">
            <h2>Ghi chú</h2>
            <input type="text" name="post-note" id="create-recipe__note">
        </div>
        <button class = "btn btn-rounded create-recipe__btn-submit">Hoàn tất</button>
    </form>
</div>
<script src="public/js/create-recipe.js"></script>

