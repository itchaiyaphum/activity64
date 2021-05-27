<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_lib
{

    public function __construct()
    {
        $this->ci = & get_instance();
    }

    public function getData()
    {
        $profile = new stdClass();
        $profile->user_id = NULL;
        $profile->firstname = NULL;
        $profile->firstname_en = NULL;
        $profile->lastname = NULL;
        $profile->lastname_en = NULL;
        $profile->user_type = NULL;
        $profile->email = NULL;
        $profile->student_id = NULL;
        $profile->college_id = NULL;
        $profile->department_id = NULL;
        $profile->major_id = NULL;
        $profile->major_title = NULL;
        $profile->group_id = NULL;
        $profile->group_title = NULL;
        $profile->edulevel = NULL;
        $profile->religion_title = NULL;
        $profile->dob = NULL;
        $profile->age = NULL;
        $profile->congenital_disease = NULL;
        $profile->drug_allergy = NULL;
        $profile->blood_type = NULL;
        $profile->experience_work = NULL;
        $profile->experience_skill = NULL;
        $profile->experience_intesting = NULL;
        $profile->experience_status = NULL;
        $profile->experience_marry_name = NULL;
        $profile->experience_marry_cocupation = NULL;
        $profile->emergency_name = NULL;
        $profile->emergency_address = NULL;
        $profile->emergency_mobile = NULL;
        
        $profile->hometown_no = NULL;
        $profile->hometown_moo = NULL;
        $profile->hometown_subdistrict = NULL;
        $profile->hometown_district = NULL;
        $profile->hometown_province = NULL;
        $profile->hometown_postcode = NULL;
        $profile->hometown_mobile = NULL;
        
        $profile->current_address_no = NULL;
        $profile->current_address_moo = NULL;
        $profile->current_address_subdistrict = NULL;
        $profile->current_address_district = NULL;
        $profile->current_address_province = NULL;
        $profile->current_address_postcode = NULL;
        $profile->current_address_mobile = NULL;
        
        $profile->advisor_id = NULL;
        $profile->trainer_id = NULL;
        $profile->company_id = NULL;
        $profile->internship_id = NULL;
        
        $profile->thumbnail = NULL;
        $profile->organization_id = NULL;
        
        $this->ci->db->where('id', $this->ci->tank_auth->get_user_id());
        $query = $this->ci->db->get('users');
        if ($query->num_rows()) {
            $row = $query->row();
            
            $profile->user_id = $row->id;
            $profile->firstname = $row->firstname;
            $profile->lastname = $row->lastname;
            $profile->user_type = $row->user_type;
            $profile->email = $row->email;
            
            $profile->thumbnail = $row->thumbnail;
            $profile->organization_id = $row->organization_id;
            
            if($profile->user_type=='student'){
                $profile = $this->getStudentProfile($profile);
            }else if($profile->user_type=='advisor'){
                $profile = $this->getAdvisorProfile($profile);
            }else if($profile->user_type=='trainer'){
                $profile = $this->getTrainerProfile($profile);
            }
            
        }
        
        return $profile;
    }
    
    private function getAdvisorProfile($profile){
        $this->ci->db->where('user_id', $profile->user_id);
        $query = $this->ci->db->get('users_advisor');
        if ($query->num_rows()) {
            $row = $query->row();
            
            $profile->firstname = $row->firstname;
            $profile->lastname = $row->lastname;
            $profile->user_id = $row->user_id;
            $profile->college_id = $row->college_id;
        }
        return $profile;
    }
    
    private function getTrainerProfile($profile){
        $this->ci->db->where('user_id', $profile->user_id);
        $query = $this->ci->db->get('users_trainer');
        if ($query->num_rows()) {
            $row = $query->row();
            
            $profile->firstname = $row->firstname;
            $profile->lastname = $row->lastname;
            $profile->user_id = $row->user_id;
            $profile->company_id = $row->company_id;
        }
        return $profile;
    }
    
    private function getStudentProfile($profile){
        $this->ci->db->where('user_id', $profile->user_id);
        $query = $this->ci->db->get('users_student');
        if ($query->num_rows()) {
            $row = $query->row();
            
            $profile->firstname_en = $row->firstname_en;
            $profile->lastname_en = $row->lastname_en;
            $profile->student_id = $row->student_id;
            $profile->major_id = $row->major_id;
            $profile->college_id = $row->college_id;
            $profile->department_id = $row->department_id;
//             $profile->major_title = $row->major_title;
            $profile->group_id = $row->group_id;
//             $profile->group_title = $row->group_title;
            $profile->edulevel = $row->edulevel;
            $profile->religion_title = $row->religion_title;
            $profile->dob = $row->dob;
            $profile->age = $row->age;
            $profile->congenital_disease = $row->congenital_disease;
            $profile->drug_allergy = $row->drug_allergy;
            $profile->blood_type = $row->blood_type;
            $profile->experience_work = $row->experience_work;
            $profile->experience_skill = $row->experience_skill;
            $profile->experience_intesting = $row->experience_intesting;
            $profile->experience_status = $row->experience_status;
            $profile->experience_marry_name = $row->experience_marry_name;
            $profile->experience_marry_cocupation = $row->experience_marry_cocupation;
            $profile->emergency_name = $row->emergency_name;
            $profile->emergency_address = $row->emergency_address;
            $profile->emergency_mobile = $row->emergency_mobile;
            
            $profile->hometown_no = $row->hometown_no;
            $profile->hometown_moo = $row->hometown_moo;
            $profile->hometown_subdistrict = $row->hometown_subdistrict;
            $profile->hometown_district = $row->hometown_district;
            $profile->hometown_province = $row->hometown_province;
            $profile->hometown_postcode = $row->hometown_postcode;
            $profile->hometown_mobile = $row->hometown_mobile;
            
            $profile->current_address_no = $row->current_address_no;
            $profile->current_address_moo = $row->current_address_moo;
            $profile->current_address_subdistrict = $row->current_address_subdistrict;
            $profile->current_address_district = $row->current_address_district;
            $profile->current_address_province = $row->current_address_province;
            $profile->current_address_postcode = $row->current_address_postcode;
            $profile->current_address_mobile = $row->current_address_mobile;
            
            $profile->advisor_id = $row->advisor_id;
            $profile->trainer_id = $row->trainer_id;
            $profile->company_id = $row->company_id;
            $profile->internship_id = $row->internship_id;
            
        }
        return $profile;
    }
    
    public function checkNotChooseInternship()
    {
        $profile = $this->ci->profile_lib->getData();
        if($profile->user_type=="student" && empty($profile->internship_id)){
            return true;
        }
        return false;
    }

    public function getInternship()
    {
        $this->ci->load->model('admin/internship_model');
        return $this->ci->internship_model->getItems(array('status'=>1));
    }
    
    public function getColleges()
    {
        $this->ci->load->model('admin/college_model');
        return $this->ci->college_model->getItems(array('status'=>1));
    }
    
    public function getCompany()
    {
        $this->ci->load->model('admin/company_model');
        return $this->ci->company_model->getItems(array('status'=>1));
    }

    public function getStaff()
    {
        $this->ci->db->where('user_type', 'staff');
        $this->ci->db->where('activated', 1);
        $query = $this->ci->db->get('users');
        if ($query->num_rows())
            return $query->result();
        return NULL;
    }

    public function getAdvisor()
    {
        $this->ci->db->where('user_type', 'advisor');
        $this->ci->db->where('activated', 1);
        $query = $this->ci->db->get('users');
        if ($query->num_rows())
            return $query->result();
        return NULL;
    }

    public function getTrainer()
    {
        $this->ci->db->where('user_type', 'trainer');
        $this->ci->db->where('activated', 1);
        $query = $this->ci->db->get('users');
        if ($query->num_rows())
            return $query->result();
        return NULL;
    }
    
    public function save($data){
        $profile = $this->ci->profile_lib->getData();
        if($profile->user_type=='student'){
            return $this->saveStudent($data);
        }
        return false;
    }

    public function saveStudent($data)
    {
        //upload thumbnail
        $thumbnail = $this->saveThumbnail($data);
        
        $users_data = array();
        $users_data['firstname'] = $data['firstname'];
        $users_data['lastname'] = $data['lastname'];
//         $users_data['organization_id'] = $data['organization_id'];
        $users_data['email'] = $data['email'];
        if(!empty($thumbnail)){
            $users_data['thumbnail'] = $thumbnail;
        }
        $users_data['modified'] = date('Y-m-d H:i:s');
        
        //save table: users
        $this->ci->db->where('id', $data['user_id']);
        $this->ci->db->update('users', $users_data);
        
        unset($data['thumbnail']);
        
        //save table: users_student
        $this->ci->db->where('user_id', $data['user_id']);
        $query = $this->ci->db->get('users_student');
        if ($query->num_rows()){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->ci->db->where('user_id', $data['user_id']);
            if ($this->ci->db->update('users_student', $data)) return true;
        }else{
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            if ($this->ci->db->insert('users_student', $data)) return true;
        }
        
        return false;
    }
    
    public function saveAdvisor($data)
    {
        //upload thumbnail
        $thumbnail = $this->saveThumbnail($data);
        
        $users_data = array();
        $users_data['firstname'] = $data['firstname'];
        $users_data['lastname'] = $data['lastname'];
//         $users_data['organization_id'] = $data['organization_id'];
        $users_data['email'] = $data['email'];
        if(!empty($thumbnail)){
            $users_data['thumbnail'] = $thumbnail;
        }
        $users_data['modified'] = date('Y-m-d H:i:s');
        
        //save table: users
        $this->ci->db->where('id', $data['user_id']);
        $this->ci->db->update('users', $users_data);
    
        unset($data['thumbnail']);
        
        //save table: users_advisor
        $this->ci->db->where('user_id', $data['user_id']);
        $query = $this->ci->db->get('users_advisor');
        if ($query->num_rows()){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->ci->db->where('user_id', $data['user_id']);
            if ($this->ci->db->update('users_advisor', $data)) return true;
        }else{
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            if ($this->ci->db->insert('users_advisor', $data)) return true;
        }
    
        return false;
    }
    
    public function saveTrainer($data)
    {
        //upload thumbnail
        $thumbnail = $this->saveThumbnail($data);
        
        $users_data = array();
        $users_data['firstname'] = $data['firstname'];
        $users_data['lastname'] = $data['lastname'];
//         $users_data['organization_id'] = $data['organization_id'];
        $users_data['email'] = $data['email'];
        if(!empty($thumbnail)){
            $users_data['thumbnail'] = $thumbnail;
        }
        $users_data['modified'] = date('Y-m-d H:i:s');
        
        //save table: users
        $this->ci->db->where('id', $data['user_id']);
        $this->ci->db->update('users', $users_data);
        
        unset($data['thumbnail']);
        
        //save table: users_trainer
        $this->ci->db->where('user_id', $data['user_id']);
        $query = $this->ci->db->get('users_trainer');
        if ($query->num_rows()){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->ci->db->where('user_id', $data['user_id']);
            if ($this->ci->db->update('users_trainer', $data)) return true;
        }else{
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            if ($this->ci->db->insert('users_trainer', $data)) return true;
        }
        
        return false;
    }
    
    public function saveStaff($data)
    {
        //upload thumbnail
        $thumbnail = $this->saveThumbnail($data);
    
        $users_data = array();
        $users_data['firstname'] = $data['firstname'];
        $users_data['lastname'] = $data['lastname'];
        $users_data['organization_id'] = $data['organization_id'];
        $users_data['email'] = $data['email'];
        if(!empty($thumbnail)){
            $users_data['thumbnail'] = $thumbnail;
        }
        $users_data['modified'] = date('Y-m-d H:i:s');
    
        //save table: users
        $this->ci->db->where('id', $data['user_id']);
        $this->ci->db->update('users', $users_data);
    
        unset($data['thumbnail']);
    
        //save table: users_staff
        $this->ci->db->where('user_id', $data['user_id']);
        $query = $this->ci->db->get('users_staff');
        if ($query->num_rows()){
            $data['updated_at'] = date('Y-m-d H:i:s');
            $this->ci->db->where('user_id', $data['user_id']);
            if ($this->ci->db->update('users_staff', $data)) return true;
        }else{
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            if ($this->ci->db->insert('users_staff', $data)) return true;
        }
    
        return false;
    }
    
    private function saveThumbnail($data){
        $profile = $this->ci->profile_lib->getData();
        
        $config = array();
        $config['upload_path'] = './storage/profiles/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['file_name'] = $profile->user_id;
        $config['max_size']	= '10240';
        $this->ci->upload->initialize($config);
    
        if($this->ci->upload->do_upload('thumbnail')){
            $thumbnail_data = $this->ci->upload->data();
            //resize thumbnail
            $config_photo['image_library'] = 'gd2';
            $config_photo['source_image']	= $config['upload_path'].$thumbnail_data['file_name'];
            $config_photo['new_image'] = $config['upload_path'].'/thumbnail/'.$thumbnail_data['file_name'];
            $config_photo['create_thumb'] = FALSE;
            $config_photo['maintain_ratio'] = FALSE;
            $config_photo['width']	= 150;
            $config_photo['height']	= 150;
            $this->ci->image_lib->initialize($config_photo);
            $this->ci->image_lib->resize();
            
            return '/storage/profiles/thumbnail/'.$thumbnail_data['file_name'];
        }else{
            return false;
        }
    }
    
}
