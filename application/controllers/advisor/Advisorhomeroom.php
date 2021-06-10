<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'advisor' . DIRECTORY_SEPARATOR . 'BaseController.php';

class Advisorhomeroom extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('base_homeroom_model');
        $this->load->model('homeroomactivity_model');
        $this->load->model('homeroomobedience_model');
        $this->load->model('homeroomrisk_model');
        $this->load->model('homeroomconfirm_model');
        $this->load->model('admin/student_model');
        $this->load->library('form_validation');
        $this->load->library('profile_lib');
        $this->load->library('homeroom_lib');
    }

    public function index()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom_items'] = $this->base_homeroom_model->getItems();

        $this->load->view('nav');
        $this->load->view('advisor/homeroom/index', $data);
        $this->load->view('footer');
    }
    
    public function activity()
    {
        $id = $this->input->get_post('id', 0);
        $group_id = $this->input->get_post('group_id', 0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom'] = $this->homeroomactivity_model->getActivities($id, $group_id);
        $data['group_id'] = $group_id;
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/activity', $data);
        $this->load->view('footer');
    }
    
    public function activity_save()
    {
        $homeroom_id = $this->input->get_post('homeroom_id', 0);
        $group_id = $this->input->get_post('group_id', 0);
        $advisor_id = $this->profile_lib->getUserId();

        $data = $this->input->post();
        $data['advisor_id'] = $advisor_id;

        $this->homeroomactivity_model->save($data);
        $this->homeroomactivity_model->saveItems();
        $this->homeroom_lib->saveAction('saving', $homeroom_id, $group_id, $advisor_id);
        redirect('/advisor/homeroom/obedience/?id='.$homeroom_id);
    }
    
    public function obedience()
    {
        $id = $this->input->get_post('id', 0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        $data['student_items'] = $this->student_model->getStudentsByAdvisor();
        $data['student_amount'] = $this->student_model->getStudentsByAdvisorAmount();
        $data['obedience'] = $this->homeroomobedience_model->getItem($id);
        $data['obedience_attactments'] = $this->homeroomobedience_model->getAttactments($id);
        $data['advisor_id'] = $this->tank_auth->get_user_id();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/obedience', $data);
        $this->load->view('footer');
    }
    
    public function obedience_save()
    {
        $homeroom_id = $this->input->get_post('homeroom_id', 0);
        $this->homeroomobedience_model->saveData();
        redirect('/advisor/homeroom/risk/?id='.$homeroom_id);
    }
    
    public function risk()
    {
        $homeroom_id = $this->input->get_post('id', 0);
        $group_id = $this->input->get_post('group_id', 0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom'] = $this->homeroomrisk_model->getRisks($homeroom_id, $group_id);
        $data['group_id'] = $group_id;
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/risk', $data);
        $this->load->view('footer');
    }
    
    public function risk_save()
    {
        $homeroom_id = $this->input->get_post('homeroom_id', 0);
        $advisor_id = $this->profile_lib->getUserId();

        $data = $this->input->post();
        $data['advisor_id'] = $advisor_id;

        $this->homeroomrisk_model->save($data);
        $this->homeroomrisk_model->saveItems();
        redirect('/advisor/homeroom/confirm/?id='.$homeroom_id);
    }
    
    public function confirm()
    {
        $id = $this->input->get_post('id', 0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        $data['profile'] = $this->profile_lib->getData();
        
        $data['homeroom_confirm_stats'] = $this->homeroomconfirm_model->getStats($id);
        $data['homeroom_confirm_items'] = $this->homeroomconfirm_model->getSummaryItems($id);
        $data['homeroom_confirm_obedience'] = $this->homeroomconfirm_model->getObedienceData($id);

        $data['advisor_id'] = $this->tank_auth->get_user_id();
        
        $this->load->view('nav');
        $this->load->view('advisor/homeroom/confirm', $data);
        $this->load->view('footer');
    }

    public function confirm_save()
    {
        $homeroom_id = $this->input->get_post('homeroom_id', 0);
        $group_id = $this->input->get_post('group_id', 0);
        $advisor_id = $this->profile_lib->getUserId();

        // $this->homeroomconfirm_model->saveData();
        $this->homeroom_lib->saveAction('confirmed', $homeroom_id, $group_id, $advisor_id);
        redirect('/advisor/homeroom/');
    }
}
