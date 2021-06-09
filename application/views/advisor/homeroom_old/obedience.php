<?php
$attributes = array('class' => 'uk-form uk-form-horizontal', 'id' => 'adminForm', 'method'=>'post');
?>
<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>บันทึกกิจกรรมโฮมรูม > ให้โอวาท สัปดาห์ที่ (<?php echo $homeroom->week;?>)</h2>
				</div>
			</div>
			<hr/>
			<?php echo form_open_multipart('advisor/homeroom/obedience_save', $attributes); ?>
            	<div class="uk-button-group uk-width-1-1">
                    <a class="uk-button uk-width-1-4" href="<?php echo base_url("advisor/homeroom/activity/?id=".$homeroom->id);?>"><i class="uk-icon-check-circle"></i> STEP 1: เช็คชื่อ</a>
                    <a class="uk-button uk-width-1-4 uk-button-primary" href="<?php echo base_url("advisor/homeroom/obedience/?id=".$homeroom->id);?>">STEP 2: การให้โอวาท</a>
                    <a class="uk-button uk-width-1-4" href="<?php echo base_url("advisor/homeroom/risk/?id=".$homeroom->id);?>">STEP 3: ประเมินความเสี่ยง</a>
                    <a class="uk-button uk-width-1-4" href="<?php echo base_url("advisor/homeroom/confirm/?id=".$homeroom->id);?>">STEP 4: ยืนยันการบันทึกข้อมูล</a>
                </div>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h2>แบบบันทึกรายงาน การปฏิบัติงานของครูที่ปรึกษา</h2>
            		<div>สัปดาห์ที่ 1 วันที่ 26 เดือน สิงหาคม พ.ศ. 2564</div>
                	<hr/>
                	<h3 class="uk-panel-title">เรื่องที่ให้คำแนะนำ นักเรียน นักศึกษา</h3>
                	<div>
                		<textarea name="obe_detail" cols="" rows="10" class="uk-width-1-1"><?php echo $obedience->obe_detail;?></textarea>
                	</div>
            	</div>
            	
               <div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
               		<br/>
                	<h3 class="uk-panel-title">แบบประเมินตนเอง สำหรับนักเรียน นักศึกษา โดยผ่านการสแกน QR Code เพื่อเป็นการเฝ้าระวังและป้องกันการแพร่ระบาดของโควิต 19</h3>
                	<hr/>
               		<h3>สถิติการตอบแบบสอบถามประเมินตนเอง</h3>
               		<div>
               			<ul class="uk-list uk-list-line">
               				<li>จำนวนผู้ตอบแบบสอบถามการคัดกรอง: <input type="number" name="survey_amount" min="0" max="<?php echo $student_amount;?>" class="uk-form-width-mini uk-form-small" value="<?php echo $obedience->survey_amount;?>"/> คน</li>
               				<li>นักเรียนทั้งหมด: (<?php echo $student_amount;?>) คน</li>
               			</ul>
               		</div>
               	</div>
               	
               	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
               		
               		<h3>รูปภาพขณะให้คำแนะนำนักเรียน นักศึกษา เพื่อใช้ประกอบการจัดทำรายงาน</h3>
               		<hr/>
               		<div class="uk-margin-top">
               			<div>กรุณาเลือกไฟล์รูปภาพ 2 รูป</div>
               			<input type="file" class="uk-button uk-width-1-2 uk-margin-top" name="upload_file_1"/>
               			<input type="file" class="uk-button uk-width-1-2 uk-margin-top" name="upload_file_2"/>
						<div class="uk-margin-top">
						<?php
                        for ($i=0; $i<count($obedience_attactments); $i++) {
                            $row = $obedience_attactments[$i]; ?>
							<img class="uk-thumbnail uk-width-1-1" src="<?php echo $row->img; ?>" alt="">
						<?php
                        } ?>
						</div>
               		</div>
              	</div>
            	
            	<input type="hidden" name="id" value="<?php echo $obedience->id;?>" />
            	<input type="hidden" name="homeroom_id" value="<?php echo $homeroom->id;?>" />
            	<input type="hidden" name="advisor_id" value="<?php echo $advisor_id;?>" />
            </form>
            
            <br/><br/>
        	<div class="uk-panel uk-panel-box uk-panel-box-primary uk-margin-top uk-text-center">
			<?php
                $rowAction = $this->homeroom_lib->getHomeroomAction($homeroom->id);
                $actionStatusButton = '';
                $actionTextButton = 'บันทึกข้อมูล';
                if (isset($rowAction)) {
                    if ($rowAction->action_status=='confirmed') {
                        $actionStatusButton = 'disabled';
                        $actionTextButton = 'ยืนยันการบันทึกข้อมูลเรียบร้อยแล้ว';
                    }
                }
                if ($actionStatusButton!='') {
                    ?>
				<a class="uk-button uk-button-primary uk-button-large" href="<?php echo base_url('/advisor/homeroom'); ?>"><i class="uk-icon-home"></i> กลับหน้าหลัก</a>
				<?php
                }
                ?>
				<button <?php echo $actionStatusButton; ?> class="uk-button uk-button-primary uk-button-large" data-uk-modal="{target:'#confirm-form'}"><?php echo $actionTextButton; ?></button>
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
