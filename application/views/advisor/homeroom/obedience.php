<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>บันทึกกิจกรรมโฮมรูม > ให้โอวาท สัปดาห์ที่ (<?php echo $homeroom->week;?>)</h2>
				</div>
			</div>
			<hr/>
            <form action="<?php echo base_url('advisor/homeroom/obedience_save');?>" method="post" name="adminForm" id="adminForm">
            	<div class="uk-button-group uk-width-1-1">
                    <a class="uk-button uk-width-1-4" href="<?php echo base_url("advisor/homeroom/activity/?id=".$homeroom->id);?>"><i class="uk-icon-check-circle"></i> STEP 1: เช็คชื่อ</a>
                    <a class="uk-button uk-width-1-4 uk-button-primary" href="<?php echo base_url("advisor/homeroom/obedience/?id=".$homeroom->id);?>">STEP 2: การให้โอวาท</a>
                    <a class="uk-button uk-width-1-4" href="<?php echo base_url("advisor/homeroom/risk/?id=".$homeroom->id);?>">STEP 3: ประเมินความเสี่ยง</a>
                    <a class="uk-button uk-width-1-4" href="<?php echo base_url("advisor/homeroom/confirm/?id=".$homeroom->id);?>">STEP 4: ยืนยันการบันทึกข้อมูล</a>
                </div>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h2>แบบบันทึกรายงาน การปฏิบัติงานของครูที่ปรึกษา</h2>
            		<div>สัปดาห์ที่ 1 วันที่ 26 เดือน สิงหาคม พ.ศ. 2564</div>
                	<hr/>
                	<h3 class="uk-panel-title">เรื่องที่ให้คำแนะนำ นักเรียน นักศึกษา</h3>
                	<div>
                		<textarea name="obe_detail" cols="" rows="10" class="uk-width-1-1"><?php echo $obedience->obe_detail;?></textarea>
                	</div>
            	</div>
            	
               <div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
               		<br/>
                	<h3 class="uk-panel-title">แบบประเมินตนเอง สำหรับนักเรียน นักศึกษา โดยผ่านการสแกน QR Code เพื่อเป็นการเฝ้าระวังและป้องกันการแพร่ระบาดของโควิต 19</h3>
                	<hr/>
                	
                	<?php 
                	$student_amount = 0;
                	foreach ($student_items as $group){
                	?>
                	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                        <h3 class="uk-panel-title">กลุ่มการเรียน: <?php echo $group['group_name'].' / '.$group['minor_name'].' / '.$group['major_name'];?></h3>
                    	<hr/>
                    	<table class="uk-table uk-table-hover" cellpadding="1">
                    		<thead>
                    			<tr>
                    				<th width="5%" class="title">#</th>
                    				<th class="title" width="15%">
                    					รหัส
                    				</th>
                    				<th class="title">
                    					ชื่อ - นามสกุล
                    				</th>
                    				<th class="title" width="30%">
                    					สถานะการตอบแบบสอบถาม
                    				</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    		<?php 
                    		if(count( $group['items'] )<=0){
                    		    echo '<tr><td colspan="6" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                    		}else{
                    			$k = 0;
                    			for ($i=0, $n=count( $group['items'] ); $i < $n; $i++)
                    			{
                    			    $student_amount++;
                    			    $row 	=& $group['items'][$i];
                    			?>
                    			<tr class="<?php echo "row$k"; ?>">
                    				<td>
                    					<?php echo ($i+1);?>
                    				</td>
                    				<td>
                    					<?php echo $row->student_id; ?>
                    				</td>
                    				<td>
                    					<?php echo $row->firstname; ?> <?php echo $row->lastname; ?>
                    				</td>
                    				<td>
                    					<div class="uk-button uk-button-danger uk-button-mini">ยังไม่ได้ทำ</div>
                    				</td>
                    			</tr>
                    		<?php
                    			$k = 1 - $k;
                    			}
                    		}
                    		?>
                    		</tbody>
                    	</table>
                	</div>
                	<?php } ?>
               	</div>
               	
               	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
               		<h3>สถิติการตอบแบบสอบถามประเมินตนเอง</h3>
               		<div>
               			<ul class="uk-list uk-list-line">
               				<li>จำนวนผู้ตอบแบบสอบถามการคัดกรอง: <input type="number" name="survey_amount" min="0" max="<?php echo $student_amount;?>" class="uk-form-width-mini uk-form-small" value="<?php echo $obedience->survey_amount;?>"/> คน</li>
               				<li>นักเรียนทั้งหมด: (<?php echo $student_amount;?>) คน</li>
               			</ul>
               		</div>
               	</div>
               	
               	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
               		
               		<h3>รูปภาพขณะให้คำแนะนำนักเรียน นักศึกษา เพื่อใช้ประกอบการจัดทำรายงาน</h3>
               		<hr/>
               		<div>
               			<div>กรุณาเลือกไฟล์รูปภาพ 2 รูป</div>
               			<input type="file" class="uk-button uk-width-1-2 uk-margin-top" name="upload_file_1"/>
               			<input type="file" class="uk-button uk-width-1-2 uk-margin-top" name="upload_file_2"/>
               		</div>
              	</div>
            	
            	<input type="hidden" name="id" value="<?php echo $obedience->id;?>" />
            	<input type="hidden" name="homeroom_id" value="<?php echo $homeroom->id;?>" />
            	<input type="hidden" name="advisor_id" value="<?php echo $advisor_id;?>" />
            </form>
            
            <br/><br/>
        	<div class="uk-panel uk-panel-box uk-panel-box-primary uk-margin-top uk-text-center">
                <button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#confirm-form'}">บันทึกข้อมูล</button>
        		<div id="confirm-form" class="uk-modal">
                    <div class="uk-modal-dialog">
                    	<a class="uk-modal-close uk-close"></a>
                    	<div class="uk-modal-header">กรุณากดยินยันการบันทึกข้อมูลอีกครั้ง?</div>
                        <div>
                        	<button class="uk-button uk-modal-close">ยกเลิก</button>
                        	<button class="uk-button uk-button-primary" onclick="document.getElementById('adminForm').submit();">ยืนยันการบันทึกข้อมูล</button>
                        </div>
                    </div>
                </div>
        	</div>

		</div>
	</div>
</div>
