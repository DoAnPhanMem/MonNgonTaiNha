<?php if(isset($data) and $data != null){ ?>
<a href="?mod=post&act=xetduyet&id=<?= $data['0']['MaBaiDang'] ?>" class="btn btn-success">Duyệt bài đăng</a>
<a href="?mod=post&act=delete&id=<?= $data['0']['MaBaiDang'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
<?php } ?>
<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">Video</th>
            <th scope="col">Tiêu đề</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Trạng thái</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row) { ?>
            <tr>
                <td><?= $row['Video'] ?></td>
                <td><?= $row['TieuDe'] ?></td>
                <td><?= $row['MoTa'] ?></td>
                <td><?= $row['TrangThai'] ?></td>
            </tr>
        <?php } ?>
</table>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>