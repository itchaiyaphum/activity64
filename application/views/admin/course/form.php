<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
            <form action="<?php echo base_url('admin/course/edit');?>" method="post" name="adminForm" class="uk-form uk-form-horizontal">
            
    			<div class="uk-clearfix">
    				<div class="uk-float-left">
    					<h1>จัดการข้อมูลรายวิชา [<?php echo (is_null($item->id))?'เพิ่ม':'แก้ไข';?>]</h1>
    				</div>
        			<div class="uk-float-right">
        				<input type="submit" value="บันทึกข้อมูล" class="uk-button uk-button-success"/>
        				<a href="<?php echo base_url('/admin/course/');?>" class="uk-button uk-button-danger">ยกเลิก</a>
        			</div>
    			</div>
    			<hr/>
    			
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">ชื่อรายวิชา</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" name="name" value="<?php echo $item->name;?>" class="uk-width-1-2">
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">รหัสรายวิชา</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" name="course_code" value="<?php echo $item->course_code;?>" class="uk-width-1-2">
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">จำนวนหน่วยกิต</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" name="credit" value="<?php echo $item->credit;?>" class="uk-width-1-4"> หน่วยกิต
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">จำนวนชั่วโมงต่อสัปดาห์</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" name="hour_per_week" value="<?php echo $item->hour_per_week;?>" class="uk-width-1-4"> ชั่วโมง
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">จำนวนสัปดาห์</label>
                    <div class="uk-form-controls">
                        <input type="text" id="form-h-it" name="num_of_week" value="<?php echo $item->num_of_week;?>" class="uk-width-1-4"> สัปดาห์
                    </div>
                </div>
            	<div class="uk-form-row">
                    <label class="uk-form-label" for="form-h-it">อาจารย์ผู้สอน/อาจารย์ที่ปรึกษา</label>
                    <div class="uk-form-controls">
                        <select name="advisor_id"  class="uk-width-1-2">
                        	<option value="0">- เลือกอาจารย์ผู้สอน/อาจารย์ที่ปรึกษา -</option>
                        	<?php 
                        	for($i=0; $i<count($advisor_items); $i++){
                        	    $row = $advisor_items[$i];
                        	?>
                        	<option value="<?php echo $row->id;?>" <?php echo ($row->id==$item->advisor_id)?'selected="selected"':'';?>><?php echo $row->firstname.' '.$row->lastname;?></option>
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
                
            	<input type="hidden" name="id" value="<?php echo $item->id;?>" />
            </form>

		</div>
	</div>
</div>
