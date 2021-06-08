<?php
$attributes = array('class' => 'uk-form uk-form-horizontal', 'name' => 'adminForm', 'id' => 'adminForm', 'method'=>'post');
?>
<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
            <?php echo form_open($this->uri->uri_string(), $attributes); ?>
    			<div class="uk-clearfix">
    				<div class="uk-float-left">
    					<h1>Import ข้อมูลลงในระบบ</h1>
    				</div>
        			<div class="uk-float-right">
        				<input type="submit" value="บันทึกข้อมูล" class="uk-button uk-button-success"/>
        				<a href="<?php echo base_url('/admin/users/');?>" class="uk-button uk-button-danger">ยกเลิก</a>
        			</div>
    			</div>
    			<hr/>
    			<div>
    			<?php echo isset($errors['global'])?$errors['global']:''; ?>
    			</div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">รูปแบบข้อมูล</label>
                    <div class="uk-form-controls">
                    	<select name="data_type" class="uk-width-1-2">
                        	<option value="">- เลือกรูปแบบข้อมูลที่ต้องการดำเนินนการ -</option>
                        	<option value="student">ข้อมูลนักเรียน (Student)</option>
                        	<option value="advisor">ข้อมูลอาจารย์ที่ปรึกษา (Advisor)</option>
                        	<option value="major">ข้อมูลสาขาวิชา (Major)</option>
                        	<option value="minor">ข้อมูลสาขางาน (Minor)</option>
                        	<option value="group">ข้อมูลกลุ่มการเรียน (Group)</option>
                        </select>
                        <div>
                        <?php echo form_error('data_type'); ?>
                		<?php echo isset($errors['data_type'])?$errors['data_type']:''; ?>
                		</div>
                    </div>
                </div>
				<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">ข้อมูล CSV Text</label>
                    <div class="uk-form-controls">
                    	<textarea rows='20' class="uk-width-1-1" name='csv_data'></textarea>

						<div class="uk-alert uk-alert-success">นักเรียน (Student): [firstname,lastname,email,college_id,major_id,minor_id,group_id]</div>
						<div class="uk-alert uk-alert-success">ครูที่ปรึกษา (Advisor): [firstname,lastname,email,college_id,major_id]</div>
						<div class="uk-alert uk-alert-success">สาขาวิชา (Major): [major_code,major_name,major_eng,college_id,created_at,updated_at,status]</div>
						<div class="uk-alert uk-alert-success">สาขางาน (Minor): [minor_code,minor_name,minor_eng,college_id,major_id,created_at,updated_at,status]</div>
						<div class="uk-alert uk-alert-success">กลุ่มการเรียน (Group): [group_code,group_name,college_id,major_id,minor_id,created_at,updated_at,status]</div>
                    </div>
                </div>
            <?php echo form_close(); ?>
		</div>
	</div>
</div>
