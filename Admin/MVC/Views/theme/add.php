<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <?php if (isset($_COOKIE['msg'])) { ?>
        <div class="alert alert-warning">
            <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
        </div>
    <?php } ?>
    <form action="?mod=theme&act=create_action" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Tên chủ đề</label>
            <input type="text" class="form-control" id="" placeholder="" name="TenChuDe">
        </div>
        <div class="form-group">
            <label for="">Hình ảnh</label>
            <input type="file" class="form-control" id="" placeholder="" name="HinhAnhChuDe">
        </div>
        <!-- <div class="form-group">
            <label for="cars">Danh mục: </label>
            <select id="" name="MaChuDe" class="form-control">
                <?php foreach ($data as $row) { ?>
                    <option value="<?= $row['MaChuDe'] ?>"><?= $row['TenChuDe'] ?></option>
                <?php } ?>
            </select>
        </div> -->
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>