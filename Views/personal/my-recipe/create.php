<div class="create-recipe">
    <div class="create-recipe__top">
        <h1 class="create-recipe__title">Thêm Công Thức</h1>
        <hr />
    </div>
    <form method="POST" action="?act=personal&handle=create-recipe-action">
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
                        var themes = <?php echo json_encode($themes) ?>
                    </script>
                    <div class="create-recipe__theme-search-group">
                        <i class="fa-solid create-recipe__theme-plus-icon fa-file-circle-plus"></i>
                        <input type="text" placeholder="Thêm thẻ chủ đề ...." class="create-recipe__theme-input">
                    </div>
                    <div class="create-recipe__theme-results">
                        
                    </div>
                </div>


            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Tên công thức </h2>
            <div class="create-recipe__item-content">
                <input  type="text" name="" placeholder="Nhập tên công thức " id="create-recipe__name">  
            </div>
                
        </div>
        <div class="create-recipe__form-item">
                <div class="create-recipe__form-row">
                    
                        <div class="create-recipe__description">
                            <h2>Mô tả </h2>
                            <div class="create-recipe__item-content">
                                <textarea name="" id="create-recipe__description" cols="30" rows="10">

                                </textarea>
                            </div>
                            
                        </div>
                    
                   
                        <div class="create-recipe__video">
                            <h2>Video </h2>
                            <div class="create-recipe__item-content">
                                <input type="file" name="" id="create-recipe__video-input">
                                <label  class="create-recipe__video-label" for="create-recipe__video-input">
                                    <i class="create-recipe__add-icon fa-solid fa-plus"></i>
                                  
                                </label>

                            </div>
                        </div> 
                   
                </div>
                <div class="create-recipe__images">
                    <h2>Hình ảnh</h2>
                    <div class="create-recipe__item-content">
                        <input type="file"  accept="image/png, image/jpeg" multiple name="" id="create-recipe__image-input">
                        <label  class="create-recipe__image-label" for="create-recipe__image-input">
                            <i  class=" create-recipe__add-icon fa-solid fa-plus"></i>
                            <!-- <img src="./public/img/recipes/1.jpg" alt=""> -->
                        </label>
                    </div>
                    <div class="create-recipe__images-preview">
                        <i>Chưa có ảnh nào được chọn</i>
                    </div>
        
                </div>        
        </div>
        
        <div class="create-recipe__form-item">
            <h2>Thành phần </h2>
            <div class="create-recipe__stocks">
                <div class="create-recipe__stock">
                    <input  type="text" name=""  placeholder="Tên nguyên liệu " id="create-recipe__stock-name">  
                    <input  type="number" name="" placeholder="Số lượng " id="create-recipe__stock-quantity">  
                    <input  type="text" name="" placeholder="Đơn vị " id="create-recipe__stock-unit">  
                    <span class="create-recipe__stock-btn-delete">
                        <i class="fa-solid fa-circle-minus"></i>
                    </span>
                </div>
                <span class="create-recipe__stock-btn-add" >
                    <i class="create-recipe__add-icon create-recipe__stock-add-icon fa-solid fa-plus"></i>
                    Thêm thành phần
                </span>
            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Công thức </h2>
            <div class="create-recipe__stocks">
                <div class="create-recipe__stock">
                    <input  type="text" name=""  placeholder="Nội dung  " id="create-recipe__step-name">  
                    <input  type="number" name="" placeholder="Thời gian " id="create-recipe__step-time">  
                    <input  type="text" name="" placeholder="Đơn vị thời gian " id="create-recipe__step-unit">  
                    <span class="create-recipe__stock-btn-delete">
                        <i class="fa-solid fa-circle-minus"></i>
                    </span>
                </div>
                <span class="create-recipe__stock-btn-add" >
                    <i class="create-recipe__add-icon create-recipe__stock-add-icon fa-solid fa-plus"></i>
                    Thêm bước làm
                </span>
            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Khẩu phần </h2>
            <input  type="number" name=""  placeholder="Khẩu phần " id="create-recipe__ration">  

        </div>
        <div class="create-recipe__form-item">
            <h2>Ghi chú</h2>
            <input type="text" name="" id="create-recipe__note">
        </div>
        <button class = "btn btn-rounded create-recipe__btn-submit">Hoàn tất</button>
    </form>
</div>