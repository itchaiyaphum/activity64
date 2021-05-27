<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'advisor' . DIRECTORY_SEPARATOR . 'BaseController.php';

class Activity extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    
        $this->load->model('advisor/activity_model','advisor_activity_model');
    }

    public function index()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        
        $data['internship_items'] = $this->advisor_activity_model->getInternship();
        $data['student_items'] = $this->advisor_activity_model->getStudent();
        
        $this->load->view('nav');
        $this->load->view('advisor/activity/index', $data);
        $this->load->view('footer');
    }
    
    public function items()
    {
        $id = $this->input->get('id', 0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
    
        $data['activity_items'] = $this->advisor_activity_model->getActivityItems();
        $data['file_items'] = $this->advisor_activity_model->getActivityFiles($id);
        $data['photo_items'] = $this->advisor_activity_model->getActivityPhotos($id);
    
        $this->load->view('nav');
        $this->load->view('advisor/activity/items', $data);
        $this->load->view('footer');
    }
}
