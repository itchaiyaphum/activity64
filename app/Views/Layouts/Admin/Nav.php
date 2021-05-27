<?= $this->section('nav') ?>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
	<h5 class="my-0 mr-md-auto font-weight-normal"><a class="p-2" href="<?php echo base_url('');?>">ระบบกิจกรรมนักเรียน นักศึกษา</a></h5>
	<button type="button" class="navbar-toggle mobile-nav-toggle" >
		<i class="fa fa-bars"></i>
	</button>
  <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2" href="<?php echo base_url('admin/teacheradvisor');?>">นายอลงกรณ์ ภูคงคา</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo base_url('');?>">Logout</a>
</div>
<?= $this->endSection() ?>