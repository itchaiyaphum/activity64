<?php
$profile = $this->profile_lib->getData();

$firstname = array(
	'name'	=> 'firstname',
	'id'	=> 'firstname',
    'value'	=> $profile->firstname,
);
$lastname = array(
	'name'	=> 'lastname',
	'id'	=> 'lastname',
    'value'	=> $profile->lastname,
);
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> $profile->email,
	'size'	=> 30,
);
$firstname_en = array(
	'name'	=> 'firstname_en',
	'id'	=> 'firstname_en',
	'value'	=> $profile->firstname_en,
);
$lastname_en = array(
	'name'	=> 'lastname_en',
	'id'	=> 'lastname_en',
	'value'	=> $profile->lastname_en,
);
$student_id = array(
	'name'	=> 'student_id',
	'id'	=> 'student_id',
	'value'	=> $profile->student_id,
);
$college_id = array(
	'name'	=> 'college_id',
	'id'	=> 'college_id',
	'value'	=> $profile->college_id,
);
$department_id = array(
	'name'	=> 'department_id',
	'id'	=> 'department_id',
	'value'	=> $profile->department_id,
);
$major_title = array(
	'name'	=> 'major_title',
	'id'	=> 'major_title',
	'value'	=> $profile->major_title,
);
$group_title = array(
	'name'	=> 'group_title',
	'id'	=> 'group_title',
	'value'	=> $profile->group_title,
);
$edulevel = array(
	'name'	=> 'edulevel',
	'id'	=> 'edulevel',
	'value'	=> $profile->edulevel,
);
$religion_title = array(
	'name'	=> 'religion_title',
	'id'	=> 'religion_title',
	'value'	=> $profile->religion_title,
);
$dob = array(
	'name'	=> 'dob',
	'id'	=> 'dob',
	'value'	=> $profile->dob,
    'data-uk-datepicker' => "{format:'YYYY-MM-DD'}"
);
$age = array(
	'name'	=> 'age',
	'id'	=> 'age',
	'value'	=> $profile->age,
);
$congenital_disease = array(
	'name'	=> 'congenital_disease',
	'id'	=> 'congenital_disease',
	'value'	=> $profile->congenital_disease,
);
$drug_allergy = array(
	'name'	=> 'drug_allergy',
	'id'	=> 'drug_allergy',
	'value'	=> $profile->drug_allergy,
);
$blood_type = array(
	'name'	=> 'blood_type',
	'id'	=> 'blood_type',
	'value'	=> $profile->blood_type,
);

$hometown_no = array(
	'name'	=> 'hometown_no',
	'id'	=> 'hometown_no',
	'value'	=> $profile->hometown_no,
);
$hometown_moo = array(
	'name'	=> 'hometown_moo',
	'id'	=> 'hometown_moo',
	'value'	=> $profile->hometown_moo,
);
$hometown_subdistrict = array(
	'name'	=> 'hometown_subdistrict',
	'id'	=> 'hometown_subdistrict',
	'value'	=> $profile->hometown_subdistrict,
);
$hometown_district = array(
	'name'	=> 'hometown_district',
	'id'	=> 'hometown_district',
	'value'	=> $profile->hometown_district,
);
$hometown_province = array(
	'name'	=> 'hometown_province',
	'id'	=> 'hometown_province',
	'value'	=> $profile->hometown_province,
);
$hometown_postcode = array(
	'name'	=> 'hometown_postcode',
	'id'	=> 'hometown_postcode',
	'value'	=> $profile->hometown_postcode,
);
$hometown_mobile = array(
	'name'	=> 'hometown_mobile',
	'id'	=> 'hometown_mobile',
	'value'	=> $profile->hometown_mobile,
);
$current_address_no = array(
	'name'	=> 'current_address_no',
	'id'	=> 'current_address_no',
	'value'	=> $profile->current_address_no,
);
$current_address_moo = array(
	'name'	=> 'current_address_moo',
	'id'	=> 'current_address_moo',
	'value'	=> $profile->current_address_moo,
);
$current_address_subdistrict = array(
	'name'	=> 'current_address_subdistrict',
	'id'	=> 'current_address_subdistrict',
	'value'	=> $profile->current_address_subdistrict,
);
$current_address_district = array(
	'name'	=> 'current_address_district',
	'id'	=> 'current_address_district',
	'value'	=> $profile->current_address_district,
);
$current_address_province = array(
	'name'	=> 'current_address_province',
	'id'	=> 'current_address_province',
	'value'	=> $profile->current_address_province,
);
$current_address_postcode = array(
	'name'	=> 'current_address_postcode',
	'id'	=> 'current_address_postcode',
	'value'	=> $profile->current_address_postcode,
);
$current_address_mobile = array(
	'name'	=> 'current_address_mobile',
	'id'	=> 'current_address_mobile',
	'value'	=> $profile->current_address_mobile,
);

$experience_work = array(
	'name'	=> 'experience_work',
	'id'	=> 'experience_work',
	'value'	=> $profile->experience_work,
);
$experience_skill = array(
	'name'	=> 'experience_skill',
	'id'	=> 'experience_skill',
	'value'	=> $profile->experience_skill,
);
$experience_intesting = array(
	'name'	=> 'experience_intesting',
	'id'	=> 'experience_intesting',
	'value'	=> $profile->experience_intesting,
);
$experience_status = array(
	'name'	=> 'experience_status',
	'id'	=> 'experience_status',
	'value'	=> $profile->experience_status,
);
$experience_marry_name = array(
	'name'	=> 'experience_marry_name',
	'id'	=> 'experience_marry_name',
	'value'	=> $profile->experience_marry_name,
);
$experience_marry_cocupation = array(
	'name'	=> 'experience_marry_cocupation',
	'id'	=> 'experience_marry_cocupation',
	'value'	=> $profile->experience_marry_cocupation,
);
$emergency_name = array(
	'name'	=> 'emergency_name',
	'id'	=> 'emergency_name',
	'value'	=> $profile->emergency_name,
);
$emergency_address = array(
	'name'	=> 'emergency_address',
	'id'	=> 'emergency_address',
	'value'	=> $profile->emergency_address,
);
$emergency_mobile = array(
	'name'	=> 'emergency_mobile',
	'id'	=> 'emergency_mobile',
	'value'	=> $profile->emergency_mobile,
);


$attributes = array('class' => 'uk-form uk-form-horizontal', 'id' => 'loginform', 'method'=>'post');
?>
<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php $this->load->view('settings/menu');?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
            <div class="uk-height-1-1 uk-margin-large-bottom">
            
            	<?php echo form_open_multipart($this->uri->uri_string(), $attributes); ?>
           	 		<div class="uk-grid">
           	 			<div class="uk-width-1-2">
                        	<h3><u>ข้อมูลพื้นฐานทั่วไป</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("อีเมล์", $email['id']); ?></label>
                                <div class="uk-form-controls">
                                    <?php echo form_input($email); ?>
                                	<div>
                                    	<?php echo form_error($email['name']); ?>
                                    	<?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ชื่อ", $firstname['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($firstname); ?>
                                	<div>
                                    	<?php echo form_error($firstname['name']); ?>
                                    	<?php echo isset($errors[$firstname['name']])?$errors[$firstname['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("นามสกุล", $lastname['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($lastname); ?>
                                	<div>
                                    	<?php echo form_error($lastname['name']); ?>
                                    	<?php echo isset($errors[$lastname['name']])?$errors[$lastname['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ชื่อ (ภาษาอังกฤษ)", $firstname_en['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($firstname_en); ?>
                                	<div>
                                    	<?php echo form_error($firstname_en['name']); ?>
                                    	<?php echo isset($errors[$firstname_en['name']])?$errors[$firstname_en['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("นามสกุล (ภาษาอังกฤษ)", $lastname_en['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($lastname_en); ?>
                                	<div>
                                    	<?php echo form_error($lastname_en['name']); ?>
                                    	<?php echo isset($errors[$lastname_en['name']])?$errors[$lastname_en['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("รหัสประจำตัวนักศึกษา", $student_id['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($student_id); ?>
                                	<div>
                                    	<?php echo form_error($student_id['name']); ?>
                                    	<?php echo isset($errors[$student_id['name']])?$errors[$student_id['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" >สถานศึกษา</label>
                                <div class="uk-form-controls">
                                    <select name="college_id" id="college_id">
                                	<option value="0">--- เลือกสถานศึกษา ---</option>
                                    <?php 
                                    for($i=0; $i<count($colleges); $i++){
                                        $college = $colleges[$i];
                                        ?>
                                        <option value="<?php echo $college->id;?>" <?php echo ($profile->college_id==$college->id)?' selected="selected" ':'';?>><?php echo $college->name;?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" >แผนก/สาขา</label>
                                <div class="uk-form-controls">
                                    <select name="department_id" id="department_id">
                                	<option value="0">--- เลือกแผนก/สาขา ---</option>
                                    <?php 
                                    for($i=0; $i<count($departments); $i++){
                                        $department = $departments[$i];
                                        ?>
                                        <option value="<?php echo $department->id;?>" <?php echo ($profile->department_id==$department->id)?' selected="selected" ':'';?>><?php echo $department->name;?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <!-- 
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("สาขาวิชา", $major_title['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($major_title); ?>
                                	<div>
                                    	<?php echo form_error($major_title['name']); ?>
                                    	<?php echo isset($errors[$major_title['name']])?$errors[$major_title['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("กลุ่ม", $group_title['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($group_title); ?>
                                	<div>
                                    	<?php echo form_error($group_title['name']); ?>
                                    	<?php echo isset($errors[$group_title['name']])?$errors[$group_title['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                             -->
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ระดับ", $edulevel['id']); ?></label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label><input type="radio" name="edulevel" value="1" <?php echo ($profile->edulevel==1)?' checked="checked" ':'';?>> ปวช.</label>
                                    <label><input type="radio" name="edulevel" value="2" <?php echo ($profile->edulevel==2)?' checked="checked" ':'';?>> ปวส. (ปกติ)</label>
                                    <label><input type="radio" name="edulevel" value="3" <?php echo ($profile->edulevel==3)?' checked="checked" ':'';?>> ปวส. (ม.6)</label>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ศาสนา", $religion_title['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($religion_title); ?>
                                	<div>
                                    	<?php echo form_error($religion_title['name']); ?>
                                    	<?php echo isset($errors[$religion_title['name']])?$errors[$religion_title['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("วัน/เดือน/ปี เกิด", $dob['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($dob); ?>
                                	<div>
                                    	<?php echo form_error($dob['name']); ?>
                                    	<?php echo isset($errors[$dob['name']])?$errors[$dob['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("อายุ", $age['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($age); ?>
                                	<div>
                                    	<?php echo form_error($age['name']); ?>
                                    	<?php echo isset($errors[$age['name']])?$errors[$age['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("โรคประจำตัว", $congenital_disease['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($congenital_disease); ?>
                                	<div>
                                    	<?php echo form_error($congenital_disease['name']); ?>
                                    	<?php echo isset($errors[$congenital_disease['name']])?$errors[$congenital_disease['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ยาที่แพ้", $drug_allergy['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($drug_allergy); ?>
                                	<div>
                                    	<?php echo form_error($drug_allergy['name']); ?>
                                    	<?php echo isset($errors[$drug_allergy['name']])?$errors[$drug_allergy['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("หมู่โลหิต", $blood_type['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($blood_type); ?>
                                	<div>
                                    	<?php echo form_error($blood_type['name']); ?>
                                    	<?php echo isset($errors[$blood_type['name']])?$errors[$blood_type['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <h3><u>ความรู้และประสบการณ์</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ประสบการณ์ในการทำงาน", $experience_work['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($experience_work); ?>
                                	<div>
                                    	<?php echo form_error($experience_work['name']); ?>
                                    	<?php echo isset($errors[$experience_work['name']])?$errors[$experience_work['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ความรู้ความสามารถพิเศษ", $experience_skill['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($experience_skill); ?>
                                	<div>
                                    	<?php echo form_error($experience_skill['name']); ?>
                                    	<?php echo isset($errors[$experience_skill['name']])?$errors[$experience_skill['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ความสนใจพิเศษ", $experience_intesting['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($experience_intesting); ?>
                                	<div>
                                    	<?php echo form_error($experience_intesting['name']); ?>
                                    	<?php echo isset($errors[$experience_intesting['name']])?$errors[$experience_intesting['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("สถานภาพ", $experience_status['id']); ?></label>
                                <div class="uk-form-controls uk-form-controls-text">
                                    <label><input type="radio" name="experience_status" value="1" <?php echo ($profile->experience_status==1)?' checked="checked" ':'';?>> โสด</label>
                                    <label><input type="radio" name="experience_status" value="2" <?php echo ($profile->experience_status==2)?' checked="checked" ':'';?>> สมรส</label>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ชื่อสามี/ภรรยา", $experience_marry_name['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($experience_marry_name); ?>
                                	<div>
                                    	<?php echo form_error($experience_marry_name['name']); ?>
                                    	<?php echo isset($errors[$experience_marry_name['name']])?$errors[$experience_marry_name['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("อาชีพ", $experience_marry_cocupation['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($experience_marry_cocupation); ?>
                                	<div>
                                    	<?php echo form_error($experience_marry_cocupation['name']); ?>
                                    	<?php echo isset($errors[$experience_marry_cocupation['name']])?$errors[$experience_marry_cocupation['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <h3><u>กรณีฉุกเฉิน (บุคคลที่สามารถติดต่อได้)</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ชื่อ-สกุล", $emergency_name['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($emergency_name); ?>
                                	<div>
                                    	<?php echo form_error($emergency_name['name']); ?>
                                    	<?php echo isset($errors[$emergency_name['name']])?$errors[$emergency_name['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ที่อยู่", $emergency_address['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($emergency_address); ?>
                                	<div>
                                    	<?php echo form_error($emergency_address['name']); ?>
                                    	<?php echo isset($errors[$emergency_address['name']])?$errors[$emergency_address['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("เบอร์โทรศัพท์", $emergency_mobile['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($emergency_mobile); ?>
                                	<div>
                                    	<?php echo form_error($emergency_mobile['name']); ?>
                                    	<?php echo isset($errors[$emergency_mobile['name']])?$errors[$emergency_mobile['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                		</div>
                		<div class="uk-width-1-2">
                			<h3><u>ภูมิลำเนาเดิม</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("บ้านเลขที่", $hometown_no['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($hometown_no); ?>
                                	<div>
                                    	<?php echo form_error($hometown_no['name']); ?>
                                    	<?php echo isset($errors[$hometown_no['name']])?$errors[$hometown_no['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("หมู่ที่", $hometown_moo['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($hometown_moo); ?>
                                	<div>
                                    	<?php echo form_error($hometown_moo['name']); ?>
                                    	<?php echo isset($errors[$hometown_moo['name']])?$errors[$hometown_moo['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ตำบล/แขวง", $hometown_subdistrict['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($hometown_subdistrict); ?>
                                	<div>
                                    	<?php echo form_error($hometown_subdistrict['name']); ?>
                                    	<?php echo isset($errors[$hometown_subdistrict['name']])?$errors[$hometown_subdistrict['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("อำเภอ/เขต", $hometown_district['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($hometown_district); ?>
                                	<div>
                                    	<?php echo form_error($hometown_district['name']); ?>
                                    	<?php echo isset($errors[$hometown_district['name']])?$errors[$hometown_district['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("จังหวัด", $hometown_province['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($hometown_province); ?>
                                	<div>
                                    	<?php echo form_error($hometown_province['name']); ?>
                                    	<?php echo isset($errors[$hometown_province['name']])?$errors[$hometown_province['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("รหัสไปรษณีย์", $hometown_postcode['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($hometown_postcode); ?>
                                	<div>
                                    	<?php echo form_error($hometown_postcode['name']); ?>
                                    	<?php echo isset($errors[$hometown_postcode['name']])?$errors[$hometown_postcode['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("โทรศัพท์", $hometown_mobile['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($hometown_mobile); ?>
                                	<div>
                                    	<?php echo form_error($hometown_mobile['name']); ?>
                                    	<?php echo isset($errors[$hometown_mobile['name']])?$errors[$hometown_mobile['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            
                            <h3><u>ที่อยู่ปัจจุบัน</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("บ้านเลขที่", $current_address_no['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($current_address_no); ?>
                                	<div>
                                    	<?php echo form_error($current_address_no['name']); ?>
                                    	<?php echo isset($errors[$current_address_no['name']])?$errors[$current_address_no['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("หมู่ที่", $current_address_moo['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($current_address_moo); ?>
                                	<div>
                                    	<?php echo form_error($current_address_moo['name']); ?>
                                    	<?php echo isset($errors[$current_address_moo['name']])?$errors[$current_address_moo['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("ตำบล/แขวง", $current_address_subdistrict['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($current_address_subdistrict); ?>
                                	<div>
                                    	<?php echo form_error($current_address_subdistrict['name']); ?>
                                    	<?php echo isset($errors[$current_address_subdistrict['name']])?$errors[$current_address_subdistrict['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("อำเภอ/เขต", $current_address_district['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($current_address_district); ?>
                                	<div>
                                    	<?php echo form_error($current_address_district['name']); ?>
                                    	<?php echo isset($errors[$current_address_district['name']])?$errors[$current_address_district['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("จังหวัด", $current_address_province['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($current_address_province); ?>
                                	<div>
                                    	<?php echo form_error($current_address_province['name']); ?>
                                    	<?php echo isset($errors[$current_address_province['name']])?$errors[$current_address_province['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("รหัสไปรษณีย์", $current_address_postcode['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($current_address_postcode); ?>
                                	<div>
                                    	<?php echo form_error($current_address_postcode['name']); ?>
                                    	<?php echo isset($errors[$current_address_postcode['name']])?$errors[$current_address_postcode['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" ><?php echo form_label("โทรศัพท์", $current_address_mobile['id']); ?></label>
                                <div class="uk-form-controls">
                                	<?php echo form_input($current_address_mobile); ?>
                                	<div>
                                    	<?php echo form_error($current_address_mobile['name']); ?>
                                    	<?php echo isset($errors[$current_address_mobile['name']])?$errors[$current_address_mobile['name']]:''; ?>
                                    </div>
                                </div>
                            </div>
                			
                            <h3><u>ช่วงเวลาที่ฝึกงาน</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" >ตั้งแต่วันที่ - ถึงวันที่</label>
                                <div class="uk-form-controls">
                                    <select name="internship_id" class="uk-width-1-1">
                                    	<option value="0"> --- เลือกช่วงเวลาที่ฝึกงาน ---</option>
                                		<?php 
                                		for($i=0; $i<count($internship_items); $i++){
                                		    $item = $internship_items[$i];
                                		?>
                                		<option value="<?php echo $item->id;?>" <?php echo ($profile->internship_id==$item->id)?' selected="selected" ':'';?>><?php echo $item->title;?></option>
                                		<?php
                                		}
                                		?>
                                    </select>
                                </div>
                            </div>
                            
                            <h3><u>สถานที่ฝึกงาน</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" >ชื่อสถานฝึกงาน</label>
                                <div class="uk-form-controls">
                                	<select name="company_id" class="uk-width-1-1">
                                		<option value="0"> --- เลือกสถานที่ฝึกงาน ---</option>
                                		<?php 
                                		for($i=0; $i<count($company_items); $i++){
                                		    $item = $company_items[$i];
                                		?>
                                		<option value="<?php echo $item->id;?>" <?php echo ($profile->company_id==$item->id)?' selected="selected" ':'';?>><?php echo $item->name;?></option>
                                		<?php
                                		}
                                		?>
                                    </select>
                                </div>
                            </div>
                            
                            <h3><u>ผู้คุมการฝึกงาน</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" >ชื่อ-สกุล</label>
                                <div class="uk-form-controls">
                                	<select name="trainer_id" class="uk-width-1-1">
                                		<option value="0"> --- เลือกผู้คุมการฝึกงาน ---</option>
                                		<?php 
                                		for($i=0; $i<count($trainer_items); $i++){
                                		    $item = $trainer_items[$i];
                                		?>
                                		<option value="<?php echo $item->id;?>" <?php echo ($profile->trainer_id==$item->id)?' selected="selected" ':'';?>><?php echo $item->firstname;?> <?php echo $item->lastname;?></option>
                                		<?php
                                		}
                                		?>
                                	</select>
                                </div>
                            </div>
                            
                            <h3><u>อาจารย์นิเทศของสถานประกอบการ</u></h3>
                            <div class="uk-form-row">
                                <label class="uk-form-label" >ชื่อ-สกุล</label>
                                <div class="uk-form-controls">
                                	<select name="advisor_id" class="uk-width-1-1">
                                		<option value="0"> --- เลือกอาจารย์นิเทศ ---</option>
                                		<?php 
                                		for($i=0; $i<count($advisor_items); $i++){
                                		    $item = $advisor_items[$i];
                                		?>
                                		<option value="<?php echo $item->id;?>" <?php echo ($profile->advisor_id==$item->id)?' selected="selected" ':'';?>><?php echo $item->firstname;?> <?php echo $item->lastname;?></option>
                                		<?php
                                		}
                                		?>
                                	</select>
                                </div>
                            </div>
                            
                            <hr/>
                            <div class="uk-form-row">
                                <label class="uk-form-label" >รูปภาพส่วนตัว</label>
                                <div class="uk-form-controls">
                                	<img class="uk-border-circle" width="120" height="120" src="<?php echo $profile->thumbnail;?>">
                                    <br/><br/>
                                    <div><input type="file" name="thumbnail"></div>
                                </div>
                            </div>
                		</div>
                	</div>
                    
                    <hr/>
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="form-h-it"></label>
                        <div class="uk-form-controls uk-text-left">
                            <input type="submit" value="บันทึกข้อมูล" class="uk-button uk-button-success">
                        </div>
                    </div>
                    
                <?php echo form_close(); ?>
            </div>
		</div>
	</div>
</div>
