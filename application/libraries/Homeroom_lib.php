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
            } elseif ($checkStatus=='approved') {
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
}
