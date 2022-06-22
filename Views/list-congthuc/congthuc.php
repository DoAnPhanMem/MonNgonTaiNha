<div class="container mt-5">
    <div class="row">
        <?php foreach($products as $product) {?>
        <div class="col-3">
            <div class="cart">
                <img width="100%" height="150px" style="object-fit: cover;" src="public/img/Theme/<?=$product['HinhAnh']?>" alt="">
                <div class="content">
                    <p class="title"><?=$product['TieuDe']?></p>
                    <p class="post-by">Đăng bởi: <?=$product['hoTen']?></p>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>