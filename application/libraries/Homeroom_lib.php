<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homeroom_lib
{
    public $ci = null;

    public function __construct()
    {
        $this->ci = & get_instance();
    }

    /*
    //  ==================== All ====================
    */
    public function convertStatusText($key=null)
    {
        $values = array(
            'come' => '<div class="uk-badge uk-badge-success">มา</div>',
            'not_come' => '<div class="uk-badge uk-badge-danger">ขาด</div>',
            'late' => '<div class="uk-badge uk-badge-warning">สาย</div>',
            'leave' => '<div class="uk-badge uk-badge-warning">ลา</div>',
            'risk' => '<div class="uk-badge uk-badge-danger">เสี่ยง</div>',
            'not_risk' => '<div class="uk-badge uk-badge-success">ไม่เสี่ยง</div>'
        );
        $value = $key;
        if (isset($key)) {
            if (isset($values[$key])) {
                $value = $values[$key];
            }
        }
        return $value;
    }


    /*
    //  ==================== Student ====================
    */
    public function getStudentItems($group_id=0)
    {
        $sql = "SELECT group_id, user_id, student_id as student_code, firstname, lastname FROM users_student 
                    WHERE group_id={$group_id} AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }




    /*
    // ==================== Groups ====================
    */
    public function getGroupsByAdvisor($advisor_id=0)
    {
        if ($advisor_id==0) {
            $advisor_id = $this->ci->profile_lib->getUserId();
        }
        $sql = "SELECT groups.*,majors.major_name,minors.minor_name FROM groups 
                    LEFT JOIN majors ON (groups.major_id=majors.id)
                    LEFT JOIN minors ON (groups.minor_id=minors.id)
                    WHERE groups.id IN (SELECT group_id FROM advisors_groups WHERE advisor_id={$advisor_id} AND status=1) 
                            AND groups.status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getGroupItem($group_id=0)
    {
        $sql = "SELECT groups.*,majors.major_name,minors.minor_name FROM groups 
                    LEFT JOIN majors ON (groups.major_id=majors.id)
                    LEFT JOIN minors ON (groups.minor_id=minors.id)
                    WHERE groups.id={$group_id} AND groups.status=1";
        $query = $this->ci->db->query($sql);
        $item = $query->row();
        return $item;
    }

    


    
    /*
    //  ==================== Homeroom ====================
    */
    public function getSaveButton($homeroom_id=0, $group_id=0, $link='advisor/homeroom')
    {
        $action_item = $this->getActionItem($homeroom_id, $group_id);

        $advisor_status = 'pending';
        if (isset($action_item)) {
            if ($action_item->homeroom_id==$homeroom_id && $action_item->group_id==$group_id) {
                $advisor_status = $action_item->action_status;
            }
        }

        $html = '';
        if ($advisor_status=='confirmed') {
            $link_to = base_url($link);
            $html .= "<a class='uk-button uk-button-primary uk-button-large' href='{$link_to}'><i class='uk-icon-home'></i> กลับหน้าหลัก</a> ";
            $html .= "<button disabled class='uk-button uk-button-primary uk-button-large' data-uk-modal=\"{target:'#confirm-form'}\">ยืนยันการบันทึกข้อมูลเรียบร้อยแล้ว</button>";
        } else {
            $html .= "<button class='uk-button uk-button-primary uk-button-large' data-uk-modal=\"{target:'#confirm-form'}\">กดบันทึกข้อมูล</button>";
        }
        return $html;
    }



    /*
    //  ==================== Homeroom Action ================================
    */
    public function saveAction($action_status='viewed', $homeroom_id=0, $group_id=0, $advisor_id=0)
    {
        $advisor_type = $this->getUserType($group_id);
        if ($advisor_id==0) {
            $advisor_id = $this->ci->profile_lib->getUserId();
        }
        
        $action_item = array(
            'homeroom_id' => $homeroom_id,
            'group_id' => $group_id,
            'user_id' => $advisor_id,
            'user_type' => $advisor_type,
            'action_status' => $action_status,
            'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
            'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
            'status' => 1
        );
        
        // clear old homeroom action
        $this->ci->db->delete('homeroom_actions', array('homeroom_id' => $homeroom_id, 'group_id' => $group_id, 'user_id' => $advisor_id));
        
        // insert homeroom action
        return $this->ci->db->insert('homeroom_actions', $action_item);
    }

    public function getActionItem($homeroom_id=0, $group_id=0)
    {
        $sql = "SELECT * FROM homeroom_actions 
                    WHERE homeroom_id={$homeroom_id} AND group_id={$group_id} AND status=1";
        $query = $this->ci->db->query($sql);
        $item = $query->row();
        return $item;
    }

    public function getActionItems($homeroom_id=0, $group_id=0, $advisor_id=0)
    {
        if ($advisor_id==0) {
            $advisor_id = $this->ci->profile_lib->getUserId();
        }
        
        $group_ids = $group_id;
        if ($group_id==0) {
            $group_items = $this->getGroupsByAdvisor($advisor_id);
            $groups = array();
            foreach ($group_items as $group) {
                array_push($groups, $group->id);
            }
            $group_ids = implode(',', $groups);
        }

        $sql = "SELECT * FROM homeroom_actions 
                    WHERE homeroom_id={$homeroom_id} AND user_id IN (SELECT DISTINCT advisor_id FROM advisors_groups WHERE group_id IN({$group_ids})) 
                            AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }




    /*
    //  ==================== Advisor ====================
    */
    public function getUserType($group_id=0)
    {
        $sql = "SELECT advisor_type FROM advisors_groups WHERE group_id={$group_id}";
        $query = $this->ci->db->query($sql);
        $item = $query->row();

        $advisor_type = '';
        if (isset($item)) {
            $advisor_type = $item->advisor_type;
        }
        return $advisor_type;
    }

    public function getAdvisorGroupsItems($group_id=0)
    {
        $group_ids = $group_id;
        if ($group_id==0) {
            //get all groups items
            $group_items = $this->getGroupsByAdvisor();
            $groups = array();
            foreach ($group_items as $group) {
                array_push($groups, $group->id);
            }
            $group_ids = implode(',', $groups);
        }

        $sql = "SELECT * FROM advisors_groups WHERE group_id IN({$group_ids}) AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getAdvisorType($group_id=0, $advisor_id=0)
    {
        if ($advisor_id==0) {
            $advisor_id = $this->ci->profile_lib->getUserId();
        }
        $advisor_groups = $this->getAdvisorGroupsItems($group_id);

        $advisor_type = '';
        foreach ($advisor_groups as $advisor) {
            $advisor_type = $advisor->advisor_type;
            break;
        }
        return $advisor_type;
    }

    // Deplicate: will remove soon
    public function getActionStatusHtml($user_type='advisor', $checkStatus='')
    {
        $html = '';
        $checkStatusHtml = '';

        // user_type: advisor
        if ($user_type=='advisor') {
            if ($checkStatus=='viewed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-eye"></i></button>
                                            <button class="uk-button uk-button-mini">ครูที่ปรึกษาหลัก (กำลังบันทึกข้อมูล)</button>
                                        </div>';
            } elseif ($checkStatus=='confirmed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-mini"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button uk-button-success uk-button-mini">ครูที่ปรึกษาหลัก (ยืนยันการกรอกข้อมูลแล้ว)</button>
                                        </div>';
            } else {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-circle-o"></i></button>
                                            <button class="uk-button uk-button-mini">ครูที่ปรึกษาหลัก (รอการบันทึกข้อมูล)</button>
                                        </div>';
            }
            $html .= $checkStatusHtml;
        }
        // user_type: coadvisor
        elseif ($user_type=='coadvisor') {
            if ($checkStatus=='viewed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-eye"></i></button>
                                            <button class="uk-button uk-button-mini">ครูที่ปรึกษาร่วม (เปิดอ่านแล้ว)</button>
                                        </div>';
            } elseif ($checkStatus=='joinded') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-mini"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button uk-button-success uk-button-mini">ครูที่ปรึกษาร่วม (ยืนยันการเข้าร่วมกิจกรรมแล้ว)</button>
                                        </div>';
            } else {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-circle-o"></i></button>
                                            <button class="uk-button uk-button-mini">ครูที่ปรึกษาร่วม (ยังไม่เปิดอ่าน)</button>
                                        </div>';
            }
            $html .= $checkStatusHtml;
        }
        // user_type: headdepartment
        elseif ($user_type=='headdepartment') {
            if ($checkStatus=='viewed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-eye"></i></button>
                                            <button class="uk-button uk-button-mini">หัวหน้าแผนก (เปิดอ่านแล้ว)</button>
                                        </div>';
            } elseif ($checkStatus=='confirmed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-mini"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button uk-button-success uk-button-mini">หัวหน้าแผนก (รับรองการส่งแล้ว)</button>
                                        </div>';
            } else {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-circle-o"></i></button>
                                            <button class="uk-button uk-button-mini">หัวหน้าแผนก (ยังไม่ได้เปิดอ่าน)</button>
                                        </div>';
            }
            $html .= $checkStatusHtml;
        }
        // user_type: headadvisor
        elseif ($user_type=='headadvisor') {
            if ($checkStatus=='viewed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-eye"></i></button>
                                            <button class="uk-button uk-button-mini">หัวหน้างานครูที่ปรึกษา (ยังไม่ได้รับการรับรอง)</button>
                                        </div>';
            } elseif ($checkStatus=='approved') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-mini"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button uk-button-success uk-button-mini">หัวหน้างานครูที่ปรึกษา (รับรองการส่งแล้ว)</button>
                                        </div>';
            } else {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-circle-o"></i></button>
                                            <button class="uk-button uk-button-mini">หัวหน้างานครูที่ปรึกษา (ยังไม่ได้เปิดอ่าน)</button>
                                        </div>';
            }
            $html .= $checkStatusHtml;
        }
        // user_type: executive
        elseif ($user_type=='executive') {
            if ($checkStatus=='approved') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-mini"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button uk-button-success uk-button-mini">ฝ่ายบริหาร (รับรองเรียบร้อยแล้ว)</button>
                                        </div>';
            } else {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-circle-o"></i></button>
                                            <button class="uk-button uk-button-mini">ฝ่ายบริหาร (ยังไม่ได้รับการรับรอง)</button>
                                        </div>';
            }
            $html .= $checkStatusHtml;
        }

        return $html;
    }



    /*
    // ==================== Activity ====================
    */
    public function getActivityItems($homeroom_id=0, $group_id=0)
    {
        $sql = "SELECT * FROM homeroom_activity_items 
                    WHERE homeroom_id={$homeroom_id} AND group_id={$group_id} AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }



    /*
    // ==================== Risk ====================
    */
    public function getRiskItems($homeroom_id=0, $group_id=0)
    {
        $sql = "SELECT * FROM homeroom_risk_items 
                    WHERE homeroom_id={$homeroom_id} AND group_id={$group_id} AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }
}
