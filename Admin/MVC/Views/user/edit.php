<?php if (isset($_COOKIE['msg'])) { ?>
    <div class="alert alert-success">
        <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
    </div>
<?php } ?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="?mod=personal&act=update" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="maND" value="<?= $data['maND']?>">
            <div class="form-group">
               <label for="">Họ và tên</label>
               <input type="text" class="form-control" id="" placeholder="" name="hoTen" value="<?= $data['hoTen']?>">
           </div>
           <div class="form-group">
               <label for="">Tên Tài Khoản</label>
               <input type="text" class="form-control" id="" placeholder="" name="username" value="<?= $data['username']?>">
           </div>
           <div class="form-group">
               <label for="">Giới tính</label>
               <select id="" name="gioiTinh" class="form-control">
                    <option <?= ($data['gioiTinh'] == 'Nam')?'selected':''?> value="Nam"> Nam</option>
                    <option <?= ($data['gioiTinh'] == 'Nữ')?'selected':''?> value="Nữ"> Nữ</option>
                    <option <?= ($data['gioiTinh'] == 'Khác')?'selected':''?> value="Khác"> Khác</option>
               </select>
           </div>
           <div class="form-group">
               <label for="">Số Điện Thoại</label>
               <input type="text" class="form-control" id="" placeholder="" name="sdt" value="<?= $data['sdt']?>">
           </div>
           <div class="form-group">
               <label for="">Địa chỉ</label>
               <input type="text" class="form-control" id="" placeholder="" name="diaChi" value="<?= $data['diaChi']?>">
           </div>
           <div class="form-group">
               <label for="">Mật Khẩu</label>
               <input type="Password" class="form-control" id="" placeholder="" name="password" value="<?= $data['password']?>">
           </div>
           <div class="form-group">
               <label for="">Trạng Thái</label>
               <input type="text" class="form-control" id="" placeholder="" name="trangThai" value="<?= $data['trangThai']?>">
           </div>
           <div class="form-group">
               <label for="">Email</label>
               <input type="Email" class="form-control" id="" placeholder="" name="email" value="<?= $data['email']?>">
           </div>
           <div class="form-group">
           <div class="form-group">
               <label for="">Mã quyền</label>
               <select id="" name="maQuyen" class="form-control">
                    <option <?= ($data['maQuyen'] == '1')?'selected':''?> value="1"> Khách thành viên</option>
                    <option <?= ($data['maQuyen'] == '2')?'selected':''?> value="2"> Quản trị viên</option>
                    <option <?= ($data['maQuyen'] == '3')?'selected':''?> value="3"> Khách vãng lai</option>
               </select>
           </div>
           </div>
           <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </tbody>
</table>