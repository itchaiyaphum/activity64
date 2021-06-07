<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('executive');?>">
		<a href="<?php echo base_url('executive'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('homeroom');?>">
		<a href="<?php echo base_url('executive/homeroom'); ?>"><span class="uk-icon-pie-chart"></span> ตรวจสอบการทำกิจกรรมโฮมรูม</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('report');?>">
		<a href="<?php echo base_url('executive/report'); ?>"><span class="uk-icon-pie-chart"></span> รายงานผลการทำกิจกรรมโฮมรูม</a>
	</li>
	<br/><br/>
</ul>