<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
            <form action="<?php echo base_url('admin/internship/edit');?>" method="post" name="adminForm" class="uk-form uk-form-horizontal">
            
    			<div class="uk-clearfix">
    				<div class="uk-float-left">
    					<h1>จัดการข้อมูลการฝึกงาน [<?php echo (is_null($item->id))?'เพิ่ม':'แก้ไข';?>]</h1>
    				</div>
        			<div class="uk-float-right">
        				<input type="submit" value="บันทึกข้อมูล" class="uk-button uk-button-success"/>
        				<a href="<?php echo base_url('/admin/internship/');?>" class="uk-button uk-button-danger">ยกเลิก</a>
        			</div>
    			</div>
    			<hr/>
    			
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">ชื่อหัวข้อการฝึกงาน</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" name="title" value="<?php echo $item->title;?>" class="uk-width-1-2">
                    	<div>
                        	<?php echo form_error('title'); ?>
                        	<?php echo isset($errors['title'])?$errors['title']:''; ?>
                        </div>
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">วันที่เริ่มต้นการฝึกงาน</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" data-uk-datepicker="{format:'YYYY-MM-DD'}" name="internship_start" value="<?php echo $item->internship_start;?>" class="uk-width-1-4">
                    	<div>
                        	<?php echo form_error('internship_start'); ?>
                        	<?php echo isset($errors['internship_start'])?$errors['internship_start']:''; ?>
                        </div>
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">วันที่สิ้นสุดการฝึกงาน</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" data-uk-datepicker="{format:'YYYY-MM-DD'}" name="internship_end" value="<?php echo $item->internship_end;?>" class="uk-width-1-4">
                    	<div>
                        	<?php echo form_error('internship_end'); ?>
                        	<?php echo isset($errors['internship_end'])?$errors['internship_end']:''; ?>
                        </div>
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">จำนวนสัปดาห์การฝึกงาน</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" name="num_weeks" value="<?php echo $item->num_weeks;?>" class="uk-width-1-4"> สัปดาห์
                    	<div>
                        	<?php echo form_error('num_weeks'); ?>
                        	<?php echo isset($errors['num_weeks'])?$errors['num_weeks']:''; ?>
                        </div>
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">ระดับการศึกษา</label>
                    <div class="uk-form-controls">
                        <select name="edulevel_id"  class="uk-width-1-2">
                        	<option value="0">- เลือกระดับการศึกษา -</option>
                        	<?php 
                        	for($i=0; $i<count($edulevel_items); $i++){
                        	    $row = $edulevel_items[$i];
                        	?>
                        	<option value="<?php echo $row->id;?>" <?php echo ($row->id==$item->edulevel_id)?'selected="selected"':'';?>><?php echo $row->name;?></option>
                        	<?php } ?>
                        </select>
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">ภาคการศึกษา</label>
                    <div class="uk-form-controls">
                        <select name="semester_id"  class="uk-width-1-2">
                        	<option value="0">- เลือกภาคการศึกษา -</option>
                        	<?php 
                        	for($i=0; $i<count($semester_items); $i++){
                        	    $row = $semester_items[$i];
                        	?>
                        	<option value="<?php echo $row->id;?>" <?php echo ($row->id==$item->semester_id)?'selected="selected"':'';?>><?php echo $row->name;?></option>
                        	<?php } ?>
                        </select>
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">สถานศึกษา</label>
                    <div class="uk-form-controls">
                        <select name="college_id"  class="uk-width-1-2">
                        	<option value="0">- เลือกสถานศึกษา -</option>
                        	<?php 
                        	for($i=0; $i<count($college_items); $i++){
                        	    $row = $college_items[$i];
                        	?>
                        	<option value="<?php echo $row->id;?>" <?php echo ($row->id==$item->college_id)?'selected="selected"':'';?>><?php echo $row->name;?></option>
                        	<?php } ?>
                        </select>
                    </div>
                </div>
                
            	<input type="hidden" name="id" value="<?php echo $item->id;?>" />
            </form>

		</div>
	</div>
</div>
