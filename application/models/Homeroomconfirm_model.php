<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Homeroomconfirm_model extends BaseModel
{
    public $table = null;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->ci->factory_lib->getTable('HomeRoomConfirm');
    }

    //TODO: mockup
    public function getStats($homeroom_id = 0, $advisor_id = 0)
    {
        if ($advisor_id==0) {
            $advisor_id = $this->ci->tank_auth->get_user_id();
        }
        return array(
            'totals' => 100,
            'come' => 97,
            'not_come' => 1,
            'late' => 1,
            'leave' => 1,
            'risk' => 5
        );
    }

    public function getSummaryItems($homeroom_id = 0, $advisor_id = 0)
    {
        if ($advisor_id==0) {
            $advisor_id = $this->ci->tank_auth->get_user_id();
        }

        // get all students belong advisor logined
        $sql = 'SELECT
                    users_student.id, users_student.student_id, 
                    users_student.firstname, users_student.lastname, 
                    users_student.group_id
                FROM users_student
                WHERE users_student.group_id IN( SELECT group_id FROM advisors_groups WHERE advisor_id='.$advisor_id.')';
        $query = $this->ci->db->query($sql);
        $student_items = $query->result();

        // get all activity content belong advisor logined
        $sql = 'SELECT
                    users_student.id as student_id, users_student.group_id,
                    hai.homeroom_id, hai.check_status
                FROM users_student
                LEFT JOIN homeroom_activity_items hai ON (hai.student_id=users_student.id)
                WHERE users_student.group_id IN( SELECT group_id FROM advisors_groups WHERE advisor_id='.$advisor_id.') 
                    AND hai.homeroom_id='.$homeroom_id;
        $query = $this->ci->db->query($sql);
        $activity_items = $query->result();

        // get all risk content belong advisor logined
        $sql = 'SELECT
                    users_student.id as student_id, users_student.group_id,
                    hri.homeroom_id, hri.risk_detail, hri.risk_comment, hri.risk_status
                FROM users_student
                LEFT JOIN homeroom_risk_items hri ON (hri.student_id=users_student.id)
                WHERE users_student.group_id IN( SELECT group_id FROM advisors_groups WHERE advisor_id='.$advisor_id.') 
                    AND hri.homeroom_id='.$homeroom_id;
        $query = $this->ci->db->query($sql);
        $risk_items = $query->result();


        $items = array();
        foreach ($student_items as $student) {
            $student_data = array(
                'student_id' => $student->id,
                'student_code' => $student->student_id,
                'firstname' => $student->firstname,
                'lastname' => $student->lastname,
                'group_id' => $student->group_id,
                'activity' => array(),
                'risk' => array()
            );
            array_push($items, $student_data);
        }

        // activity
        for ($i=0; $i<count($activity_items); $i++) {
            $rowi = $activity_items[$i];
            for ($j=0; $j<count($items); $j++) {
                $rowj = $items[$j];
                if ($rowi->student_id == $rowj['student_id']) {
                    $items[$j]['activity'] = array(
                        'check_status' => $rowi->check_status,
                        'check_status_text' => $this->activityStatusText($rowi->check_status)
                    );
                }
            }
        }

        // risk
        for ($i=0; $i<count($risk_items); $i++) {
            $rowi = $risk_items[$i];
            for ($j=0; $j<count($items); $j++) {
                $rowj = $items[$j];
                if ($rowi->student_id == $rowj['student_id']) {
                    $items[$j]['risk'] = array(
                        'risk_detail' => $rowi->risk_detail,
                        'risk_comment' => $rowi->risk_comment,
                        'risk_status' => $rowi->risk_status,
                        'risk_status_text' => $this->riskStatusText($rowi->risk_status)
                    );
                }
            }
        }

        $group_items = $this->getStudentGroupsByAdvisor($advisor_id);
        $group_data = array();
        for ($i=0; $i<count($group_items); $i++) {
            $row =& $group_items[$i];
            $group_tmp = array(
                'group_id' => $row->group_id,
                'group_name' => $row->group_name,
                'major_name' => $row->major_name,
                'minor_name' => $row->minor_name,
                'students' => array(),
            );
            for ($j=0; $j<count($items); $j++) {
                $student = $items[$j];
                if ($row->group_id==$student['group_id']) {
                    array_push($group_tmp['students'], $student);
                }
            }
            array_push($group_data, $group_tmp);
        }

        return $group_data;
    }

    private function getStudentGroupsByAdvisor($advisor_id=0)
    {
        $sql = "SELECT groups.id AS group_id, groups.group_name, majors.major_name, minors.minor_name
                FROM groups
                LEFT JOIN minors ON (groups.minor_id=minors.id)
                LEFT JOIN majors ON (minors.major_id=majors.id)
                WHERE groups.id IN( SELECT DISTINCT group_id FROM advisors_groups WHERE advisor_id={$advisor_id} )
                    AND groups.status=1 ";
        $query = $this->ci->db->query($sql);
        $groups = $query->result();
        return $groups;
    }

    private function activityStatusText($check_status=null)
    {
        if ($check_status=='not_come') {
            return 'ขาด';
        } elseif ($check_status=='late') {
            return 'สาย';
        } elseif ($check_status=='leave') {
            return 'ลา';
        }
        return 'มา';
    }

    private function riskStatusText($check_status=null)
    {
        if ($check_status=='risk') {
            return 'เสี่ยง';
        }
        return 'ไม่เสี่ยง';
    }

    public function getObedienceData($homeroom_id = 0, $advisor_id = 0)
    {
        if ($advisor_id==0) {
            $advisor_id = $this->ci->tank_auth->get_user_id();
        }
        
        // get obedience content belong advisor logined
        $sql = 'SELECT
                    ho.obe_detail, ho.survey_amount
                FROM homeroom_obediences ho
                WHERE ho.homeroom_id='.$homeroom_id.' AND ho.advisor_id='.$advisor_id;
        $query = $this->ci->db->query($sql);
        $obedience_content = $query->row();

        // get obedience attactments belong advisor logined
        $sql = 'SELECT hoa.img
                FROM homeroom_obedience_attachments hoa
                WHERE hoa.homeroom_id='.$homeroom_id.' AND hoa.advisor_id='.$advisor_id;
        $query = $this->ci->db->query($sql);
        $obedience_attactments = $query->result();

        $items = array('obedience_content'=>$obedience_content, 'obedience_attactments'=>$obedience_attactments);

        return $items;
    }
}
