<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h1>รายละเอียดการกรอกข้อมูลกิจกรรมโฮมรูม</h1>
				</div>
			</div>
			<hr/>
            <form action="<?php echo base_url('headadvisor/homeroom');?>" method="post" name="adminForm">
            	<table class="uk-table">
            		<tr>
            			<td width="100%">
            				Filter:
            				<input type="text" name="homeroom_filter_search" id="search" value="<?php echo set_value('homeroom_filter_search');?>" class="text_area" onchange="document.adminForm.submit();" />
            				<button onclick="this.form.submit();">Go</button>
            				<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_type').value='0';this.form.getElementById('filter_logged').value='0';this.form.submit();">Reset</button>
            			</td>
            			<td nowrap="nowrap">
            			</td>
            		</tr>
            	</table>

				<?php
                foreach ($items as $item) {
					$headdepartment_id = $this->homeroom_lib->getHeadDepartmentByAdvisorId($item->id)
                    $rowHeadAdvisorAction = $this->homeroom_lib->getHomeroomAction($item->id);
                    $userHeadAdvisorType = 'headadvisor';
                    $actionHeadAdvisorStatus = '';
                    if (isset($rowHeadAdvisorAction)) {
                        $userHeadAdvisorType = $rowHeadAdvisorAction->user_type;
                        $actionHeadAdvisorStatus = $rowHeadAdvisorAction->action_status;
                    } ?>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title">
						<?php echo $item->semester_name.' สัปดาห์ที่: '.$item->week; ?> 
						(<?php echo date_format(date_create($item->join_start), 'Y-m-d').' - '.date_format(date_create($item->join_end), 'Y-m-d'); ?>)
						<?php
                        if ($actionHeadAdvisorStatus!='confirmed') {
                            ?>
						<a class="uk-button uk-button-primary uk-button-small" href="<?php echo base_url('headadvisor/homeroom/approve/?homeroom_id='.$item->id); ?>"><i class="uk-icon-send"></i> กดยืนยันการส่งข้อมูล</a>
						<?php
                        } else { ?>
						<a class="uk-button uk-button-danger uk-button-small" href="<?php echo base_url('headadvisor/homeroom/unapprove/?homeroom_id='.$item->id); ?>"><i class="uk-icon-remove"></i> ยกเลิกการส่งข้อมูล</a>
						<?php } ?>
					</h3>
                	<hr/>
                	<table class="uk-table uk-table-hover" cellpadding="1">
                		<thead>
							<tr>
								<th width="5%" class="title">#</th>
								<th width="20%" class="title">
									ชื่อ-นามสกุล
								</th>
								<th class="title" nowrap="">
									สถานะบันทึกกิจกรรมโฮมรูม
								</th>
								<th class="title">
									สถานะการตรวจจากหัวหน้าแผนก
								</th>
							</tr>
                		</thead>
                		<tbody>
                		<?php
                        if (count($items)<=0) {
                            echo '<tr><td colspan="7" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                        } else {
                            $k = 0;
                            for ($i=0, $n=count($advisor_items); $i < $n; $i++) {
                                $row 	=& $advisor_items[$i];

                                $homeroom_id = $item->id;
                                $advisor_id = $row->id;
                                
                                $link_confirm = base_url('headadvisor/homeroom/confirm/?id='.$homeroom_id.'&advisor_id='.$advisor_id); ?>
							<tr class="<?php echo "row$k"; ?>">
								<td>
									<?php echo $this->helper_lib->getPaginationIndex($i+1); ?>
								</td>
								<td>
									<a href="<?php echo $link_confirm; ?>"><?php echo $row->firstname; ?> <?php echo $row->lastname; ?></a>
								</td>
								<td>
								<?php
                                $rowAction = $this->homeroom_lib->getHomeroomAction($homeroom_id, $advisor_id);
                                $userType = 'advisor';
                                $actionStatus = '';
                                if (isset($rowAction)) {
                                    $userType = $rowAction->user_type;
                                    $actionStatus = $rowAction->action_status;
                                }
                                echo $this->homeroom_lib->getActionStatusHtml($userType, $actionStatus); ?>

								<?php
                                if ($actionStatus=='confirmed') {
                                    ?>
								<a class="uk-button uk-button-danger uk-button-small" href="<?php echo base_url('headadvisor/homeroom/remove_confirm/?homeroom_id='.$item->id.'&advisor_id='.$row->id); ?>"><i class="uk-icon-remove"></i> ยกเลิก</a>
								<?php
                                } ?>
								</td>
								<td>
								<?php
                                echo $this->homeroom_lib->getActionStatusHtml($userHeadAdvisorType, $actionHeadAdvisorStatus); ?>
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
            </form>
		</div>
	</div>
</div>
