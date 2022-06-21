<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=theme&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="MaChuDe" value="<?= $data_detail['MaChuDe'] ?>">
        <div class="form-group">
            <label for="">Tên chủ đề</label>
            <input type="text" class="form-control" id="" placeholder="" name="name" value="<?=$data_detail['TenChuDe'] ?>">
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <img src="../public/img/themes/<?=$data_detail['HinhAnhChuDe']?>" height="200px" width="200px">
            <input type="file" class="form-control" id="" placeholder="" name="post-img" >
        </div>
       
        <div class="form-group">
            <label for="cars">Danh mục: </label>
            <select id="" name="MaChuDe" class="form-control">
                <?php foreach ($data as $row) { ?>
                    <option <?= ($data_detail['MaChuDe'] == $row['MaChuDe'] ) ? 'selected' : '' ?> value="<?= $row['MaChuDe'] ?>"> <?=$row['TenChuDe']?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</table>