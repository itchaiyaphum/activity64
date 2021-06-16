<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('headadvisor');?>">
		<a href="<?php echo base_url('headadvisor'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('homeroom');?>">
		<a href="<?php echo base_url('headadvisor/homeroom'); ?>"><span class="uk-icon-pie-chart"></span> จัดการตารางโฮมรูม</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('users');?>">
		<a href="<?php echo base_url('headadvisor/users'); ?>"><span class="uk-icon-pie-chart"></span> จัดการข้อมูลครูที่ปรึกษา</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('advisorgroup');?>">
		<a href="<?php echo base_url('headadvisor/advisorgroup'); ?>"><span class="uk-icon-pie-chart"></span> จัดการครูที่ปรึกษาประจำกลุ่ม</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('approving');?>">
		<a href="<?php echo base_url('headadvisor/approving'); ?>"><span class="uk-icon-pie-chart"></span> อนุมัติการส่งข้อมูลกิจกรรมโฮมรูม</a>
	</li>
	<br/><br/>
</ul>