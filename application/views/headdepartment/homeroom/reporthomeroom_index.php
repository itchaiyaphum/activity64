<div class="uk-container uk-container-center">
    <div class="uk-grid">
        <div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
            <?php echo $leftmenu; ?>
        </div>
        <div class="tm-main uk-width-medium-3-4 uk-margin-top uk-margin-bottom">
            <div class="uk-clearfix">
                <div class="uk-float-left">
                    <h1>รายงาน การปฎิบัติงานของครูที่ปรึกษา(คป 06)</h1>
                </div>
            </div>
            <hr />

            <div class="uk-panel uk-panel-box uk-panel-box-default uk-margin-top uk-overflow-container">
                <form action="<?php echo base_url('headdepartment/reporthomeroom/report'); ?>" class="uk-form" method="post" target="_blank">

                    <div class="uk-panel-badge">
                        <button class="uk-button uk-button-primary uk-button-mini submit" type="submit" disabled><i class="uk-icon-print"></i> Print</button>
                    </div>
                    <!-- uk-table-responsive -->
                    <table class="uk-table uk-table-striped" cellpadding="1">
                        <thead>
                            <tr>
                                <th width="15%" rowspan="2" class="uk-table-middle uk-text-center">
                                <span class="uk-hidden-small">สัปดาห์</span>
                                </th>
                                <th width="15%" rowspan="2" class="uk-table-middle uk-text-center">
                                    กลุ่มการเรียน
                                </th>
                                <th colspan="4" class="uk-text-center">
                                    สถานะการอนุมัติ
                                </th>
                                <th width="25%" class="uk-table-middle uk-text-center" style="border-bottom: none;">
                                    เลือกพิมพ์รายงาน<br />
                                </th>
                            </tr>
                            <tr>
                                <th class="uk-text-center">
                                    ครูที่ปรึกษา
                                </th>
                                <th class="uk-text-center">
                                    หัวหน้าแผนกฯ
                                </th>
                                <th class="uk-text-center">
                                    หัวหน้างานครูที่ปรึกษา
                                </th>
                                <th class="uk-text-center">
                                    รองผู้อำนวยการ
                                </th>
                                <th class="uk-text-center">
                                    <button class="uk-button uk-button-mini" id="checkbutton" type="button">
                                        <label class="uk-text-middle uk-display-block"><input type="checkbox" name="all" id="checkall" class="uk-margin-small-right uk-padding-bottom-remove" style="position: relative; bottom: -3px;" />เลือกทั้งหมด</label>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['week'] as $week) {
                                $group_count = count($week->group);
                                $week_num = 0;
                                foreach ($week->group as $group) {

                            ?>
                                    <tr>

                                        <?php
                                        if ($week_num === 0) {
                                        ?>
                                            <td rowspan="<?php echo $group_count; ?>" class="uk-table-middle uk-text-center">
                                                <span class="uk-visible-large">สัปดาห์ที่</span> <?php echo $week->week; ?>
                                            </td>
                                        <?php
                                        }
                                        ?>
                                        <td class="uk-text-center">
                                            <?php echo $group->group_name; ?>
                                        </td>
                                        <td class="uk-text-center">
                                            <?php echo $group->advisor_check; ?>
                                        </td>
                                        <td class="uk-text-center">
                                            <?php echo $group->headdepartment_check; ?>
                                        </td>
                                        <td class="uk-text-center">
                                            <?php echo $group->headadvisor_check; ?>
                                        </td>
                                        <td class="uk-text-center">
                                            <?php echo $group->executive_check; ?>
                                        </td>
                                        <td class="uk-text-center">
                                            <?php echo $group->checkbox; ?>
                                        </td>
                                    </tr>
                            <?php
                                    $week_num++;
                                }
                            }
                            $week_num = 0;
                            ?>
                        </tbody>
                    </table>
                    <button class="uk-button uk-button-primary uk-float-right submit" type="submit" disabled><i class="uk-icon-print"></i> Print</button>
                </form>
            </div>


            <script>
                $('#checkall').change(function() {
                    $('.week-checkbox').prop('checked', this.checked)
                });

                $('.week-checkbox').change(function() {
                    if ($('.week-checkbox:checked').length == $('.week-checkbox').length) {
                        $('#checkall').prop('checked', true)
                    } else {
                        $('#checkall').prop('checked', false)
                    }
                });

                function checkbox() {
                    if ($(".week-checkbox").filter(':checked').length > 0) {
                        $('.submit').prop('disabled', false)
                    } else {
                        $('.submit').prop('disabled', true)
                    }
                }
                $('.week-checkbox').change(function() {
                    checkbox()
                })
                $('#checkall').change(function() {
                    checkbox()
                })
            </script>


        </div>
    </div>
</div>