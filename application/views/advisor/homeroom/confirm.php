<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>บันทึกกิจกรรมโฮมรูม > ยืนยันบันทึกข้อมูล สัปดาห์ที่ (<?php echo $homeroom->week;?>)</h2>
				</div>
			</div>
			<hr/>
            <form action="<?php echo base_url('advisor/homeroom/confirm_save');?>" method="post" name="adminForm" id="adminForm">
            	<div class="uk-button-group uk-width-1-1">
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/activity/?id=".$homeroom->id);?>">STEP 1: เช็คชื่อ</a>
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/obedience/?id=".$homeroom->id);?>">STEP 2: การให้โอวาท</a>
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/risk/?id=".$homeroom->id);?>">STEP 3: ประเมินความเสี่ยง</a>
                    <a class="uk-button uk-width-1-4 uk-button-primary" href="<?php echo base_url("advisor/homeroom/confirm/?id=".$homeroom->id);?>">STEP 4: ยืนยันการบันทึกข้อมูล</a>
                </div>
                
                <br/><br/>
            	<h2>สรุปผลการเช็คชื่อ และ ประเมินความเสี่ยง</h2>
				<div class="uk-panel uk-panel-box uk-panel-box-primary uk-margin-top">
					<ul class="uk-list uk-list-line">
						<li>นักเรียนทั้งหมด: <?php echo $homeroom_confirm_stats['totals']; ?> คน 
						| มา <?php echo $homeroom_confirm_stats['come']; ?> คน 
						| ขาด <?php echo $homeroom_confirm_stats['not_come']; ?> คน 
						| สาย <?php echo $homeroom_confirm_stats['late']; ?> คน 
						| ลา <?php echo $homeroom_confirm_stats['leave']; ?> คน 
						| เสี่ยง <?php echo $homeroom_confirm_stats['risk']; ?> คน</li>
					</ul>
				</div>

				<?php
                foreach ($homeroom_confirm_items as $group) {
                    if (count($group['students'])<=0) {
                        continue;
                    } ?>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">กลุ่มการเรียน: <?php echo $group['group_name'].' / '.$group['minor_name'].' / '.$group['major_name']; ?></h3>
                	<hr/>
                	<table class="uk-table uk-table-hover" cellpadding="1">
                		<thead>
                			<tr>
                				<th width="5%" class="title">#</th>
                				<th class="title">
                					รหัสนักเรียน
                				</th>
                				<th class="title">
                					ชื่อ - นามสกุล
                				</th>
                				<th class="title">
                					สถานะเช็คชื่อ
                				</th>
                				<th class="title" width="20%">
                					สถานะความเสี่ยง
                				</th>
                				<th width="30%" class="title" nowrap="nowrap">
                					รายละเอียด / หมายเหตุ
                				</th>
                			</tr>
                		</thead>
                		<tbody>
                		<?php
                        if (count($group['students'])<=0) {
                            echo '<tr><td colspan="6" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                        } else {
                            $k = 0;
                            
                            for ($i=0, $n=count($group['students']); $i < $n; $i++) {
                                $row 	=& $group['students'][$i]; ?>
                			<tr class="<?php echo "row$k"; ?>">
                				<td>
                					<?php echo($i+1); ?>
                				</td>
                				<td>
                					<?php echo $row['student_code']; ?>
                				</td>
                				<td>
                					<?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?>
                				</td>
                				<td>
                					<input disabled class="uk-radio" type="checkbox" checked="1"> <?php echo $row['activity']['check_status_text']; ?>
                				</td>
                				<td>
                					<input disabled class="uk-radio" type="checkbox" checked="1"> <?php echo $row['risk']['risk_status_text']; ?>
                				</td>
                				<td>
								<?php echo $row['risk']['risk_detail']; ?> / <?php echo $row['risk']['risk_comment']; ?>
                				</td>
                			</tr>
                		<?php
                            $k = 1 - $k;
                            }
                        } ?>
                		</tbody>
                	</table>
            	</div>
            	<?php
                } ?>
            	
            	
            	<br/><br/>
            	<h2>สรุปผลการให้โอวาท</h2>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                   <div>
                   		<h3>- เรื่องที่ให้คำแนะนำนักเรียน นักศึกษา</h3>
						<hr/>
                   		<div style="border: 1px;">
                   			<?php
                               if (isset($homeroom_confirm_obedience['obedience_content'])) {
                                   echo nl2br($homeroom_confirm_obedience['obedience_content']->obe_detail);
                               }?>
                   		</div>
                   		<hr/>
						
                   		<h3>- รูปภาพขณะให้คำแนะนำนักเรียน นักศึกษา เพื่อใช้ประกอบการจัดทำรายงาน</h3>
                   		<div>
							<?php
                            for ($i=0; $i<count($homeroom_confirm_obedience['obedience_attactments']); $i++) {
                                $row = $homeroom_confirm_obedience['obedience_attactments'][$i]; ?>
                   				<div><img class="uk-thumbnail" src="<?php echo $row->img; ?>" alt=""></div>
							<?php
                            } ?>
						</div>
                   </div>
            	</div>
            	
            	
            	
            	
            
            	<input type="hidden" name="homeroom_id" value="<?php echo $homeroom->id;?>" />
            	<input type="hidden" name="advisor_id" value="<?php echo $advisor_id;?>" />
            	<input type="hidden" name="advisor_type" value="advisor" />
            </form>
            
            <br/><br/>
        	<div class="uk-panel uk-panel-box uk-panel-box-primary uk-margin-top uk-text-center">
				<?php
                $disable_button = '';
                if (count($homeroom_confirm)) {
                    $disable_button = 'disabled';
                }
                ?>
				<button <?php echo $disable_button; ?> class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#confirm-form'}">กดยืนยันการบันทึกข้อมูล</button>
        		<div id="confirm-form" class="uk-modal">
                    <div class="uk-modal-dialog">
                    	<a class="uk-modal-close uk-close"></a>
                    	<div class="uk-modal-header">คุณต้องการยืนยันการบันทึกข้อมูลจริงหรือไม่?</div>
                        <div>
                        	<img src="https://www.cognidox.com/hubfs/Digital%20Signature%20MHRA%20Remote%20Working.jpg" />
                        	<button class="uk-button uk-modal-close">ยกเลิก</button>
                        	<button class="uk-button uk-button-primary" onclick="document.getElementById('adminForm').submit();">ยืนยันการบันทึกข้อมูล</button>
                        </div>
                    </div>
                </div>
        	</div>

		</div>
	</div>
</div>
