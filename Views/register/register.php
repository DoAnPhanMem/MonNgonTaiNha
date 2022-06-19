<!-- REGISTER -->
<?php
	$conn = mysqli_connect('localhost', 'root', '', 'monngon');

	if(isset($_POST['name'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$rPassword = $_POST['rPassword'];
		$phone = $_POST['phone'];

		$sql = "INSERT INTO nguoidung(username, email, password, sdt) VALUES ($name, $email, $password, $phone) ";
		$query = mysqli_query($conn, $query);
	}

	
?>

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

            <div class="register-text">
				<input type="text" placeholder="Họ và tên" type="submit" name="name" class="name-input" >
				<input type="password" placeholder="Mật khẩu" type="submit" name="password" class="pass1-input" >
                <input type="password" placeholder="Nhập lại mật khẩu" type="submit" name="rPassword" class="repass-input" >
				<input type="text" placeholder="Email" type="submit" name="email" class="mail-input" >
                <input type="tel" placeholder="SĐT" type="submit" name="phone" class="phone-input" >
			</div>

            <div class="btn-login-register">
				<button class="btn-register" type="submit" onclick="location.href='?act=home' " >
					Đăng ký
				</button>
			</div>

			
			<p class="account-register">Bạn đã có tài khoản ?<a href="?act=account">Đăng nhập</a> </p>

        </div>

	</div>
</div>