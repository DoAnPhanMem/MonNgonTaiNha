<div class="create-recipe">
    <div class="create-recipe__top">
        <h1 class="create-recipe__title">Thêm Chủ Đề</h1>
        <hr />
    </div>
    <form method="POST" action="?act=personal&handle=create-theme-action" enctype="multipart/form-data" >
        <div class="create-recipe__form-item">
            <h2>Tên chủ đề </h2>
            <div class="create-recipe__item-content">
                <div class="create-recipe__theme-content">
                    <div class="create-recipe__themes-selected">
                    </div>
                    <?php
                        $themes = $data_themes;
                        ?>
                    <script> 
                        let isEdit = false;
                        var themes = <?php echo json_encode($themes) ?>;
                       
                    </script>
                    <div class="create-recipe__theme-search-group">
                        <i class="fa-solid create-recipe__theme-plus-icon fa-file-circle-plus"></i>
                        <input type="text" name = "post-name" placeholder="Thêm thẻ chủ đề ...." class="create-recipe__theme-input">
                    </div>
                    <div class="create-recipe__theme-results">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="create-recipe__form-item">
                    <div class="create-recipe__video">
                            <h2>Hình ảnh </h2>
                            <div class="create-recipe__item-content">
                                <input type="file" name="post-img" id="create-recipe__video-input" accept="image/png, image/jpeg">
                                <div class="create-recipe__video-group ">
                                    <label  class="create-recipe__video-label create-recipe__video-label--change" for="create-recipe__video-input">
                                        <i class="create-recipe__add-icon fa-solid fa-plus"></i>
                                        <i class="create-recipe__change-icon fa-solid fa-repeat"></i>
                                    </label>
                                    <img  src="" class="create-recipe__video-tag"></img>
                                </div>
                             

                            </div>
                    </div> 
        </div>
        <button class = "btn btn-rounded create-recipe__btn-submit">Hoàn tất</button>
    </form>
</div>
<script src="public/js/theme.js"></script>

