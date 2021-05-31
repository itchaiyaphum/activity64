<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>บันทึกกิจกรรมโฮมรูม > ประเมินความเสี่ยง สัปดาห์ที่ (<?php echo $homeroom->week;?>)</h2>
				</div>
			</div>
			<hr/>
			<div class="uk-button-group uk-width-1-1">
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/activity/?id=".$homeroom->id);?>">STEP 1: เช็คชื่อ</a>
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/obedience/?id=".$homeroom->id);?>">STEP 2: การให้โอวาท</a>
                    <a class="uk-button uk-width-1-4 uk-button-primary" href="<?php echo base_url("advisor/homeroom/risk/?id=".$homeroom->id);?>">STEP 3: ประเมินความเสี่ยง</a>
                    <a class="uk-button uk-width-1-4" href="<?php echo base_url("advisor/homeroom/confirm/?id=".$homeroom->id);?>">STEP 4: ยืนยันการบันทึกข้อมูล</a>
                </div>
            <form action="<?php echo base_url('advisor/homeroom/risk_save');?>" method="post" name="adminForm" id="adminForm">
            	<?php 
            	foreach ($student_items as $group){
            	?>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">กลุ่มการเรียน: <?php echo $group['group_name'].' / '.$group['minor_name'].' / '.$group['major_name'];?></h3>
                	<hr/>
                	<table class="uk-table uk-table-hover" cellpadding="1">
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
                					รายละเอียด
                				</th>
                				<th class="title">
                					หมายเหตุ
                				</th>
                				<th class="title" >
                					สถานะความเสี่ยง
                				</th>
                			</tr>
                		</thead>
                		<tbody>
                		<?php 
                		if(count( $group['items'] )<=0){
                		    echo '<tr><td colspan="6" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                		}else{
                			$k = 0;
                			
                			$risk_status_items = array();
                			foreach ($homeroom_risk_items as $item){
                			    $risk_status_items[$item->student_id]['risk_detail'] = $item->risk_detail;
                			    $risk_status_items[$item->student_id]['risk_comment'] = $item->risk_comment;
                			    $risk_status_items[$item->student_id]['risk_status'] = $item->risk_status;
                			}
                			
                			for ($i=0, $n=count( $group['items'] ); $i < $n; $i++)
                			{
                			    $row 	=& $group['items'][$i];
                			    if(!isset($risk_status_items[$row->id])){
                			        $risk_status_items[$row->id] = 'not_risk';
                			    }
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
                					<input type="text" class="uk-input" name="student_items[<?php echo $row->id;?>][detail]" value="<?php echo $risk_status_items[$row->id]['risk_detail'];?>"/>
                				</td>
                				<td>
                					<input type="text" class="uk-input" name="student_items[<?php echo $row->id;?>][comment]" value="<?php echo $risk_status_items[$row->id]['risk_comment'];?>"/>
                				</td>
                				<td>
                					<input class="uk-radio" type="radio" name="student_items[<?php echo $row->id;?>][status]" value="risk" <?php echo ($risk_status_items[$row->id]['risk_status']=='risk')?'checked="1"':'';?>> เสี่ยง
                					<input class="uk-radio" type="radio" name="student_items[<?php echo $row->id;?>][status]" value="not_risk" <?php echo ($risk_status_items[$row->id]['risk_status']=='not_risk')?'checked="1"':'';?>> ไม่เสี่ยง
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
            	
            	<input type="hidden" name="id" value="<?php echo $homeroom_risk->id;?>" />
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
