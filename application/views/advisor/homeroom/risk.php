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
            <form action="<?php echo base_url('advisor/homeroom/risk');?>" method="post" name="adminForm" id="adminForm">
            	
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">กลุ่มการเรียน: (EV 1 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
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
                					รายละเอียด
                				</th>
                				<th class="title">
                					หมายเหตุ
                				</th>
                				<th width="20%" class="title" nowrap="nowrap">
                					สถานะความเสี่ยง
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
                					<input type="text" class="uk-input" name="problem[group_1][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input type="text" class="uk-input" name="problem[group_1][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input class="uk-radio" type="radio" name="risk_status[group_1][<?php echo $row->id;?>]" checked="1"> ไม่เสี่ยง
                					<input class="uk-radio" type="radio" name="risk_status[group_1][<?php echo $row->id;?>]" > เสี่ยง
                				</td>
                				<td>
                					<?php //echo $row->operation_status_name; ?>
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
            	
            	 
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">กลุ่มการเรียน: (EV 2 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
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
                					รายละเอียด
                				</th>
                				<th class="title">
                					หมายเหตุ
                				</th>
                				<th width="20%" class="title" nowrap="nowrap">
                					สถานะความเสี่ยง
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
                					<input type="text" class="uk-input" name="problem[group_2][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input type="text" class="uk-input" name="problem[group_2][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input class="uk-radio" type="radio" name="risk_status[group_2][<?php echo $row->id;?>]" checked="1"> ไม่เสี่ยง
                					<input class="uk-radio" type="radio" name="risk_status[group_2][<?php echo $row->id;?>]" > เสี่ยง
                				</td>
                				<td>
                					<?php //echo $row->operation_status_name; ?>
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
            	
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">กลุ่มการเรียน: (EV 3 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
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
                					รายละเอียด
                				</th>
                				<th class="title">
                					หมายเหตุ
                				</th>
                				<th width="20%" class="title" nowrap="nowrap">
                					สถานะความเสี่ยง
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
                					<input type="text" class="uk-input" name="problem[group_3][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input type="text" class="uk-input" name="problem[group_3][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input class="uk-radio" type="radio" name="risk_status[group_3][<?php echo $row->id;?>]" checked="1"> ไม่เสี่ยง
                					<input class="uk-radio" type="radio" name="risk_status[group_3][<?php echo $row->id;?>]" > เสี่ยง
                				</td>
                				<td>
                					<?php //echo $row->operation_status_name; ?>
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
            	
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">กลุ่มการเรียน: (EV 4 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
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
                					รายละเอียด
                				</th>
                				<th class="title">
                					หมายเหตุ
                				</th>
                				<th width="20%" class="title" nowrap="nowrap">
                					สถานะความเสี่ยง
                				</th>
                			</tr>
                		</thead>
                		<tfoot>
                			<tr>
                				<td colspan="6" class="uk-text-center">
                					<ul class="uk-pagination"><?php echo $pagination->create_links(); ?></ul>
                				</td>
                			</tr>
                		</tfoot>
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
                					<input type="text" class="uk-input" name="problem[group_4][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input type="text" class="uk-input" name="problem[group_4][<?php echo $row->id; ?>]">
                				</td>
                				<td>
                					<input class="uk-radio" type="radio" name="risk_status[group_4][<?php echo $row->id;?>]" checked="1"> ไม่เสี่ยง
                					<input class="uk-radio" type="radio" name="risk_status[group_4][<?php echo $row->id;?>]" > เสี่ยง
                				</td>
                				<td>
                					<?php //echo $row->operation_status_name; ?>
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
