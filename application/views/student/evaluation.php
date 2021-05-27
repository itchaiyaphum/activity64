<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php $this->load->view('student/menu');?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-text-center">
				<h2>สรุปผลการฝึกงานในสถานประกอบการ</h2>
				<h3>(สำหรับนักศึกษาฝึกงานในสถานประกอบการ)</h3>
			</div>
			<hr>
			
			<br/>
			<table width="100%">
				<tr>
					<td><b>ชื่อสถานประกอบการ:</b></td>
					<td><?php echo $data->company_name;?></td>
					<td colspan="2"></td>
				</tr>
				<tr>
					<td><b>ชื่อสถานศึกษา:</b></td>
					<td><?php echo $data->college_name;?></td>
					<td><b>แผนก/สาขา:</b></td>
					<td><?php echo $data->college_department_name;?></td>
				</tr>
				<tr>
					<td><b>วันเริ่มต้นการฝึกงาน:</b></td>
					<td>(<?php echo $data->internship_start;?> ถึง <?php echo $data->internship_end;?>)</td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<br/>
			<hr>
			
			<table class="uk-table uk-table-border">
				<thead>
					<tr>
						<th>สัปดาห์ที่</th>
						<th>มา</th>
						<th>สาย</th>
						<th>ไม่มา</th>
						<th>ลา</th>
						<th>รวม</th>
						<th>ครูนิเทศตรวจเยี่ยม</th>
						<th>การบันทึกปฏิบัติงาน</th>
						<th>ผู้ควบคุมตรวจยืนยัน</th>
					</tr>
				</thead>
				<?php
				for($i=0; $i<count($data->stats); $i++){
				    $item = $data->stats[$i];
			    ?>
				<tr>
					<td class="uk-text-center"><?php echo $item->week;?></td>
					<td class="uk-text-center"><?php echo $item->come;?></td>
					<td class="uk-text-center"><?php echo $item->not_come;?></td>
					<td class="uk-text-center"><?php echo $item->late;?></td>
					<td class="uk-text-center"><?php echo $item->leave;?></td>
					<td class="uk-text-center"><?php echo $item->total;?></td>
					<td class="uk-text-center">
						<?php echo $this->helper_lib->getProgressBarHtml($item->advisor_check_percentage);?>
					</td>
					<td class="uk-text-center">
						<?php echo $this->helper_lib->getProgressBarHtml($item->student_activity_percentage);?>
                    </td>
					<td class="uk-text-center">
						<?php echo $this->helper_lib->getProgressBarHtml($item->trainer_confirm_percentage);?>
                    </td>
				</tr>
    			<?php 
				}
				?>
				<tr>
					<td class="uk-text-right">รวม:</td>
					<td class="uk-text-center"><?php echo $data->totals->come;?></td>
					<td class="uk-text-center"><?php echo $data->totals->not_come;?></td>
					<td class="uk-text-center"><?php echo $data->totals->late;?></td>
					<td class="uk-text-center"><?php echo $data->totals->leave;?></td>
					<td class="uk-text-center"><?php echo $data->totals->total;?></td>
					<td class="uk-text-center">
						<?php echo $this->helper_lib->getProgressBarHtml($data->totals->advisor_check_percentage);?>
					</td>
					<td class="uk-text-center">
						<?php echo $this->helper_lib->getProgressBarHtml($data->totals->student_activity_percentage);?>
					</td>
					<td class="uk-text-center">
						<?php echo $this->helper_lib->getProgressBarHtml($data->totals->trainer_confirm_percentage);?>
					</td>
				</tr>
			</table>

			<br/>
			<h2><u>สรุป</u></h2>
			<div class="uk-grid">
        		<div class="uk-width-medium-1-4">
        			<h3>สรุปเวลาปฏิบัติงาน</h3>
        			<ul class="uk-list uk-list-striped">
        				<li>มา = <?php echo $data->totals->come;?> วัน</li>
        				<li>ไม่มา = <?php echo $data->totals->not_come;?> วัน</li>
        				<li>สาย = <?php echo $data->totals->late;?> วัน</li>
        				<li>ลา = <?php echo $data->totals->leave;?> วัน</li>
        			</ul>
        		</div>
        		<div class="uk-width-medium-1-4">
        			<h3>สรุปบันทึกปฏิบัติงาน</h3>
        			<ul class="uk-list uk-list-striped">
        				<li>ส่งบันทึกแล้ว = <?php echo $data->totals->student_activity;?> วัน</li>
        			</ul>
        		</div>
        		<div class="uk-width-medium-1-4">
        			<h3>สรุปครูนิเทศน์ตรวจเยี่ยม</h3>
        			<ul class="uk-list uk-list-striped">
        				<li>ตรวจแล้ว = <?php echo $data->totals->advisor_check;?> วัน</li>
        			</ul>
        		</div>
        		<div class="uk-width-medium-1-4">
        			<h3>สรุปผู้ควบคุมตรวจยืนยัน</h3>
        			<ul class="uk-list uk-list-striped">
        				<li>ตรวจแล้ว = <?php echo $data->totals->trainer_confirm;?> วัน</li>
        			</ul>
        		</div>
        	</div>
        	
        	<h2><u>หมายเหตุ</u></h2>
        	<div>
        		<span><u>การตรวจยืนยัน</u></span>
        		บันทึกผล ทำโดยผู้ควบคุมการฝึกงาน หรือครูฝึกงานในสถานประกอบการ ให้การยืนยันในระบบออนไลน์
        	</div>
			<div>
        		<span><u>การตรวจเยี่ยม</u></span>
        		หมายถึง ครูนิเทศน์การฝึกงาน หรือ ครูที่ปรึกษา เข้าตรวจสอบในระบบออนไลน์
        	</div>
		</div>
	</div>
</div>
