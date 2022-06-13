<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
    <?php if (isset($_COOKIE['msg'])) { ?>
        <div class="alert alert-warning">
            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
        </div>
    <?php } ?>

    <form action="" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Mã bài đăng</label>
            <input type="text" class="form-control" id="" placeholder="" name="MaBaiDang">
        </div>
        <div class="form-group">
            <label for="">Tên người dùng</label>
            <input type="text" class="form-control" id="" placeholder="" name="hoTen">
        </div>
        <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" class="form-control" id="" placeholder="" name="TieuDe">
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <input type="text" class="form-control" id="" placeholder="" name="TrangThai">
        </div>
    </form>
</table>