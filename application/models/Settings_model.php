<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings_model extends BaseModel
{

    public $table = NULL;

    public $ci = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->ci = & get_instance();
    }

    public function validateStudent()
    {
        $this->ci->form_validation->set_rules('firstname', 'ชื่อ', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('college_id', 'สถานศึกษา', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('department_id', 'แผนก/สาขา', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('email', 'อีเมล์', 'trim|required|xss_clean');
        
        $this->ci->form_validation->set_rules('firstname_en', 'firstname_en', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('lastname_en', 'lastname_en', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('student_id', 'student_id', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('edulevel', 'edulevel', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('religion_title', 'religion_title', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('dob', 'dob', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('age', 'age', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('congenital_disease', 'congenital_disease', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('drug_allergy', 'drug_allergy', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('blood_type', 'blood_type', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('experience_work', 'experience_work', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('experience_skill', 'experience_skill', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('experience_intesting', 'experience_intesting', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('experience_status', 'experience_status', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('experience_marry_name', 'experience_marry_name', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('experience_marry_cocupation', 'experience_marry_cocupation', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('emergency_name', 'emergency_name', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('emergency_address', 'emergency_address', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('emergency_mobile', 'emergency_mobile', 'trim|xss_clean');
        
        $this->ci->form_validation->set_rules('hometown_no', 'hometown_no', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('hometown_moo', 'hometown_moo', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('hometown_subdistrict', 'hometown_subdistrict', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('hometown_district', 'hometown_district', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('hometown_province', 'hometown_province', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('hometown_postcode', 'hometown_postcode', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('hometown_mobile', 'hometown_mobile', 'trim|xss_clean');
        
        $this->ci->form_validation->set_rules('current_address_no', 'current_address_no', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('current_address_moo', 'current_address_moo', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('current_address_subdistrict', 'current_address_subdistrict', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('current_address_district', 'current_address_district', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('current_address_province', 'current_address_province', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('current_address_postcode', 'current_address_postcode', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('current_address_mobile', 'current_address_mobile', 'trim|xss_clean');
        
        $this->ci->form_validation->set_rules('advisor_id', 'advisor_id', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('trainer_id', 'trainer_id', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('company_id', 'company_id', 'trim|xss_clean');
        $this->ci->form_validation->set_rules('internship_id', 'internship_id', 'trim|xss_clean');
        
        if ($this->ci->form_validation->run()) {
            return TRUE;
        }
        return FALSE;
    }

    public function validateAdvisor()
    {
        $this->ci->form_validation->set_rules('firstname', 'ชื่อ', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('college_id', 'สถานศึกษา', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('email', 'อีเมล์', 'trim|required|xss_clean');
        
        if ($this->ci->form_validation->run()) {
            return TRUE;
        }
        return FALSE;
    }

    public function validateStaff()
    {
        $this->ci->form_validation->set_rules('firstname', 'ชื่อ', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('college_id', 'สถานศึกษา', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('email', 'อีเมล์', 'trim|required|xss_clean');
        
        if ($this->ci->form_validation->run()) {
            return TRUE;
        }
        return FALSE;
    }

    public function validateTrainer()
    {
        $this->ci->form_validation->set_rules('firstname', 'ชื่อ', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('lastname', 'นามสกุล', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('company_id', 'สถานประกอบการ', 'trim|required|xss_clean');
        $this->ci->form_validation->set_rules('email', 'อีเมล์', 'trim|required|xss_clean');
        
        if ($this->ci->form_validation->run()) {
            return TRUE;
        }
        return FALSE;
    }
}
