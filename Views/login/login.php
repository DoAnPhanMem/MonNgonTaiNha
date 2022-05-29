<!-- pages-title-start -->
<div class="pages-title section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="pages-title-text text-center">
					<h2>Đăng nhập</h2>
					<ul class="text-left">
						<li><a href="?act=home">Trang chủ</a></li>
						<li><span> // </span>Đăng nhập</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- pages-title-end -->
<!-- login content section start -->
<section class="pages login-page section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="main-input padding60" id="dangnhap">
					<div class="log-title">
						<h3><strong>Khách hàng đã đăng ký</strong></h3>
					</div>
					<div class="login-text">
						<div class="custom-input">
							<p>Nếu bạn đã có tài khoản, vui lòng đăng nhập!</p>
							<?php if (isset($_COOKIE['msg1'])) { ?>
								<div class="alert alert-success">
									<strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
								</div>
							<?php } ?>
							<form action="?act=taikhoan&handle=dangnhap" method="post" id="form1">
								<input type="text" name="taikhoan" placeholder="Tài khoản" />
								<input type="password" name="matkhau" placeholder="Mật khẩu" />
								<a class="forget" href="#">Quên mật khẩu?</a>
								<div class="submit-text">
									<button name="submit" type="submit" form="form1">Đăng nhập</button>
								</div>
							</form>
							<h1>Nếu chưa có vui lòng đăng ký</h1>
							<a href="?act=account&handle=register">Đăng ký</a>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</section>
<!-- login content section end -->