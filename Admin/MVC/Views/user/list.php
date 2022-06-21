<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
<a href="?mod=user&act=add" type="button" class="btn btn-primary">Thêm mới</a>
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
      <th scope="col">MaND</th>
      <th scope="col">Tài khoản</th>
      <th scope="col">SDT</th>
      <th scope="col">Email</th>
      <th scope="col">Giới tính</th>
      <th scope="col">Quyền hạn</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data as $row) { ?>
      <tr>
        <th scope="row"><?= $row['maND'] ?></th>
        <td><?= $row['username'] ?></td>
        <td><?= $row['sdt'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['gioiTinh'] ?></td>
        <td>
          <?php
          if ($row['maQuyen'] == 2) {
            echo 'Quản trị viên';
          } else {
            if ($row['maQuyen'] == 1) {
              echo 'Khách thành viên';
            } else {
              echo 'Khách vãng lai';
            }
          }
          ?>
        </td>
        <td>
          <a href="?mod=user&act=detail&id=<?= $row['maND'] ?>" type="button" class="btn btn-success">Xem</a>
          <?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
          <a href="?mod=user&act=edit&id=<?= $row['maND'] ?>" type="button" class="btn btn-warning">Sửa</a>
          <a href="?mod=user&act=delete&id=<?= $row['maND'] ?>" onclick="return confirm('Bạn có thật sự muốn xóa ?');" type="button" class="btn btn-danger">Xóa</a>
          <?php }?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>