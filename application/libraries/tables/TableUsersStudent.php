<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TableUsersStudent extends JTable
{
    public $id = NULL;
    public $user_id = NULL;
    public $firstname = NULL;
    public $lastname = NULL;
    public $firstname_en = NULL;
    public $lastname_en = NULL;
    public $student_id = NULL;
    public $major_id = NULL;
    public $group_id = NULL;
    public $edulevel = NULL;
    public $religion_title = NULL;
    public $dob = NULL;
    public $age = NULL;
    public $congenital_disease = NULL;
    public $drug_allergy = NULL;
    public $blood_type = NULL;
    public $experience_work = NULL;
    public $experience_skill = NULL;
    public $experience_intesting = NULL;
    public $experience_status = NULL;
    public $experience_marry_name = NULL;
    public $experience_marry_cocupation = NULL;
    public $emergency_name = NULL;
    public $emergency_address = NULL;
    public $emergency_mobile = NULL;
    public $hometown_no = NULL;
    public $hometown_moo = NULL;
    public $hometown_subdistrict = NULL;
    public $hometown_district = NULL;
    public $hometown_province = NULL;
    public $hometown_postcode = NULL;
    public $hometown_mobile = NULL;
    public $current_address_no = NULL;
    public $current_address_moo = NULL;
    public $current_address_subdistrict = NULL;
    public $current_address_district = NULL;
    public $current_address_province = NULL;
    public $current_address_postcode = NULL;
    public $current_address_mobile = NULL;
    public $advisor_id = NULL;
    public $trainer_id = NULL;
    public $company_id = NULL;
    public $internship_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $email = NULL;
    public $organization_id = NULL;
    
    public function __construct($db=NULL){
        parent::__construct('users_student', 'id', $db);
    }
}