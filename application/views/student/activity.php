<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php $this->load->view('student/menu');?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>บันทึกประจำวัน</h2>
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
            		    $student_save = 0;
            		    $text_activity = '-';
            		    $text_problem = '-';
            		    $text_advantage = '-';
            		    for($k=0; $k<count($items); $k++){
            		        $item = $items[$k];
            		        if($item->week==($i+1) && $item->day==($j+1)){
            		            $text_activity = $item->activity;
            		            $text_problem = $item->problem;
            		            $text_advantage = $item->advantage;
            		            
            		            $student_save = 1;  //active
                    		    $advisor_check_status = $item->advisor_check_status;
                    		    $trainer_confirm_status = $item->trainer_confirm_status;
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
					
					
					<?php 
            				if($student_save){
            				?>
            				<tr>
            					<td></td>
            					<td colspan="5">
            						<div class="uk-margin">
            						
            							<?php 
            							if($profile->user_type=="student"){
            							     if($advisor_check_status){
            							?>
            								<div class="uk-text-success">ครูนิเทศฝึกงาน: <i class="uk-icon-check"></i> ตรวจแล้ว</div>
            								<?php 
            							     }else{
            								?>
            								<div class="uk-text-danger">ครูนิเทศฝึกงาน: <i class="uk-icon-remove"></i> ยังไม่ตรวจ</div>
            								<?php 
            							     }
            							     
            							     if($trainer_confirm_status){
            								?>
            								<div class="uk-text-success">ผู้ควบคุมการฝึกงาน: <i class="uk-icon-check"></i> ยืนยันแล้ว</div>
            								<?php 
            							     }else{
            							    ?>
            							    <div class="uk-text-danger">ผู้ควบคุมการฝึกงาน: <i class="uk-icon-remove"></i> ยังไม่ยืนยันแล้ว</div>
            							<?php
            							     }
            							}
            							?>
            							
            							<?php 
            							if($profile->user_type=="advisor"){
            							     if($advisor_check_status){
            							?>
            							<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-small">ครูนิเทศฝึกงาน:</button>
                                            <div>
                                                <button class="uk-button uk-button-success uk-button-small">ตรวจแล้ว</button>
                                            </div>
                                        </div>
            							<?php 
            							     }else{
            							?>
                        				<div class="uk-button-group">
                                            <button class="uk-button uk-button-danger uk-button-small">ครูนิเทศฝึกงาน:</button>
                                            <div>
                                                <button class="uk-button uk-button-danger uk-button-small">ยังไม่ตรวจ</button>
                                            </div>
                                        </div>
                                        <?php 
            							     }
            							}
            							?>
            							
            							<?php 
            							if($profile->user_type=="trainer"){
            							     if($trainer_confirm_status){
            							?>
            							<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-small">ผู้ควบคุมการฝึกงาน:</button>
                                            <div>
                                                <button class="uk-button uk-button-success uk-button-small">ยังไม่ยืนยัน</button>
                                            </div>
                                        </div>
            							<?php 
            							     }else{
            							?>
                                        <div class="uk-button-group">
                                            <button class="uk-button uk-button-danger uk-button-small">ผู้ควบคุมการฝึกงาน:</button>
                                            <div>
                                                <button class="uk-button uk-button-danger uk-button-small">ยังไม่ยืนยัน</button>
                                            </div>
                                        </div>
                                        <?php 
            							     }
            							}
            							?>
                                        
                                    </div>
            					</td>
            				</tr>
            				<?php 
							}
							?>
					
					<?php } ?>
					</tbody>
				</table>
			</article>
			<?php } ?>
			
			<!-- 
			<article class="uk-article">
				<table class="uk-table uk-table-hover">
					<tbody><tr>
						<td class="uk-width-1-10">สัปดาห์ที่ 19</td>
						<td class="uk-width-1-10">วัน</td>
						<td class="uk-width-3-10">กิจกรรม/งานที่ปฏิบัติ</td>
						<td class="uk-width-2-10">ปัญหาและอุปสรรค</td>
						<td class="uk-width-2-10">ประโยชน์ที่ได้รับ</td>
						<td class="uk-width-1-10" colspan="2"></td>
					</tr>
					<tr>
						<td></td>
						<td>จันทร์</td>
						<td>
							<div>ซ่อมเครื่องคอมที่บ้านลูกค้า จ.นครปฐม</div>
							
						</td>
						<td>-</td>
						<td>-</td>
						<td><a href="<?php echo base_url('index.php?option=com_internship&view=notes&layout=form&id='); ?>" class="uk-button uk-button-small uk-button-success"><i class="uk-icon-pencil"></i> บันทึก</a></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td colspan="3">
							<div>
								<img class="uk-thumbnail" src="/assets/imgs/slideshow1.jpg"/>
							</div>
							<ul class="uk-list uk-list-line">
								<li><a target="_blank" href="/media/com_internship/downloads/doc1.zip"><i class="uk-icon-cloud-download"></i> ดาวน์โหลด: รายงานผลการทำงาน</a></li>
								<li><a target="_blank" href="/media/com_internship/downloads/doc1.pdf"><i class="uk-icon-cloud-download"></i> ดาวน์โหลด: แผนที่งานซ่อม</a></li>
							</ul>
						</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>อังคาร</td>
						<td>
							<div>เดินสาย LAN จ.นครปฐม</div>
						</td>
						<td>-</td>
						<td>-</td>
						<td><a href="<?php echo base_url('index.php?option=com_internship&view=notes&layout=form&id='); ?>" class="uk-button uk-button-small uk-button-success"><i class="uk-icon-pencil"></i> บันทึก</a></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td colspan="3">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-1-3">
									<img class="uk-thumbnail" src="/assets/imgs/slideshow1.jpg"/>
								</div>
								<div class="uk-width-1-3">
									<img class="uk-thumbnail" src="/assets/imgs/slideshow1.jpg"/>
								</div>
								<div class="uk-width-1-3">
									<img class="uk-thumbnail" src="/assets/imgs/slideshow1.jpg"/>
								</div>
							</div>
							<ul class="uk-list uk-list-line">
								<li><a target="_blank" href="/media/com_internship/downloads/doc1.zip"><i class="uk-icon-cloud-download"></i> ดาวน์โหลด: รายงานผลการทำงาน</a></li>
							</ul>
						</td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>พุธ</td>
						<td>เดินสาย LAN จ.นครปฐม</td>
						<td>-</td>
						<td>-</td>
						<td><a href="<?php echo base_url('index.php?option=com_internship&view=notes&layout=form&id='); ?>" class="uk-button uk-button-small uk-button-success"><i class="uk-icon-pencil"></i> บันทึก</a></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td colspan="3">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-1-2">
									<img class="uk-thumbnail" src="/assets/imgs/slideshow1.jpg"/>
								</div>
								<div class="uk-width-1-2">
									<img class="uk-thumbnail" src="/assets/imgs/slideshow1.jpg"/>
								</div>
							</div>
							<ul class="uk-list uk-list-line">
								<li><a target="_blank" href="/media/com_internship/downloads/doc1.zip"><i class="uk-icon-cloud-download"></i> ดาวน์โหลด: รายงานผลการทำงาน</a></li>
								<li><a target="_blank" href="/media/com_internship/downloads/doc1.pdf"><i class="uk-icon-cloud-download"></i> ดาวน์โหลด: แผนที่งานซ่อม</a></li>
							</ul>
						</td>
						<td></td>
					</tr>
					</tbody>
				</table>
			</article>
			 -->
		</div>
	</div>
</div>
