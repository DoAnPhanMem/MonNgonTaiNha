<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	<h2>Cập nhật thông tin tài khoản</h2>
    <form action="?mod=personal&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="maND" value="<?= $data['maND']?>">

			<div class="form-group">
               <label for="">Tên người dùng</label>
               <input type="text" class="form-control" id="" placeholder="Tên người dùng" >
           </div>
           
           <div class="form-group">
               <label for="">Tài Khoản</label>
               <input type="text" class="form-control" id="" placeholder="Tài khoản" >
           </div>
          
		   <div class="form-group">
               <label for="">Email</label>
               <input type="Email" class="form-control" id="" placeholder="Email" >
           </div>
           
           <div class="form-group">
               <label for="">Mật Khẩu</label>
               <input type="Password" class="form-control" id="" placeholder="Mật khẩu">
           </div>

		   <div class="form-group">
               <label for="">Nhập lại mật khẩu</label>
               <input type="text" class="form-control" id="" placeholder="Nhập lại mật khẩu" >
           </div>
          
           <button type="submit" class="btn  btn-primary btn-1">Hủy</button>
		   <button type="submit" class="btn btn-primary btn-2">Lưu</button>
    </form>
    </tbody>
</table>