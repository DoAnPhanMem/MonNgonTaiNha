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
                        <?php
                        $themes_select = array(
                            '1' =>   'bánh',
                            '2'  =>  'món âu'
                        );
                        foreach ($themes_select as  $key => $value) { ?>
                            <div class="create-recipe__theme-item">
                                <p><?php echo $value ?></p>
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="create-recipe__theme-search-group">
                        <i class="fa-solid create-recipe__theme-plus-icon fa-file-circle-plus"></i>
                        <input type="text" placeholder="Thêm thẻ chủ đề ...." class="create-recipe__theme-input">
                    </div>


                    <div class="create-recipe__theme-results">
                        <?php $themes = array(
                            'MaLSP' =>   'bánh',
                            'TenSP'  =>  'món âu'
                        );
                        foreach ($themes as  $key => $value) { ?>
                            <p class="create-recipe__search-theme-item"> <?php echo $value ?> </p>
                        <?php  } ?>
                    </div>
                </div>


            </div>
        </div>
        <div class="create-recipe__form-item">
            <h2>Tên công thức </h2>
            <div class="create-recipe__item-content">
                <input type="text" name="" id="">  
            </div>
                
        </div>
        <div class="create-recipe__form-item">
                <div class="create-recipe__form-row">
                    <div >
                        <div class="create-recipe__description">
                            <h2>Mô tả </h2>
                            <div class="create-recipe__item-content">
                                <textarea name="" id="create-recipe__description" cols="30" rows="10">

                                </textarea>
                            </div>
                            
                        </div>
                    </div>
                    <div >
                        <div class="create-recipe__video">
                            <h2>Video </h2>
                            <div class="create-recipe__item-content">
                                <input type="file" name="" id="create-recipe__video-input">
                            </div>
                            
                        </div> 
                    </div>
                </div>
                <div class="create-recipe__images">
                    <h2>Hình ảnh</h2>
                    <div class="create-recipe__item-content">
                        <input type="file" name="" id="create-recipe__image-input">
                    </div>
                    
                </div>        
            </div>
    </form>
</div>