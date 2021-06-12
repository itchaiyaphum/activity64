<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<form action="<?php echo base_url('headadvisor/approving');?>" method="post" name="adminForm">
				<div class="uk-clearfix">
					<div>
						<h2>อนุมัติการบันทึกข้อมูลกิจกรรมโฮมรูม</h2>
					</div>
				</div>
				<hr/>

				<div class="uk-accordion" data-uk-accordion>
				<?php
                foreach ($approvings as $major) {
                    ?>
					<h1 class="uk-accordion-title uk-margin-top uk-margin-bottom">สาขาวิชา: <?php echo $major->major_name; ?></h1>
					<div class="uk-accordion-content">
					<?php
                    foreach ($major->homerooms as $homeroom) {
                        ?>
						<h3 class="uk-alert uk-alert-primary"><?php echo $homeroom->semester_name.' สัปดาห์ที่: '.$homeroom->week; ?> (<?php echo date_format(date_create($homeroom->join_start), 'Y-m-d').' - '.date_format(date_create($homeroom->join_end), 'Y-m-d'); ?>)</h3>
						<?php
                        foreach ($homeroom->minors as $minor) {
                            $links = array(
                                'approve' => base_url("headadvisor/approving/approve_all/?homeroom_id={$homeroom->id}&minor_id={$minor->minor_id}"),
                                'unapprove' => base_url("headadvisor/approving/unapprove_all/?homeroom_id={$homeroom->id}&minor_id={$minor->minor_id}")
                            ); ?>
						<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
							<h3 class="uk-panel-title">
								สาขางาน: <?php echo $minor->minor_name; ?>
								<div class="uk-float-right">
									<?php echo $this->homeroom_lib->getApproveAllStatusHtml($minor, $links); ?>
								</div>
							</h3>
							<hr/>
							<table class="uk-table uk-table-hover" cellpadding="1">
								<thead>
									<tr>
										<th>
											กลุ่มการเรียน
										</th>
										<th width="35%">
											สถานะบันทึกกิจกรรมโฮมรูม
										</th>
										<th width="20%">
											รับรองจากหัวหน้าแผนก
										</th>
										<th width="25%">
											รับรองจากหัวหน้างานครูฯ
										</th>
									</tr>
								</thead>
								<tbody>
								<?php
                                if (count($minor->groups)<=0) {
                                    echo '<tr><td colspan="7" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                                } else {
                                    foreach ($minor->groups as $group) {
                                        $link_confirm = base_url('headadvisor/approving/confirm/?homeroom_id='.$homeroom->id.'&group_id='.$group->group_id); ?>
									<tr>
										<td>
											<a href="<?php echo $link_confirm; ?>"><?php echo $group->group_name; ?></a>
											<?php
                                            foreach ($group->advisors as $advisor) {
                                                ?>
												<div><?php echo $advisor->firstname." ".$advisor->lastname; ?></div>
												<?php
                                            } ?>
										</td>
										<td>
											<?php
                                            $links = array(
                                                'view' => base_url("headadvisor/approving/confirm/?homeroom_id={$homeroom->id}&group_id={$group->group_id}"),
                                                'remove' => base_url("headadvisor/approving/remove_confirm/?homeroom_id={$homeroom->id}&group_id={$group->group_id}")
                                            );
                                        echo $this->headadvisorapproving_model->getAdvisorStatusHtml($group->advisors, $group->approving, $links); ?>
										</td>
										<td>
											<?php
                                            $links = array(
                                                'view' => base_url("headadvisor/approving/confirm/?homeroom_id={$homeroom->id}&group_id={$group->group_id}"),
                                                'approve' => base_url("headadvisor/approving/approve/?homeroom_id={$homeroom->id}&group_id={$group->group_id}"),
                                                'remove' => base_url("headadvisor/approving/unapprove/?homeroom_id={$homeroom->id}&group_id={$group->group_id}")
                                            );
                                        echo $this->headadvisorapproving_model->getHeadDepartmentStatusHtml($group->approving, $links); ?>
										</td>
										<td>
										<?php
                                            $links = array(
                                                'view' => base_url("headadvisor/approving/confirm/?homeroom_id={$homeroom->id}&group_id={$group->group_id}"),
                                                'approve' => base_url("headadvisor/approving/approve/?homeroom_id={$homeroom->id}&group_id={$group->group_id}"),
                                                'remove' => base_url("headadvisor/approving/unapprove/?homeroom_id={$homeroom->id}&group_id={$group->group_id}")
                                            );
                                        echo $this->headadvisorapproving_model->getHeadAdvisorStatusHtml($group->approving, $links); ?>
										</td>
									</tr>
								<?php
                                    }
                                } ?>
								</tbody>
							</table>
						</div>
						<br/><br/>
						<?php
                        }
                    } ?>
					</div>
				<?php
                }?>
				</div>
            </form>
		</div>
	</div>
</div>
