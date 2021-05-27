<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>บันทึกประจำวัน (Wannapong Kumjumpon)</h2>
				</div>
			</div>
			<hr>
			<?php 
			$days_of_weeks = array('จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์','อาทิตย์');
    		for($i=0; $i<18; $i++){
    		?>
			<article class="uk-article">
				<table class="uk-table">
					<tbody><tr>
						<td class="uk-width-1-10">สัปดาห์ที่ <?php echo ($i+1);?></td>
						<td class="uk-width-1-10">วัน</td>
						<td class="uk-width-3-10">กิจกรรม/งานที่ปฏิบัติ</td>
						<td class="uk-width-2-10">ปัญหาและอุปสรรค</td>
						<td class="uk-width-2-10">ประโยชน์ที่ได้รับ</td>
						<td class="uk-width-1-10" colspan="2"></td>
					</tr>
					<?php 
            		for($j=0; $j<count($days_of_weeks); $j++){
            		    
            		    $text_activity = '-';
            		    $text_problem = '-';
            		    $text_advantage = '-';
            		    for($k=0; $k<count($activity_items); $k++){
            		        $item = $activity_items[$k];
            		        if($item->week==($i+1) && $item->day==($j+1)){
            		            $text_activity = $item->activity;
            		            $text_problem = $item->problem;
            		            $text_advantage = $item->advantage;
            		        }
            		    }
            		?>
            		
					<tr>
						<td></td>
						<td><?php echo $days_of_weeks[$j];?></td>
						<td><?php echo $text_activity;?></td>
						<td><?php echo $text_problem;?></td>
						<td><?php echo $text_advantage;?></td>
						<td><a href="<?php echo base_url('profile/activity/form/?week='.($i+1).'&day='.($j+1)); ?>" class="uk-button uk-button-small uk-button-success"><i class="uk-icon-pencil"></i> บันทึก</a></td>
					</tr>
					
					<?php 
					$filter_photos = array();
					for($n=0; $n<count($photo_items); $n++){
					    $photo = $photo_items[$n];
					    if($photo->week==($i+1) && $photo->day==($j+1)){
					        array_push($filter_photos, $photo);
					    }
					}
					
					if(count($filter_photos)){
					?>
					<tr>
						<td></td>
						<td colspan="5">
							<div class="uk-grid uk-grid-small">
								<?php 
								$class_width = "uk-width-1-3";
								if(count($filter_photos)==1){
								    $class_width = "uk-width-1-1";
								}else if(count($filter_photos)==2){
								    $class_width = "uk-width-1-2";
								}
								for($n=0; $n<count($filter_photos); $n++){
								    $photo = $filter_photos[$n];
								?>
								<div class="<?php echo $class_width;?>">
									<a target="_blank" href="<?php echo base_url('/storage/photos/'.$photo->file_name);?>"><img class="uk-thumbnail" src="<?php echo base_url('/storage/photos/thumbnail/'.$photo->file_name);?>"/></a>
								</div>
								<?php 
								} 
								?>
							</div>
						</td>
					</tr>
					<?php } ?>
							
					<?php 
					$filter_files = array();
					for($n=0; $n<count($file_items); $n++){
					    $file = $file_items[$n];
					    if($photo->week==($i+1) && $file->day==($j+1)){
					        array_push($filter_files, $file);
					    }
					}
					
					if(count($filter_files)){
					?>
					<tr>
						<td></td>
						<td colspan="5">
							<ul class="uk-list uk-list-line">
								<?php 
								for($n=0; $n<count($filter_files); $n++){
								    $file = $filter_files[$n];
								?>
								<li><a target="_blank" href="<?php echo base_url('/storage/files/'.$file->file_name);?>"><i class="uk-icon-cloud-download"></i> ดาวน์โหลด: <?php echo $file->orig_name;?></a></li>
								<?php 
								} 
								?>
							</ul>
						</td>
					</tr>
					<?php } ?>
					
					<?php } ?>
					</tbody>
				</table>
			</article>
			<?php } ?>
			
		</div>
	</div>
</div>
