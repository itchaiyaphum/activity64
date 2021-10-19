<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Summaryhomeroom_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function group($user_id)
    {
        $sql = "SELECT `groups`.`id`, `groups`.`group_name`, `majors`.`major_name` FROM `groups` ,`majors`
        WHERE `groups`.`status`=1 AND `groups`.`id` IN (SELECT `group_id` FROM  `advisors_groups` WHERE `advisor_id`=? AND `status`=1)
        AND `majors`.`id`=`groups`.`major_id`;";
        $query = $this->db->query($sql, $user_id);
        $data = $query->result();
        foreach ($data as $std) {
            $sql_std ="SELECT `users_student`.`user_id`, `users_student`.`firstname`, `users_student`.`lastname`, `users_student`.`student_id`, 
            SUM(CASE WHEN `homeroom_activity_items`.`check_status` = 'come' THEN 1 ELSE 0 END) AS 'come', 
            SUM(CASE WHEN `homeroom_activity_items`.`check_status` = 'late' THEN 1 ELSE 0 END) AS 'late', 
            SUM(CASE WHEN `homeroom_activity_items`.`check_status` = 'leave' THEN 1 ELSE 0 END) AS 'leave', 
            SUM(CASE WHEN `homeroom_activity_items`.`check_status` = 'not_come' THEN 1 ELSE 0 END) AS 'not_come',
            COUNT(`homeroom_activity_items`.`check_status`) AS 'sum'
            FROM `users_student` 
            LEFT JOIN `homeroom_activity_items`
            ON `homeroom_activity_items`.`student_id`=`users_student`.`user_id`
            WHERE `users_student`.`group_id`=? AND `users_student`.`status`=1
            GROUP BY `users_student`.`user_id`;";
            $query_std = $this->db->query($sql_std, $std->id);
            $std->students = $query_std->result();
            $std->not_pass = 0;
            $std->pass = 0;
            
            foreach($std->students as $std_row) {
                $come_sum = $std_row->sum - ($std_row->late/4 + $std_row->leave/2 + $std_row->not_come);
                $std_row->percent = round($come_sum/$std_row->sum * 100);
                if ($std_row->percent >= 60) {
                    $std_row->result = '<span class="uk-text-success">ผ่าน</span>';
                    $std->pass++;
                } else {
                    $std_row->result = '<span class="uk-text-danger">ไม่ผ่าน</span>';
                    $std->not_pass++;
                }
                
            }
            $std->all = $std->pass+$std->not_pass;
        }

        return $data;
    }
}