<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h1>บันทึกกิจกรรมโฮมรูม > เช็คชื่อ</h1>
				</div>
			</div>
			<hr/>
            <form action="<?php echo base_url('advisor/homeroom/activity');?>" method="post" name="adminForm">
            	<div>
            		<h3>Step: 1/4</h3>
            		<div>เช็คชื่อเข้าร่วมกิจกรรมโฮมรูม สัปดาห์ที่ (<?php echo $homeroom->week;?>)</div>
            	</div>
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
            					สถานะการเข้าร่วม
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
            					<?php echo $row->major_name; ?>
            				</td>
            				<td>
            					<?php echo $row->group_name; ?>
            				</td>
            				<td>
            					<input class="uk-radio" type="radio" name="join_status[<?php echo $row->id;?>]" checked="1"> มา
            					<input class="uk-radio" type="radio" name="join_status[<?php echo $row->id;?>]" > ขาด
            					<input class="uk-radio" type="radio" name="join_status[<?php echo $row->id;?>]" > สาย
            					<input class="uk-radio" type="radio" name="join_status[<?php echo $row->id;?>]" > ลา
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
            
            	<input type="hidden" name="homeroom_id" value="<?php echo $homeroom->id;?>" />
            	<input type="hidden" name="boxchecked" value="0" />
            </form>

		</div>
	</div>
</div>
