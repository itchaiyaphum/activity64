<?php 
$profileData = $this->profile_lib->getData();
?>
<div class="uk-panel  uk-text-center">
	<img class="uk-border-circle" width="120" height="120" src="<?php echo $profileData->thumbnail;?>" alt="">
	<div class="uk-text-large uk-margin-top"><?php echo $profileData->firstname;?> <?php echo $profileData->lastname;?></div>
	<div><?php echo $profileData->email;?></div>
</div>
<hr />
<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="uk-nav-header">เมนูหลัก</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('profile');?>">
		<a href="<?php echo base_url('profile'); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('activity');?>">
		<a href="<?php echo base_url('profile/activity/'); ?>"><span class="uk-icon-book"></span> บันทึกการเรียน</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('time');?>">
		<a href="<?php echo base_url('profile/time/'); ?>"><span class="uk-icon-clock-o"></span> บันทึกเวลาเรียน</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMenu('evaluation');?>">
		<a href="<?php echo base_url('profile/evaluation/'); ?>"><span class="uk-icon-pie-chart"></span> สรุปผลการฝึกงาน</a>
	</li>
</ul>
<br/><br/>