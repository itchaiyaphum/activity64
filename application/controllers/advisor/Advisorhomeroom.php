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
        $this->load->model('advisor/homeroomactivity_model');
        $this->load->model('admin/adminusers_model');
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
        $data['pagination'] = $this->homeroom_model->getPagination();
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        
        $advisor_majors = "1,2";
        $sql = "SELECT users_student.*, groups.group_name, majors.major_name FROM users_student
                    LEFT JOIN groups ON (users_student.group_id=groups.id)
                    LEFT JOIN majors ON (users_student.major_id=majors.id)
                    WHERE users_student.major_id IN(".$advisor_majors.")";
        $data['student_items'] = $this->helper_lib->querySQL($sql);
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/activity', $data);
        $this->load->view('footer');
    }
    
    public function obediences()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['pagination'] = $this->homeroom_model->getPagination();
        $data['items'] = $this->homeroom_model->getItems();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/activity', $data);
        $this->load->view('footer');
    }
    
    public function risk()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['pagination'] = $this->homeroom_model->getPagination();
        $data['items'] = $this->homeroom_model->getItems();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/activity', $data);
        $this->load->view('footer');
    }
    
    public function confirm()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['pagination'] = $this->homeroom_model->getPagination();
        $data['items'] = $this->homeroom_model->getItems();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/activity', $data);
        $this->load->view('footer');
    }
    
}
