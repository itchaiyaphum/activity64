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
            <form action="<?php echo base_url('advisor/homeroom/confirm');?>" method="post" name="adminForm" id="adminForm">
            	<div class="uk-button-group uk-width-1-1">
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/activity/?id=".$homeroom->id);?>">STEP 1: เช็คชื่อ</a>
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/obedience/?id=".$homeroom->id);?>">STEP 2: การให้โอวาท</a>
                    <a class="uk-button uk-width-1-4 " href="<?php echo base_url("advisor/homeroom/risk/?id=".$homeroom->id);?>">STEP 3: ประเมินความเสี่ยง</a>
                    <a class="uk-button uk-width-1-4 uk-button-primary" href="<?php echo base_url("advisor/homeroom/confirm/?id=".$homeroom->id);?>">STEP 4: ยืนยันการบันทึกข้อมูล</a>
                </div>
                
                <br/><br/>
            	<h2>สรุปผลการเช็คชื่อ และ ประเมินความเสี่ยง</h2>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">กลุ่มการเรียน: (EV 1 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
                	<hr/>
                	<table class="uk-table" cellpadding="1">
                		<thead>
                			<tr>
                				<th width="5%" class="title">#</th>
                				<th class="title">
                					ชื่อ - นามสกุล
                				</th>
                				<th class="title">
                					สถานะการเช็คชื่อ
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
                					<?php echo $row->firstname; ?> <?php echo $row->lastname; ?>
                				</td>
                				<td>
                					<input class="uk-checkbok" type="checkbox" disabled name="join_status[group_1][<?php echo $row->id;?>]" checked="1"> มา
                				</td>
                				<td>
                					<input class="uk-checkbok" type="checkbox" disabled name="join_status[risk_1][<?php echo $row->id;?>]" checked="1"> ไม่เเสี่ยง
                				</td>
                				<td>
                					- / -
                				</td>
                			</tr>
                		<?php
                			$k = 1 - $k;
                			}
                		}
                		?>
                		</tbody>
                	</table>
                	
                	<h3 class="uk-panel-title">กลุ่มการเรียน: (EV 2 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
                	<hr/>
                	<table class="uk-table" cellpadding="1">
                		<thead>
                			<tr>
                				<th width="5%" class="title">#</th>
                				<th class="title">
                					ชื่อ - นามสกุล
                				</th>
                				<th class="title">
                					สถานะการเช็คชื่อ
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
                					<?php echo $row->firstname; ?> <?php echo $row->lastname; ?>
                				</td>
                				<td>
                					<input class="uk-radio" type="checkbox" disabled name="join_status[group_2][<?php echo $row->id;?>]" checked="1"> มา
                				</td>
                				<td>
                					<input class="uk-radio" type="checkbox" disabled name="join_status[risk_2][<?php echo $row->id;?>]" checked="1"> ไม่เเสี่ยง
                				</td>
                				<td>
                					- / -
                				</td>
                			</tr>
                		<?php
                			$k = 1 - $k;
                			}
                		}
                		?>
                		</tbody>
                	</table>
                	</table>
                	
                	<h3 class="uk-panel-title">กลุ่มการเรียน: (EV 3 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
                	<hr/>
                	<table class="uk-table" cellpadding="1">
                		<thead>
                			<tr>
                				<th width="5%" class="title">#</th>
                				<th class="title">
                					ชื่อ - นามสกุล
                				</th>
                				<th class="title">
                					สถานะการเช็คชื่อ
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
                					<?php echo $row->firstname; ?> <?php echo $row->lastname; ?>
                				</td>
                				<td>
                					<input class="uk-radio" type="checkbox" disabled name="join_status[group_3][<?php echo $row->id;?>]" checked="1"> มา
                				</td>
                				<td>
                					<input class="uk-radio" type="checkbox" disabled name="join_status[risk_3][<?php echo $row->id;?>]" checked="1"> ไม่เเสี่ยง
                				</td>
                				<td>
                					- / -
                				</td>
                			</tr>
                		<?php
                			$k = 1 - $k;
                			}
                		}
                		?>
                		</tbody>
                	</table>
                	
                	<h3 class="uk-panel-title">กลุ่มการเรียน: (EV 4 / สาขารถยนต์ไฟฟ้า / แผนกช่างยนต์)</h3>
                	<hr/>
                	<table class="uk-table" cellpadding="1">
                		<thead>
                			<tr>
                				<th width="5%" class="title">#</th>
                				<th class="title">
                					ชื่อ - นามสกุล
                				</th>
                				<th class="title">
                					สถานะการเช็คชื่อ
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
                					<?php echo $row->firstname; ?> <?php echo $row->lastname; ?>
                				</td>
                				<td>
                					<input class="uk-radio" type="checkbox" disabled name="join_status[group_4][<?php echo $row->id;?>]" checked="1"> มา
                				</td>
                				<td>
                					<input class="uk-radio" type="checkbox" disabled name="join_status[risk_4][<?php echo $row->id;?>]" checked="1"> ไม่เเสี่ยง
                				</td>
                				<td>
                					- / -
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
            	
            	
            	<br/><br/>
            	<h2>สรุปผลการให้โอวาท</h2>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                   <div>
                   		<h3>- เรื่องที่ให้คำแนะนำนักเรียน นักศึกษา</h3>
                   		<div>
                   			<pre>
                   			ตรวจสอบร่างกาย
                            - ไม่อดนอน หลับให้เพียงพอ
                            - เลี่ยงเครื่องดื่มแอลกอฮอล์ และชา-กาแฟ
                            - ต้องไม่มีอาการไข้ หรืออาการเจ็บป่วย
                            - สองวันก่อนและหลังฉีด งดออกกําลังกายอย่างหนัก
                            
                            แจ้งแพทย์ก่อนฉีด
                            - โรคประจําตัว
                            - ประวัติการแพ้ยา หรือวัคซีน
                            - การตั้งครรภ์
                            </pre>
                   		</div>
                   		
                   		<h3>- สถิติการตอบแบบสอบถาม</h3>
                   		<div>
                   			<ul class="uk-list uk-list-line">
                   				<li>จำนวนผู้ตอบแบบสอบถามการคัดกรอง: (100) คน</li>
                   				<li>นักเรียนทั้งหมด: (100) คน</li>
                   				<li>ขาดกิจกรรมโฮมรูม: (1) คน</li>
                   			</ul>
                   		</div>
                   		
                   		<h3>- รูปภาพขณะให้คำแนะนำนักเรียน นักศึกษา เพื่อใช้ประกอบการจัดทำรายงาน</h3>
                   		<div>
                   			<div><img class="uk-thumbnail" src="https://static.posttoday.com/media/content/2018/10/27/E11A0691A10B47C5BF94A4863EF23D43.jpg" alt=""></div>
                   			<div><img class="uk-thumbnail" src="https://siamrath.co.th/files/styles/1140/public/img/20190421/44925e900fb84689de5b40a7294616e6de7ed9fb55bbb10b46696d4c184aab88.jpg?itok=yIOrGssi" alt=""></div>
                   		</div>
                   </div>
            	</div>
            	
            	
            	
            	
            
            	<input type="hidden" name="homeroom_id" value="<?php echo $homeroom->id;?>" />
            	<input type="hidden" name="boxchecked" value="0" />
            </form>
            
            <br/><br/>
        	<div class="uk-panel uk-panel-box uk-panel-box-primary uk-margin-top uk-text-center">
                <button class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#confirm-form'}">กดยืนยันการบันทึกข้อมูล</button>
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
