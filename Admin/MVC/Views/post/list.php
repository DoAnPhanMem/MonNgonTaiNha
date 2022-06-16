<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=post&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
      <th scope="col" style="width:6%">Mã bài đăng</th>
      <th scope="col" style="width:12%">Tên người dùng</th>
      <th scope="col" style="width:19%">Tiêu đề</th>
      <th scope="col" style="width:8%">Trạng thái</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <td><?= $row['MaBaiDang'] ?></td>
        <td><?= $row['hoTen'] ?></td>        
        <td><?= $row['TieuDe'] ?></td>
        <td><?= $row['TrangThai'] ?></td>
        <td style="width:17%">
          <a href="?mod=post&act=detail&id=<?= $row['MaBaiDang'] ?>" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=post&act=edit&id=<?= $row['MaBaiDang'] ?>" class="btn btn-warning">Sửa</a>
          <a href="?mod=post&act=delete&id=<?= $row['MaBaiDang'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
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