<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/font/fontawesome/css/all.css');?>">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark">
		<div class="container">
			<a href="#" class="navbar-brand" style="font-size: 28px;"><strong>ระบบกิจกรรมนักเรียน นักศึกษา</strong></a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapse1">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapse1">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<button class="btn btn-sm btn-warning" data-target="#mylogin" data-toggle="modal">เข้าสู่ระบบ</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>