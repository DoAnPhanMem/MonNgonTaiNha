<!-- REGISTER -->
<div class="wrapper">
	<div class="container-2">    
        <div class="container-img-register">
            <img src="public/img/Login_Register/Avatar_Register.jpg" alt="" class="img-register">
		</div>

        <div class="container-register">
            <p>
				<h2 class="myAccount">Tạo tài khoản của bạn</h2>
				<h4 class="homeFood">Chào mừng bạn đến với Homefood</h4>
			</p>
		<form method="POST" action="?act=account&handle=register-action">
            <div class="register-text">
				<input required type="text" placeholder="Họ và tên"  name="name" class="name-input" >
				<input required type="text" placeholder="Tên đăng nhập"  name="username" class="name-input" >
				<input required type="password" placeholder="Mật khẩu"  name="pass" class="pass1-input" >
                <input required type="password" placeholder="Nhập lại mật khẩu"  name="pass-again" class="repass-input" >
				<input required type="email" placeholder="Email"  name="email" class="mail-input" >
			</div>

            <div class="btn-login-register">
				<button class="btn-register" type="submit" name="register">
					Đăng ký
				</button>
			</div>
		</form>
			
			<p class="account-register">Bạn đã có tài khoản ?<a href="?act=account">Đăng nhập</a> </p>

        </div>

	</div>
</div>