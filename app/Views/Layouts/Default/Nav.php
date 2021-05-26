
<?= $this->section('nav') ?>
	<nav class="navbar navbar-expand-md navbar-dark">
		<div class="container">
			<a href="<?php echo base_url('');?>" class="navbar-brand" style="font-size: 28px;"><strong>ระบบกิจกรรมนักเรียน นักศึกษา</strong></a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapse1">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapse1">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a href="<?php echo base_url('admin/teacheradvisor');?>" class="btn btn-sm btn-warning">เข้าสู่ระบบ</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
<?= $this->endSection() ?>