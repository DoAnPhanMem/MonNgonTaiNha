
<a href="?mod=post&status=y " type="button" style="background : <?= $_GET['status'] == 'y'?'#888' : ''?>" class="btn btn-primary">Đã duyệt</a>
<a href="?mod=post&status=n" type="button" style="background : <?= $_GET['status'] == 'n'?'#888' : ''?>" class="btn btn-primary">Chưa duyệt</a>
<a href="?mod=post&status=e" type="button" style="background : <?= $_GET['status'] == 'e'?'#888' : ''?>" class="btn btn-primary">Đã từ chối</a>
<?php if (isset($_SESSION['isLogin_Admin']) && $_SESSION['isLogin_Admin'] == true) { ?>
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
      <th scope="col" style="width:4%">ID</th>
      <th scope="col" style="width:12%">Người đăng</th>
      <th scope="col" style="width:19%">Tiêu đề</th>
      <th scope="col" style="width:4%">Lượt xem</th>
      <th scope="col" style="width:14%">Thời gian</th>
      <th scope="col" style="width:8%">Trạng thái</th>
      <?= $_GET['status'] == 'e'? '<th scope="col" style="width:20%">Lý do</th>':''?>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data_post as $row) { ?>
      <tr>
        <td><?= $row['MaBaiDang'] ?></td>
        <td><?= $row['hoTen'] ?></td>         
        <td><?= $row['TieuDe'] ?></td>
        <td><?= $row['LuotXem'] ?></td>
        <td><?= $row['NgayCapNhat'] ?></td>
        <td><?= $row['TrangThai'] ?></td>
        <?= $_GET['status'] == 'e'? "<td>". $row['LyDo']  ."</td>":''?>
        <td style="width:17%">
          <a href="../index.php?act=detail&id=<?= $row['MaBaiDang'] ?>&status=<?= $_GET['status']?>" class="btn btn-success">Xem chi tiết</a>
        </td>
      </tr>
    <?php } ?>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>