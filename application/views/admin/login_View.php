<section id="form"><!--form-->
		<div class="container">
                    
        <div style="color: blue; font-weight: bold;"><?php echo $this->session->flashdata('success'); ?></div>
        <div style="color: red; font-weight: bold;"><?php echo $this->session->flashdata('fail'); ?></div>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
						<form action="<?php echo $base_url; ?>admin/signin" method="POST">
							<input type="text" placeholder="Tên đăng nhập" name="txtUser" />
							<input type="password" placeholder="Mật khẩu" name="txtPass" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ tài khoản
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Tạo tài khoản mới</h2>
						<form action="<?php echo $base_url; ?>admin/signin/add" method="POST">
						<div class="row">
							<div class="col-sm-4">
								<label style="padding-top: 10px">Tên đăng nhập: </label>
							</div>
							<div class="col-sm-8">
								<input type="text" placeholder="Tên đăng nhập" name="txtUser" required pattern="\^[a-zA-Z]+[a-zA-Z0-9]{5,33}\"/>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<label style="padding-top: 10px">Mật khẩu: </label>
							</div>
							<div class="col-sm-8">
								<input type="password" placeholder="Mật khẩu" name="txtPass" required pattern="\^[a-zA-Z]+[a-zA-Z0-9]{5,33}\" onmouseenter="showPass()" onmouseleave="hidePass()"/>
							</div>
						</div>	
						<div class="row">
							<div class="col-sm-4">
								<label style="padding-top: 10px">Email: </label>
							</div>
							<div class="col-sm-8">
								<input type="email" placeholder="Địa chỉ Email" name="txtEmail" />
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<label style="padding-top: 10px">Số điện thoại: </label>
							</div>
							<div class="col-sm-8">
								<input type="text" placeholder="Số điện thoại" name="txtPhone" required minlength="10" maxlength="11" pattern="\^0+[0-9]{9,10}\"/>
							</div>
						</div>
							
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->