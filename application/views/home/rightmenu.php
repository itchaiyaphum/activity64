<br/>
<ul class="tm-nav uk-nav" data-uk-nav="">
	<li class="<?php echo $this->helper_lib->getActiveMainMenu('');?>">
		<a href="<?php echo base_url(''); ?>"><span class="uk-icon-home"></span> หน้าหลัก</a>
	</li>
	<li class="<?php echo $this->helper_lib->getActiveMainMenu('contact');?>">
		<a href="<?php echo base_url('contact/'); ?>"><span class="uk-icon-comment-o"></span> ติดต่อเรา</a>
	</li>
</ul>

<br/>
<?php
if ($this->tank_auth->is_logged_in()) {
    $profileData = $this->profile_lib->getData(); ?>
<div class="uk-text-center">สวัสดี <?php echo $profileData->firstname; ?> <?php echo $profileData->lastname; ?></div>
<a class="uk-button uk-button-large uk-button-success uk-width-1-1" href="<?php echo base_url('profile'); ?>"><i class="uk-icon-user"></i> เข้าหน้าโปรไฟล์ของคุณ</a>

<br/>
<div class="uk-text-center">ต้องการออกจากระบบ กรุณากดปุ่ม</div>
<a class="uk-button uk-button-large uk-button-danger uk-width-1-1" href="<?php echo base_url('auth/logout'); ?>"><i class="uk-icon-lock"></i> ออกจากระบบ</a>
<?php
} else {
        ?>
<a class="uk-button uk-button-large uk-button-success uk-width-1-1" href="<?php echo base_url('auth/login'); ?>"><i class="uk-icon-lock"></i> ลงชื่อเข้าสู่ระบบ</a>
<?php
    } ?>
