<?= $this->extend('Layouts/Admin/Layout') ?>

<?= $this->section('content') ?>
<style>
.errorWrap {
	padding: 10px;
	margin: 0 0 20px 0;
	background: #fff;
	border-left: 4px solid #dd3d36;
	-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
}

.succWrap {
	padding: 10px;
	margin: 0 0 20px 0;
	background: #fff;
	border-left: 4px solid #5cb85c;
	-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
}
</style>
<div class="main-page">
	<div class="container-fluid">
		<div class="row page-title-div">
			<div class="col-md-6">
				<h2 class="title">User Change Profile</h2>
			</div>

		</div>
		<!-- /.row -->
		<div class="row breadcrumb-div">
			<div class="col-md-6">
				<ul class="breadcrumb">
					<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

					<li class="active">User change profile</li>
				</ul>
			</div>

		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->

	<section class="section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel">
						<div class="panel-heading">
							<div class="panel-title">
								<h5>User Change Profile</h5>
							</div>
						</div>


						<div class="panel-body">

							<form name="chngpwd" method="post" enctype="multipart/form-data">
								<div class="text-center">
									<label for="edit-profile" style="display: inline;"> <img
										style="width: 20%" class="rounded-circle"
										src="<?php echo $user_pic; ?>">
									</label>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label for="inputPrefix" class="text-success">คำนำหน้า</label> <select
											class="form-control" name="new_title" id="success1">
											<option selected style="display: none;">เลือกคำนำหน้า</option>
											<option>นาย</option>
											<option>นาง</option>
											<option>นางสาว</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="inputPrefix" class="text-success">ชื่อ</label>
										<input type="text" name="new_user_name" class="form-control"
											required="required" id="success2"
											value="<?php echo $user_name ?>">
									</div>
									<div class="form-group col-md-4">
										<label for="inputPrefix" class="text-success">นามสกุล</label>
										<input type="text" name="new_user_lastname"
											required="required" class="form-control" id="success3"
											value="<?php echo $user_lastname ?>">
									</div>
								</div>

								<div class="form-group has-success">
									<label for="success4" class="control-label">ตำแหน่ง : </label>
									<div class="">
										<input type="text" name="new_user_position"
											required="required" class="form-control" id="success4"
											value="<?php echo $user_position ?>">
									</div>
								</div>

								<div class="form-group has-success">
									<label for="success5" class="control-label">ตำแหน่งทางวิชาการ :
									</label>
									<div class="">
										<input type="text" name="new_technical_position"
											required="required" class="form-control" id="success5"
											value="<?php echo $technical_position ?>">
									</div>
								</div>

								<div class="form-group has-success">
									<label for="success6" class="control-label">ระดับ : </label>
									<div class="">
										<input type="text" name="new_position_level"
											required="required" class="form-control" id="success6"
											value="<?php echo $position_level ?>">
									</div>
								</div>

								<div class="form-group has-success">
									<label for="success7" class="control-label">ตำแหน่งหน้าที่พิเศษ
										: </label>
									<div class="">
										<input type="text" name="new_academic_position"
											class="form-control" id="success7"
											value="<?php echo $academic_position ?>">
									</div>
								</div>

								<div class="form-group has-success">
									<label for="success8" class="control-label">เบอร์โทรศัพท์ : </label>
									<div class="">
										<input type="text" name="new_user_tel" required="required"
											class="form-control" id="success8"
											value="<?php echo $user_tel ?>">
									</div>
								</div>



								<div class="form-group has-success">

									<div class="">
										<button type="submit" name="submit"
											class="btn btn-success btn-labeled">
											Change<span class="btn-label btn-label-right"><i
												class="fa fa-check"></i></span>
										</button>
									</div>
							
							</form>


						</div>
					</div>
				</div>
				<!-- /.col-md-8 col-md-offset-2 -->
			</div>
			<!-- /.row -->




		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.section -->

</div>
<?= $this->endSection() ?>
