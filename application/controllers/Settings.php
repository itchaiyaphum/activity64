<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    
        $this->load->helper(array('form', 'url'));
        $this->load->model('settings_model');
        $this->load->model('admin/college_model');
        $this->load->model('admin/department_model');
        $this->load->model('admin/internship_model');
        $this->load->model('admin/company_model');
        $this->load->library('form_validation');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }
    
    public function index()
    {
        redirect('settings/profile');
    }

    public function profile()
    {
        if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
            redirect('/auth/login/');
        } else {
            $profile = $this->profile_lib->getData();
        
            $data['errors'] = array();
            $input_data = $this->input->post();
            
            if($profile->user_type=="student"){
                $input_data['user_id'] = $profile->user_id;
                if ($this->settings_model->validateStudent()) {
                    if ($this->profile_lib->saveStudent($input_data)) {
                        $data['messages'] = 'บันทึกข้อมูลเรียบร้อบ';
                        redirect('settings/profile');
                    } else {
                        $errors = $this->tank_auth->get_error_message();
                        foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                    }
                }
                
                $data['colleges'] = $this->college_model->getItems(array('status'=>1));
                $data['departments'] = $this->department_model->getItems(array('status'=>1));
                $data['internship_items'] = $this->internship_model->getItems(array('status'=>1));
                $data['company_items'] = $this->company_model->getItems(array('status'=>1));
                $data['trainer_items'] = $this->profile_lib->getTrainer();
                $data['advisor_items'] = $this->profile_lib->getAdvisor();
                
                $this->load->view('nav');
                $this->load->view('settings/profile_student', $data);
                $this->load->view('footer');
            }else if($profile->user_type=="advisor"){
                $input_data['user_id'] = $profile->user_id;
                if ($this->settings_model->validateAdvisor()) {
                    if ($this->profile_lib->saveAdvisor($input_data)) {
                        $data['messages'] = 'บันทึกข้อมูลเรียบร้อบ';
                        redirect('settings/profile');
                    } else {
                        $errors = $this->tank_auth->get_error_message();
                        foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                    }
                }
                
                $data['college_items'] = $this->college_model->getItems(array('status'=>1));
                
                $this->load->view('nav');
                $this->load->view('settings/profile_advisor', $data);
                $this->load->view('footer');
            }else if($profile->user_type=="trainer"){
                $input_data['user_id'] = $profile->user_id;
                if ($this->settings_model->validateTrainer()) {
                    if ($this->profile_lib->saveTrainer($input_data)) {
                        $data['messages'] = 'บันทึกข้อมูลเรียบร้อบ';
                        redirect('settings/profile');
                    } else {
                        $errors = $this->tank_auth->get_error_message();
                        foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                    }
                }
                
                $data['company_items'] = $this->company_model->getItems(array('status'=>1));
                
                $this->load->view('nav');
                $this->load->view('settings/profile_trainer', $data);
                $this->load->view('footer');
            }else if($profile->user_type=="staff"){
                $input_data['user_id'] = $profile->user_id;
                if ($this->settings_model->validateStaff()) {
                    if ($this->profile_lib->saveStaff($input_data)) {
                        $data['messages'] = 'บันทึกข้อมูลเรียบร้อบ';
                        redirect('settings/profile');
                    } else {
                        $errors = $this->tank_auth->get_error_message();
                        foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
                    }
                }
                
                $data['college_items'] = $this->college_model->getItems(array('status'=>1));
                
                $this->load->view('nav');
                $this->load->view('settings/profile_staff', $data);
                $this->load->view('footer');
            }else{
                $this->load->view('nav');
                echo "no this user_type on this platform! please contact administrator!";
                $this->load->view('footer');
            }
            
        }
        
        
    }
    public function password()
    {
        if (!$this->tank_auth->is_logged_in()) {								// not logged in or not activated
			redirect('/auth/login/');
		} else {
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
			$this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

			$data['errors'] = array();

			if ($this->form_validation->run()) {								// validation ok
				if ($this->tank_auth->change_password(
						$this->form_validation->set_value('old_password'),
						$this->form_validation->set_value('new_password'))) {	// success
					$data['messages'] = $this->lang->line('auth_message_password_changed');
				} else {														// fail
					$errors = $this->tank_auth->get_error_message();
					foreach ($errors as $k => $v)	$data['errors'][$k] = $this->lang->line($v);
				}
			}
			$this->load->view('nav');
			$this->load->view('settings/password', $data);
			$this->load->view('footer');
		}
    }
    
    private function _show_message($message)
    {
        $this->session->set_flashdata('message', $message);
    }
}
