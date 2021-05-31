<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'advisor' . DIRECTORY_SEPARATOR . 'BaseController.php';

class Advisorhomeroom extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/semester_model');
        $this->load->model('admin/homeroom_model');
        $this->load->model('homeroomactivity_model');
        $this->load->model('homeroomobedience_model');
        $this->load->model('homeroomrisk_model');
        $this->load->model('admin/adminusers_model');
        $this->load->model('admin/student_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['pagination'] = $this->homeroom_model->getPagination();
        $data['items'] = $this->homeroom_model->getItems();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/index', $data);
        $this->load->view('footer');
    }
    
    public function activity()
    {
        $id = $this->input->get_post('id',0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        $data['student_items'] = $this->student_model->getStudentsByAdvisor();
        $data['homeroom_activity'] = $this->homeroomactivity_model->getItem($id);
        $data['homeroom_activity_items'] = $this->homeroomactivity_model->getActivityItems($id);
        $data['advisor_id'] = $this->tank_auth->get_user_id();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/activity', $data);
        $this->load->view('footer');
    }
    
    public function activity_save()
    {
        $homeroom_id = $this->input->get_post('homeroom_id',0);
        $this->homeroomactivity_model->save();
        $this->homeroomactivity_model->saveItems();
        redirect('/advisor/homeroom/obedience/?id='.$homeroom_id);
    }
    
    public function obedience()
    {
        $id = $this->input->get_post('id',0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        $data['student_items'] = $this->student_model->getStudentsByAdvisor();
        $data['obedience'] = $this->homeroomobedience_model->getItem($id);
        $data['advisor_id'] = $this->tank_auth->get_user_id();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/obedience', $data);
        $this->load->view('footer');
    }
    
    public function obedience_save()
    {
        $homeroom_id = $this->input->get_post('homeroom_id',0);
        $this->homeroomobedience_model->save();
        redirect('/advisor/homeroom/risk/?id='.$homeroom_id);
    }
    
    public function risk()
    {
        $id = $this->input->get_post('id',0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        $data['student_items'] = $this->student_model->getStudentsByAdvisor();
        $data['homeroom_risk'] = $this->homeroomrisk_model->getItem($id);
        $data['homeroom_risk_items'] = $this->homeroomrisk_model->getRiskItems($id);
        $data['advisor_id'] = $this->tank_auth->get_user_id();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/risk', $data);
        $this->load->view('footer');
    }
    
    public function risk_save()
    {
        $homeroom_id = $this->input->get_post('homeroom_id',0);
        $this->homeroomrisk_model->save();
        $this->homeroomrisk_model->saveItems();
        redirect('/advisor/homeroom/confirm/?id='.$homeroom_id);
    }
    
    public function confirm()
    {
        $id = $this->input->get_post('id',0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['pagination'] = $this->homeroom_model->getPagination();
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        
        $advisor_majors = "1,2";
        $sql = "SELECT users_student.*, groups.group_name, majors.major_name FROM users_student
                    LEFT JOIN groups ON (users_student.group_id=groups.id)
                    LEFT JOIN majors ON (users_student.major_id=majors.id)
                    WHERE users_student.major_id IN(".$advisor_majors.")";
        $data['student_items'] = $this->helper_lib->querySQL($sql);
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/confirm', $data);
        $this->load->view('footer');
    }
    
}
