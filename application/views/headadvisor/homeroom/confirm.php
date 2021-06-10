<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>รายละเอียดการกรอกข้อมูลกิจกรรมโฮมรูม สัปดาห์ที่ (<?php echo $homeroom->week;?>)</h2>
				</div>
			</div>
			<hr/>
            <form action="<?php echo base_url('headdepartment/homeroom/confirm');?>" method="post" name="adminForm" id="adminForm">
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
            </form>
            
            <br/><br/>
        	<div class="uk-panel uk-panel-box uk-panel-box-primary uk-margin-top uk-text-center">
				<a class="uk-button uk-button-primary uk-button-large" href="<?php echo base_url('/headdepartment/homeroom'); ?>"><i class="uk-icon-home"></i> กลับหน้าหลัก</a>
        	</div>

		</div>
	</div>
</div>