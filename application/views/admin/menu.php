<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('admin');?>">
		<a href="<?php echo base_url('admin'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<!-- 
	<li class="<?php echo $this->helper_lib->getActiveMenu('news');?>">
		<a href="<?php echo base_url('admin/news'); ?>"><span class="uk-icon-cube"></span> จัดการข่าวประกาศ</a>
	</li>
	-->
	<li><hr></li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('province');?>">
		<a href="<?php echo base_url('admin/province'); ?>"><span class="uk-icon-cube"></span> จัดการจังหวัด</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('edulevel');?>">
		<a href="<?php echo base_url('admin/edulevel'); ?>"><span class="uk-icon-cube"></span> จัดการระดับการศึกษา</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('edudegree');?>">
		<a href="<?php echo base_url('admin/edudegree'); ?>"><span class="uk-icon-cube"></span> จัดการวุฒิการศึกษา</a>
	</li>
	<li><hr></li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('semester');?>">
		<a href="<?php echo base_url('admin/semester'); ?>"><span class="uk-icon-cube"></span> จัดการภาคการศึกษา</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('course');?>">
		<a href="<?php echo base_url('admin/course'); ?>"><span class="uk-icon-cube"></span> จัดการรายวิชา</a>
	</li>
	<!-- 
	<li class="<?php echo $this->helper_lib->getActiveMenu('activity');?>">
		<a href="<?php echo base_url('admin/activity'); ?>"><span class="uk-icon-cube"></span> จัดการบันทึกการฝึกงาน</a>
	</li>
	 -->
	 <!-- 
	<li class="<?php echo $this->helper_lib->getActiveMenu('evaluation');?>">
		<a href="<?php echo base_url('admin/evaluation'); ?>"><span class="uk-icon-cube"></span> จัดการประเมินผล</a>
	</li>
	-->
	<li class="<?php echo $this->helper_lib->getActiveMenu('internship');?>">
		<a href="<?php echo base_url('admin/internship'); ?>"><span class="uk-icon-cube"></span> จัดการข้อมูลการฝึกงาน</a>
	</li>
	<li><hr></li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('college');?>">
		<a href="<?php echo base_url('admin/college'); ?>"><span class="uk-icon-cube"></span> จัดการสถานศึกษา</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('department');?>">
		<a href="<?php echo base_url('admin/department'); ?>"><span class="uk-icon-cube"></span> จัดการแผนกวิชา</a>
	</li>
	<!-- 
	<li class="<?php echo $this->helper_lib->getActiveMenu('group');?>">
		<a href="<?php echo base_url('admin/group'); ?>"><span class="uk-icon-cube"></span> จัดการกลุ่ม</a>
	</li>
	 -->
	<li class="<?php echo $this->helper_lib->getActiveMenu('company');?>">
		<a href="<?php echo base_url('admin/company'); ?>"><span class="uk-icon-cube"></span> จัดการสถานประกอบการ</a>
	</li>
	<li><hr></li>
	<li class="uk-nav-header">ผู้ใช้งาน</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('users');?>">
		<a href="<?php echo base_url('admin/users'); ?>"><span class="uk-icon-cube"></span> จัดการผู้ใช้งาน</a>
	</li>
	<!-- 
	<li class="<?php echo $this->helper_lib->getActiveMenu('student');?>">
		<a href="<?php echo base_url('admin/student'); ?>"><span class="uk-icon-cube"></span> จัดการนักศึกษา</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('advisor');?>">
		<a href="<?php echo base_url('admin/advisor'); ?>"><span class="uk-icon-cube"></span> จัดการอาจารย์ที่ปรึกษา</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('trainer');?>">
		<a href="<?php echo base_url('admin/trainer'); ?>"><span class="uk-icon-cube"></span> จัดการผู้ควบคุมฝึกงาน</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('staff');?>">
		<a href="<?php echo base_url('admin/staff'); ?>"><span class="uk-icon-cube"></span> จัดการเจ้าหน้าที่สถานศึกษา</a>
	</li>
	-->
	<li><hr></li>
	<!-- 
	<li class="<?php echo $this->helper_lib->getActiveMenu('survey');?>">
		<a href="<?php echo base_url('admin/survey'); ?>"><span class="uk-icon-cube"></span> จัดการแบบสำรวจความพึงพอใจ</a>
	</li>
	 -->
</ul>