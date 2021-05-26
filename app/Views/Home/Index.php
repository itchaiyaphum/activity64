<?= $this->extend('Layouts/Default/Layout') ?>

<?= $this->section('content') ?>
	<div class="row">
			<div class="col-md-6" style="margin-top: 10px;">
				<center><p style="font-size: 55px;"><strong>ระบบกิจกรรม</strong>
						<strong><p style="font-size: 58px; margin-top: -20px;">นักเรียน นักศึกษา</p></strong>
						<strong><p style="font-size: 22px; margin-top: -20px;">Chaiyaphum Technical Colleges</p></strong>
						<img src="<?php echo base_url('assets/img/homepage/homepage_landing.jpg');?>" class="rounded img-fluid">
				</center>
			</div>
			<div class="col-md-6" style="margin-top: 90px;">
				<div class="card">
					<div class="card-header">
						<strong>
							<p style="font-size: 40px;">สร้างบัญชีใหม่</p>
							<p style="font-size: 25px; margin-top: -20px;">ง่ายและเร็ว</p>
						</strong>
					</div>
					<div class="card-body">
						<form method="post">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user-lock"></i></span>
								</div>
										<input class="form-control" type="text" name="user_id" placeholder="รหัสครู"required>
							</div><br>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
										<select class="form-control" name="title">
											<option>นาย</option>
											<option>นาง</option>
											<option>นางสาว</option>
										</select>
										<input class="form-control" type="text" name="user_name" placeholder="ชื่อ" required>
										<input class="form-control" type="text" name="user_lastname" placeholder="นามสกุล" required>
							</div><br>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
										<input class="form-control" pattern=".{6,}" type="password" name="user_pass" placeholder="รหัสผ่าน"required>
							</div><br>
							<div class="input-group border-5">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
									</div>
										<input class="form-control" type="text" name="user_email" placeholder="Email" required>
								</div><br>
							
								<a href="<?php echo base_url('admin/teacheradvisor');?>" class="btn btn-info form-control">สมัคร</a>
						</form>
					</div>
				</div>
			</div>
	</div>
<?= $this->endSection() ?>