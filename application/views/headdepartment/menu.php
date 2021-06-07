<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('headdepartment');?>">
		<a href="<?php echo base_url('headdepartment'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('advisor');?>">
		<a href="<?php echo base_url('headdepartment/advisor'); ?>"><span class="uk-icon-pie-chart"></span> จัดการครูที่ปรึกษาในแผนก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('homeroom');?>">
		<a href="<?php echo base_url('headdepartment/homeroom'); ?>"><span class="uk-icon-pie-chart"></span> รายละเอียดการกรอกข้อมูลกิจกรรม</a>
	</li>
	<br/><br/>
</ul>