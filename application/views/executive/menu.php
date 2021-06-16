<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('executive');?>">
		<a href="<?php echo base_url('executive'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('approving');?>">
		<a href="<?php echo base_url('executive/approving'); ?>"><span class="uk-icon-legal"></span> อนุมัติการส่งข้อมูลกิจกรรมโฮมรูม</a>
	</li>
	<br/><br/>
</ul>