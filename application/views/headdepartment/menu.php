<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('headdepartment');?>">
		<a href="<?php echo base_url('headdepartment'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('homeroom');?>">
		<a href="<?php echo base_url('headdepartment/homeroom'); ?>"><span class="uk-icon-save"></span> บันทึกข้อมูลกิจกรรมโฮมรูม</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('approving');?>">
		<a href="<?php echo base_url('headdepartment/approving'); ?>"><span class="uk-icon-legal"></span> รับรองการบันทึกกิจกรรมโฮมรูม</a>
	</li>
	<br/><br/>
</ul>