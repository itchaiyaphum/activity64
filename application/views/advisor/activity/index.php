<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			
			<table class="uk-table uk-table-condensed">
			<tr>
				<td>ที่</td>
				<td>ชื่อนักศึกษา</td>
				<td>สถานศึกษา</td>
				<td>สถานนะ</td>
			</tr>
			<?php 
			for($i=0; $i<count($student_items); $i++){
			    $student = $student_items[$i];
			    
			    $review_link = base_url('advisor/activity/items/?id='.$student->user_id);
			    
// 			    $review_status = '<a class="uk-button uk-button-success" href="'.$review_link.'"><i class="uk-icon-check"></i> ตรวจสอบเรียบร้อย</a>';
			    $review_status = '<a class="uk-button uk-button-danger" href="'.$review_link.'"><i class="uk-icon-clock-o"></i> รอตรวจสอบ</a>';
			    
			?>
			<tr>
				<td><?php echo ($i+1); ?></td>
				<td><?php echo $student->firstname; ?> <?php echo $student->lastname; ?></td>
				<td><?php echo $student->college_name; ?></td>
				<td><?php echo $review_status; ?></td>
			</tr>
			<?php
			}
			?>
			</table>
			
		</div>
	</div>
</div>
