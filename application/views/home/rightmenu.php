<?php 
if($this->tank_auth->is_logged_in()){ 
    $profileData = $this->profile_lib->getData();
?>
<div class="uk-text-center">สวัสดี <?php echo $profileData->firstname;?> <?php echo $profileData->lastname;?></div>
<a class="uk-button uk-button-large uk-button-success uk-width-1-1" href="<?php echo base_url('profile/activity');?>"><i class="uk-icon-user"></i> เข้าหน้าโปรไฟล์ของคุณ</a>

<br/><br/><br/>
<div class="uk-text-center">ต้องการออกจากระบบ กรุณากดปุ่ม</div>
<a class="uk-button uk-button-large uk-button-danger uk-width-1-1" href="<?php echo base_url('auth/logout');?>"><i class="uk-icon-lock"></i> ออกจากระบบ</a>
<?php
}else{
?>
<div class="uk-text-center">เป็นสมาชิกแล้ว กรุณากดปุ่ม</div>
<a class="uk-button uk-button-large uk-button-success uk-width-1-1" href="<?php echo base_url('auth/login');?>"><i class="uk-icon-lock"></i> ลงชื่อเข้าสู่ระบบ</a>

<br/><br/><br/>
<div class="uk-text-center">ถ้ายังไม่ได้เป็นสมาชิก กรุณากดปุ่ม</div>
<a class="uk-button uk-button-large uk-button-primary uk-width-1-1" href="<?php echo base_url('auth/register');?>"><i class="uk-icon-plus"></i> สมัครสมาชิกใหม่</a>
<?php } ?>