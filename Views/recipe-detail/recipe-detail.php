<!-- pages-title-start -->

<div class="grid wide">
    <div class="row">
        <div class="l-10 l-o-1">
        <div class="recipe-detail">
            <div class="recipe-detail__top">
                <h1 class="recipe-detail__title"><?= $data_recipe[0]['TieuDe'] ?></h1>
                <p class="recipe-detail-time"><?= $data_recipe[0]['Ngay']  ?></p>
                <hr />
            </div>
            <div>
                <div class="recipe-detail__theme">
                    <h2 class="recipe-detail__theme-title">Ẩm thực : </h2>
                    <?php
                    $description = "";
                    foreach ($recipe_themes as $key => $value) {
                        $description .= $value['TenChuDe'] . ", ";
                    }?>
                    <p class="recipe-detail__theme-item"><i> <?= trim($description, ", ") ?></i></p>
                </div>
                <div class="recipe-detail__img">
                    <div class="recipe-detail__img-view">
                        <?php foreach ($recipe_imgs as $key => $value) { ?>
                            <img class="<?= $value['HinhAnh'] == $recipe_imgs[0]['HinhAnh'] ? 'active' : ''  ?>" src="./public/img/recipes/<?= $value['HinhAnh'] ?>" alt="" />
                        <?php } ?>
                    </div>
                    <div class="recipe-detail__img-list">
                        <?php foreach ($recipe_imgs as $key => $value) { ?>
                            <div class="recipe-detail__img-item">
                                <img class="active" src="./public/img/recipes/<?= $value['HinhAnh'] ?>" alt="" />
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php
                    if ($data_recipe[0]['Video'] != '') { ?>
                        <div class="recipe-detail__video">
                            <div class="recipe-detail__item-content">
                                <?php if (isset($data_recipe[0]['Video']) && $data_recipe[0]['Video'] != '' && $data_recipe[0]['Video'] != NUll) { ?>
                                    <video controls src="./public/videos/recipes/<?= $data_recipe[0]['Video'] ?>" class="recipe-detail__video-tag"></video>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                <div class="recipe-detail__time-cooking">
                    <p> <strong>Thời gian nấu :</strong> <?= $data_recipe[0]['ThoiGian'] ?></p>
                    <p> <strong>Khẩu phần : </strong><?= $data_recipe[0]['KhauPhan'] ?> </p>
                </div>
            </div>

            <div class="recipe-detail__form-item">
                <div class="recipe-detail__description">
                        <h2> <strong>Mô tả</strong> </h2>
                        <p class="recipe-detail__description"><?= trim($data_recipe[0]['MoTa']) ?></p>
                </div>
            </div>

            <div class="recipe-detail__form-item">
                <h2> <strong>Nguyên liệu </strong></h2>
                <div class="recipe-detail__stock-list">
                    <?php foreach ($recipe_stocks as $key => $value) { ?>
                        <div class="recipe-detail__stock data-index-stock = <?= $key ?>">
                            <p>
                                <?= $value['SoLuong'] ?>
                                <?= $value['DonVi'] ?>
                                <?= $value['TenNguyenLieu'] ?>
                            <p>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="recipe-detail__form-item">
                <h2> <strong>Công thức</strong> </h2>

                <div class="recipe-detail__step-list">

                    <?php foreach ($recipe_steps as $key => $value) {

                    ?>
                        <div class="recipe-detail__step data-index-step= <?= $key ?>">
                            <h3 class="recipe-detail__step-title">Bước <?= $key + 1 ?></h3>
                            <div class="recipe-detail__step-content">
                                <p>Thời gian: <span><?= $value['ThoiGian'] ?></span></p>
                                <p><?= $value["NoiDung"] ?> </p>
                            </div>

                        </div>

                    <?php } ?>
                </div>
            </div>

            <div class="recipe-detail__form-item">
                <h2> <strong>Ghi chú</strong></h2>
                <div class="recipe-detail__step-content">
                    <p><?= $data_recipe[0]['GhiChu'] ?> </p>
                </div>

            </div>
            <div class="recipe-detail__form-item">
                <h2><strong>Nhận xét</strong></h2>
                <?php
                require_once("comment.php");
                ?>
            </div>
            <?php

            //ĐỪng xóa trong cái này
            if (isset($_GET['status'])) {
                $status = ($_GET['status']);
                if ($status == 'n' || $status == 'e') {  ?>
                    <div class="action-approval">
                        <a href="admin/?mod=post&act=approval&status=y&id=<?= $data_recipe[0]['MaBaiDang'] ?>" onclick="return confirm('Công thức này sẽ được hiển thi trên trang web ?');" class="btn detail-recipe-btn__accept">Duyệt</a>
                    <?php }
                if ($status != 'e') { ?>

                        <form action="admin/?mod=post&act=approval&status=e&id=<?= $data_recipe[0]['MaBaiDang'] ?>" method="post">
                            <div class="toast-question-eject">
                                <h3 class="question-eject-title">Lý do từ chối : </h3>
                                <textarea class="question-eject-content" required name="post-reason" id="" cols="50" rows="10" placeholder="Nhập lý do"></textarea>
                                <button class="btn  detail-recipe-btn__eject-action">Xác Nhận</button>
                                <button class="btn btn-gray detail-recipe-btn__eject-exit">Hủy</button>
                            </div>
                        </form>

                        <button class="btn btn-primary-eject  detail-recipe-btn__eject">Từ chối</button>
                    <?php } ?>
                    </div>
                <?php  } ?>
                <!-- ĐỪng xóa cái này -->

        </div>
        </div>
       
    </div>

</div>


</div>
<!-- ĐỪng xóa cái này -->
<script src="./public/js/detail-recipe.js"></script>
<!-- ĐỪng xóa cái này -->