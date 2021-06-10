<?php
//
//		- login as user_type: advisor
//		- user_id: 1
//		- models/Homeroomrisk_model: getRisks($homeroom_id, $group_id);
//
$homeroom_item = stdClass Object(
    [id] 				=> 1
    [semester_name] 	=> 'ภาคการเรียนที่ 1/2564'
    [week] 				=> 1
    [join_start] 		=> '2021-06-05'
    [join_end] 			=> '2021-06-07'
    [is_lock] 			=> 0
    [is_lock_remark] 	=> ''
    [groups] 			=> Array(
        [0] => stdClass Object(
            [id] 				=> 1
            [group_name] 		=> 'กลุ่ม 1'
            [minor_name] 		=> 'สาขางานเครื่องยนต์'
            [major_name] 		=> 'สาขาวิชาช่างยนต์'
            [advisor_id] 		=> 1
            [advisor_type] 		=> 'advisor'
            [advisor_status] 	=> 'confirm'
            [students] 	        => Array(
                [0] => stdClass Object(
                    [id] 				=> 1
                    [student_code] 		=> '5839010002'
                    [firstname] 		=> 'จุฑามาศ'
                    [lastname] 		    => 'ปะกาเวสูง'
                    [risk_detail] 	    => ''
                    [risk_comment] 	    => ''
                    [risk_status] 	    => 'risk'
                ),
                [1] => stdClass Object(
                    [id] 				=> 2
                    [student_code] 		=> '5839010024'
                    [firstname] 		=> 'นาย ชยานนท์'
                    [lastname] 		    => 'แก้วปิ่น'
                    [risk_detail] 	    => ''
                    [risk_comment] 	    => ''
                    [risk_status] 	    => 'not_risk'
                )
            )
        )
    )
);
