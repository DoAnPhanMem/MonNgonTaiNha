<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=post&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="MaBaiDang" value="<?= $data['MaBaiDang'] ?>">
        <div class="form-group">
            <label for="">Tên người dùng</label>
            <input type="text" class="form-control" id="" placeholder="" name="hoTen" value="<?=$data['hoTen'] ?>">
        </div>
        <div class="form-group">
            <label for="">Tiêu đề</label>
            <input type="text" class="form-control" id="" placeholder="" name="TieuDe"  value="<?=$data['TieuDe'] ?>">
        </div>
        
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</table>