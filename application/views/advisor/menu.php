<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('advisor');?>">
		<a href="<?php echo base_url('advisor'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('homeroom');?>">
		<a href="<?php echo base_url('advisor/homeroom'); ?>"><span class="uk-icon-save"></span> บันทึกข้อมูลกิจกรรมโฮมรูม</a>
	</li>
	<br/><br/>
</ul>