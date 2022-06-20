<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=theme&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
      <th scope="col">Mã chủ đề</th>
      <th scope="col">Tên chủ đề</th>
      <th scope="col">Hình Ảnh</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?= $row['MaChuDe'] ?></td>
        <td><?= $row['TenChuDe'] ?></td>
        <td>
          <img src="../public/img/themes/<?= $row['HinhAnhChuDe'] ?>" height="60px">
        </td>
        <td>
          <a href="?mod=theme&act=detail&id=<?= $row['MaChuDe'] ?>" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=theme&act=edit&id=<?= $row['MaChuDe'] ?>" class="btn btn-warning">Sửa</a>
          <a href="?mod=theme&act=delete&id=<?= $row['MaChuDe'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
          <?php }?>
        </td>
      </tr>
    <?php } ?>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>