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
            <form action="<?php echo base_url('advisor/homeroom/obedience');?>" method="post" name="adminForm" id="adminForm">
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
                		<textarea cols="" rows="10" class="uk-width-1-1"></textarea>
                	</div>
            	</div>
            	
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
               		<h3>สถิติการตอบแบบสอบถามประเมินตนเอง</h3>
               		<div>
               			<ul class="uk-list uk-list-line">
               				<li>จำนวนผู้ตอบแบบสอบถามการคัดกรอง: <input type="number" min="0" max="100" class="uk-form-width-mini uk-form-small" name="" value="100"/> คน</li>
               				<li>นักเรียนทั้งหมด: (100) คน</li>
               				<li>ขาดกิจกรรมโฮมรูม: (1) คน</li>
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
               
               <div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
               		<br/>
                	<h3 class="uk-panel-title">แบบประเมินตนเอง สำหรับนักเรียน นักศึกษา โดยผ่านการสแกน QR Code เพื่อเป็นการเฝ้าระวังและป้องกันการแพร่ระบาดของโควิต 19</h3>
                	<hr/>
                	<table class="uk-table" cellpadding="1">
                		<thead>
                			<tr>
                				<th width="5%" class="title">#</th>
                				<th class="title">
                					รหัส
                				</th>
                				<th class="title">
                					ชื่อ - นามสกุล
                				</th>
                				<th class="title">
                					สาขาวิชา
                				</th>
                				<th class="title" width="20%">
                					กลุ่มการเรียน
                				</th>
                				<th width="30%" class="title" nowrap="nowrap">
                					สถานะการประเมินตนเอง
                				</th>
                			</tr>
                		</thead>
                		<tbody>
                		<?php 
                		if(count( $student_items )<=0){
                		    echo '<tr><td colspan="6" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                		}else{
                			$k = 0;
                			for ($i=0, $n=count( $student_items ); $i < $n; $i++)
                			{
                			    $row 	=& $student_items[$i];
                			?>
                			<tr class="<?php echo "row$k"; ?>">
                				<td>
                					<?php echo $this->helper_lib->getPaginationIndex($i+1);?>
                				</td>
                				<td>
                					
                				</td>
                				<td>
                					<?php echo $row->firstname; ?> <?php echo $row->lastname; ?>
                				</td>
                				<td>
                					<?php echo $row->major_name; ?>
                				</td>
                				<td>
                					<?php echo $row->group_name; ?>
                				</td>
                				<td>
                					<div class="uk-button uk-button-small uk-button-danger" href="#"><i class="uk-icon-check"></i> ยังไม่ได้ทำ</div>
                				</td>
                			</tr>
                		<?php
                			$k = 1 - $k;
                			}
                		}
                		?>
                		<?php 
            			$k = 0;
            			for ($i=0, $n=count( $student_items ); $i < $n; $i++)
            			{
            			    $row 	=& $student_items[$i];
            			?>
            			<tr class="<?php echo "row$k"; ?>">
            				<td>
            					<?php echo $this->helper_lib->getPaginationIndex($i+1);?>
            				</td>
            				<td>
            					
            				</td>
            				<td>
            					<?php echo $row->firstname; ?> <?php echo $row->lastname; ?>
            				</td>
            				<td>
            					<?php echo $row->major_name; ?>
            				</td>
            				<td>
            					<?php echo $row->group_name; ?>
            				</td>
            				<td>
            					<div class="uk-button uk-button-small uk-button-success"><i class="uk-icon-check"></i> เรียบร้อยแล้ว</div>
            				</td>
            			</tr>
                		<?php
                		}
                		?>
                		</tbody>
                	</table>
               	</div>
            	
            	 
            	<input type="hidden" name="homeroom_id" value="<?php echo $homeroom->id;?>" />
            	<input type="hidden" name="boxchecked" value="0" />
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
