
<?php
/* require_once("banner.php") */
?>
<!-- banner-end -->
<!-- tab-products section start -->
<div class="container">
    <div class="row">
        <div class="col-12 slide-header">
            <h5>Công thức nấu ăn hàng đầu trong ngày</h5>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="?act=detail&id=BD001">
                        <div class="d-flex d-block w-100">
                            <img height="240px" width="500px" class="d-block w-100 mr-5" src="public/img/home/slide.png" alt="First slide">
                            <div>
                                <h3>
                                    Khoai tây muối ớt
                                </h3>
                                <p class="carousel-text">
                                    Nếu có thứ gì tốt hơn một củ khoai tây nướng hoàn hảo, nó sẽ phải là một củ khoai
                                    tây
                                    nướng hai lần. Tôi chắc rằng tất cả mọi người Mẹ, Bà hoặc hàng xóm kế bên đều có
                                    công
                                    thức làm khoai tây nhồi đôi; cuối cùng, nếu bạn có thể nướng một củ khoai tây và làm
                                    khoai tây nghiền, bạn đã đi được nửa chặng đường
                                </p>
                            </div>
                        </div>
                    </a>
                    
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="row category my-3">
        <h5 class="col-12">Chủ đề</h5>
        <div class="main">
        <?php foreach ($chuDes as $chuDe) { ?>
            <div class="category-item">
                <img style="border-radius: 15px; object-fit: cover;" height="100px" width="100px" src="<?=$chuDe['HinhAnhChuDe']?>" alt="">
               <p class="category-name"> <a href="?act=category&category=<?=$chuDe['MaChuDe']?>" ><?=$chuDe['TenChuDe']?></a></p>
            </div>
            <?php } ?>
        </div>

    </div>
    <div class="row newest">
        <div class="col-12 newest-header">
            <h5 class="">Công thức nấu ăn tiêu biểu</h5>
        </div>
       
        <?php foreach ($newestItems as $newestItem) { ?>
        <div 
            class="col-lg-3 col-md-6 col-sm-12 newest-item">
            <img src="public/img/recipes/<?=$newestItem['HinhAnh']?>" height="150px" width="240px" alt="">
            <p class="newest-text"><?=$newestItem['TieuDe']?></p>
        </div>
        <?php } ?>
    </div>

</div>


<?php
// include_once("Views/quickview.php");
?>
<!-- quick view end -->