<!-- LOGIN -->
<div class="wrapper">
	<div class="container">
		<form action="?act=account&handle=login-action" method="POST">
			<div class="container-login">
				<p>
					<h2>Đăng nhập tài khoản của bạn</h2>
					<h5>Chào mừng bạn quay trở lại với Món Ngon</h5>
				</p>
				
				<button class="btn-facebook button">
					<i class="fa-brands fa-facebook-square"></i>
					Đăng ký bằng Facebook
				</button>
				
				<button class="btn-google button">
					<i class="fa-brands fa-google"></i>
					Đăng ký bằng Google
				</button>

				<div class="login-text">
					<input type="text" placeholder="Tên đăng nhập" name = "username" class="email-input" >
					<input type="password" placeholder="Mật khẩu" name = "pass" class="pass-input" >
					<a href="" >Quên mật khẩu ?</a>
				</div>

				<div class="btn-login-register">
					<button class="btn-login" type="submit" name="login" onclick="location.href='?act=home' ">
						Đăng nhập
					</button>
				</div>

				<p class="account-register">Bạn chưa có tài khoản ? <a href="?act=register">Đăng ký</a> </p>

			</div>

			<div class="container-img">
				<img src="public/img/Login_Register/Avatar_Login.jpg" alt="" class="img-login">
			</div>
		</form>
		

	</div>
</div>