<div class="col-sm-6">
				<div class="main-input padding60 new-customer" id="dangky">
					<div class="log-title">
						<h3><strong>Khách hàng mới</strong></h3>
					</div>
					<?php if (isset($_COOKIE['msg'])) { ?>
						<div class="alert alert-success">
							<strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
						</div>
					<?php } ?>
					<div class="custom-input">
						<form action="?act=account&handle=register-action" method="post" id="form2">
							<input type="text" name="Ho" placeholder="Họ.." required />
							<input type="text" name="Ten" placeholder="Tên.." required />
							<input type="text" name="TaiKhoan" placeholder="Tên tài khoản đăng nhập.." required  minlength="6"/>
							<input type="email" name="Email" placeholder="Địa chỉ Email.." required />
							<input type="text" name="SĐT" placeholder="Số điện thoại.." required pattern="[0-9]+" minlength="10" />
							<input type="password" name="MatKhau" placeholder="Mật khẩu" minlength="6" required />
							<input type="password" name="check_password" placeholder="Xác nhận mật khẩu" minlength="6" required />
							<div class="submit-text coupon">
								<button type="submit" form="form2">Đăng ký</button>
							</div>
						</form>
					</div>
				</div>
			</div>