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
            
            	<table class="uk-table" cellpadding="1">
            		<thead>
            			<tr>
            				<th width="5%" class="title">#</th>
            				<th width="20%" class="title">
            					ภาคการเรียน
            				</th>
            				<th class="title">
            					สัปดาห์ที่
            				</th>
            				<th width="13%" class="title">
            					วันที่เริ่มต้น
            				</th>
            				<th width="13%" class="title" width="20%">
            					วันที่สิ้นสุด
            				</th>
            				<th width="10%" class="title" nowrap="nowrap">
            					พิมพ์รายงาน
            				</th>
            				<th class="title" nowrap="">
            					สถานะบันทึกกิจกรรมโฮมรูม
            				</th>
            			</tr>
            		</thead>
            		<tfoot>
            			<tr>
            				<td colspan="10" class="uk-text-center">
            					<ul class="uk-pagination"><?php echo $pagination->create_links(); ?></ul>
            				</td>
            			</tr>
            		</tfoot>
            		<tbody>
            		<?php
                    if (count($items)<=0) {
                        echo '<tr><td colspan="7" class="uk-text-center"><p>ไม่มีข้อมูล</p></td></tr>';
                    } else {
                        $k = 0;
                        for ($i=0, $n=count($items); $i < $n; $i++) {
                            $row 	=& $items[$i];
                            
                            $link_activity = base_url('advisor/homeroom/activity/?id='.$row->id);
                            $link_obedience = base_url('advisor/homeroom/obedience/?id='.$row->id);
                            $link_risk = base_url('advisor/homeroom/risk/?id='.$row->id);
                            $link_confirm = base_url('advisor/homeroom/confirm/?id='); ?>
            			<tr class="<?php echo "row$k"; ?>">
            				<td>
            					<?php echo $this->helper_lib->getPaginationIndex($i+1); ?>
            				</td>
            				<td>
            					<a href="<?php echo $link_activity; ?>"><?php echo $row->semester_name; ?></a>
            				</td>
            				<td>
            					<a href="<?php echo $link_activity; ?>"><?php echo $row->week; ?></a>
            				</td>
            				<td>
            					<a href="<?php echo $link_activity; ?>"><?php echo date_format(date_create($row->join_start), 'Y-m-d'); ?></a>
            				</td>
            				<td>
            					<a href="<?php echo $link_activity; ?>"><?php echo date_format(date_create($row->join_end), 'Y-m-d'); ?></a>
            				</td>
            				<td class="uk-text-center">
								<button disabled class="uk-button"><i class="uk-icon-print"></i></button>
            				</td>
            				<td>
							<?php
                            $rowAction = $this->homeroom_lib->getHomeroomAction($row->id);
                            $userType = 'advisor';
                            $actionStatus = '';
                            if (isset($rowAction)) {
                                $userType = $rowAction->user_type;
                                $actionStatus = $rowAction->action_status;
                            }
                            echo $this->homeroom_lib->getActionStatusHtml($userType, $actionStatus); ?>
            				</td>
            			</tr>
            		<?php
                        $k = 1 - $k;
                        }
                    }
                    ?>
            		</tbody>
            	</table>
            
            	<input type="hidden" name="boxchecked" value="0" />
            </form>

		</div>
	</div>
</div>
