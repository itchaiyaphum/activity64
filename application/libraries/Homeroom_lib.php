<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homeroom_lib
{
    public $ci = null;

    public function __construct()
    {
        $this->ci = & get_instance();
    }

    private function getRoles()
    {
        $ROLES = array(
            'student',
            'advisor',
            'headdepartment',
            'headadvisor',
            'staff',
            'executive',
            'admin'
        );
        return $ROLES;
    }

    public function checkPermission($user_id=0, $permissions=array())
    {
    }

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

    public function getAdvisorStatusHtml($user_type='advisor', $checkStatus='')
    {
        $html = '';
        $checkStatusHtml = '';

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
        } elseif ($user_type=='coadvisor') {
            if ($checkStatus=='viewed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-eye"></i></button>
                                            <button class="uk-button uk-button-mini">ครูที่ปรึกษาร่วม (กำลังบันทึกข้อมูล)</button>
                                        </div>';
            } elseif ($checkStatus=='confirmed') {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-success uk-button-mini"><i class="uk-icon-check"></i></button>
                                            <button class="uk-button uk-button-success uk-button-mini">ครูที่ปรึกษาร่วม (ยืนยันการกรอกข้อมูลแล้ว)</button>
                                        </div>';
            } else {
                $checkStatusHtml = '<div class="uk-button-group">
                                            <button class="uk-button uk-button-mini"><i class="uk-icon-circle-o"></i></button>
                                            <button class="uk-button uk-button-mini">ครูที่ปรึกษาร่วม (รอการบันทึกข้อมูล)</button>
                                        </div>';
            }
            $html .= $checkStatusHtml;
        }
        
        return $html;
    }

    public function getEditButtonHtml($homeroom_id=0, $group_id=0, $link='')
    {
        $html = '';
        $checkStatusHtml = '';
        
        $checkStatusHtml = "<a href='{$link}' class='uk-button uk-button-primary uk-button-small'><i class='uk-icon-pencil'></i> บันทึกข้อมูล</a>";
        $html .= $checkStatusHtml;
        
        return $html;
    }

    public function getPrintButtonHtml($homeroom_id=0, $group_id=0, $user_type='advisor')
    {
        $html = '';
        $checkStatusHtml = '';
        
        $checkStatusHtml = '<button disabled class="uk-button uk-button-small"><i class="uk-icon-print"></i></button>';
        $html .= $checkStatusHtml;
        
        return $html;
    }

    public function getHomeroomAction($homeroom_id=0, $user_id=0)
    {
        if ($user_id==0) {
            $user_id = $this->ci->tank_auth->get_user_id();
        }
        $sql = 'SELECT * FROM homeroom_actions WHERE homeroom_id='. $homeroom_id.' AND user_id='.$user_id;
        $query = $this->ci->db->query($sql);
        $row = $query->row();
        return $row;
    }
    
    public function getAdvisorTypeText($advisor_type='')
    {
        $advisor_text = '';
        if ($advisor_type=='advisor') {
            $advisor_text = '<div class="uk-badge">เป็นที่ปรึกษาหลัก</div>';
        } elseif ($advisor_type=='coadvisor') {
            $advisor_text = '<div class="uk-badge uk-badge-warning">เป็นที่ปรึกษาร่วม</div>';
        }
        return $advisor_text;
    }

    public function getActivityActionItem($homeroom_id=0, $group_id=0)
    {
        $sql = "SELECT * FROM homeroom_actions 
                    WHERE homeroom_id={$homeroom_id} AND group_id={$group_id} AND status=1";
        $query = $this->ci->db->query($sql);
        $item = $query->row();
        return $item;
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

    public function getActivityItems($homeroom_id=0, $group_id=0)
    {
        $sql = "SELECT * FROM homeroom_activity_items 
                    WHERE homeroom_id={$homeroom_id} AND group_id={$group_id} AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getStudentItems($group_id=0)
    {
        $sql = "SELECT group_id, user_id, student_id as student_code, firstname, lastname FROM users_student 
                    WHERE group_id={$group_id} AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getActivityButton($homeroom_id=0, $group_id=0, $link='advisor/homeroom')
    {
        $activity_action_item = $this->getActivityActionItem($homeroom_id, $group_id);

        $advisor_status = 'pending';
        if (isset($activity_action_item)) {
            if ($activity_action_item->homeroom_id==$homeroom_id && $activity_action_item->group_id==$group_id) {
                $advisor_status = $activity_action_item->action_status;
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

    public function saveAction($action_status='viewed', $homeroom_id=0, $group_id=0, $advisor_id=0)
    {
        //TODO: get user_type from advisor_group table
        $user_type = 'advisor';
        if ($advisor_id==0) {
            $advisor_id = $this->ci->profile_lib->getUserId();
        }
        
        $action_item = array(
            'homeroom_id' => $homeroom_id,
            'group_id' => $group_id,
            'user_id' => $advisor_id,
            'user_type' => $user_type,
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
}
