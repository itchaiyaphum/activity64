<div class="uk-container uk-container-center">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $leftmenu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h1>บันทึกกิจกรรมโฮมรูม</h1>
				</div>
			</div>
			<hr/>
            <form action="<?php echo base_url('advisor/homeroom');?>" method="post" name="adminForm">
				<?php
                foreach ($homeroom_items as $homeroom) {
                    ?>
            	<div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top">
                    <h3 class="uk-panel-title"><?php echo $homeroom->semester_name.' / สัปดาห์ที่: '.$homeroom->week.' / วันที่เริ่มต้น-สิ้นสุด: '; ?>
					( <?php echo $this->helper_lib->getDate($homeroom->join_start); ?> - 
            		<?php echo $this->helper_lib->getDate($homeroom->join_end); ?> )</h3>
                	<hr/>
                	<table class="uk-table uk-table-hover" cellpadding="1">
                		<thead>
                			<tr>
                				<th width="5%" class="title">#</th>
                				<th class="title" width="30%">
                					กลุ่มการเรียน
                				</th>
                				<th class="title">
                					สถานะที่ปรึกษา
                				</th>
                				<th class="title">
                					สถานะการบันทึกข้อมูล
                				</th>
								<th class="title">
                					-
                				</th>
                			</tr>
                		</thead>
                		<tbody>
                		<?php
                        if (count($homeroom->groups)<=0) {
                            echo '<tr><td colspan="6" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                        } else {
                            $k = 0;
                            for ($i=0, $n=count($homeroom->groups); $i < $n; $i++) {
                                $group 	= $homeroom->groups[$i];
                                $link_activity = base_url("advisor/homeroom/activity?id={$homeroom->id}&group_id={$group->id}"); ?>
                			<tr class="<?php echo "row$k"; ?>">
                				<td>
                					<?php echo($i+1); ?>
                				</td>
                				<td>
									<div><?php echo $group->group_name; ?></div>
									<div><?php echo $group->minor_name; ?></div>
									<div><?php echo $group->major_name; ?></div>
                				</td>
                				<td>
									<?php echo $this->homeroom_lib->getAdvisorTypeText($group->advisor_type); ?>
                				</td>
                				<td>
									<?php echo $this->homeroom_lib->getAdvisorStatusHtml($group->advisor_type, $group->advisor_status); ?>
                				</td>
                				<td class="uk-text-center">
									<?php echo $this->homeroom_lib->getEditButtonHtml($homeroom->id, $group->id, $link_activity); ?>
									<?php echo $this->homeroom_lib->getPrintButtonHtml($homeroom->id, $group->id, $group->advisor_type); ?>
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
