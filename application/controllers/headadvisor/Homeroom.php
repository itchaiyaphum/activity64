<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'headadvisor' . DIRECTORY_SEPARATOR . 'BaseController.php';

class Homeroom extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('admin/homeroom_model');
        $this->load->model('headadvisor/headadvisorhomeroom_model');
        $this->load->model('homeroomconfirm_model');
        $this->load->library('homeroom_lib');
    }
    public function index()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('headadvisor/menu', '', true);
        $data['pagination'] = $this->homeroom_model->getPagination();
        $data['items'] = $this->homeroom_model->getItems();
        $data['advisor_items'] = $this->headadvisorhomeroom_model->getAdvisorItems();

        $this->load->view('nav');
        $this->load->view('headadvisor/homeroom/index', $data);
        $this->load->view('footer');
    }

    public function confirm()
    {
        $id = $this->input->get_post('id', 0);
        $advisor_id = $this->input->get_post('advisor_id', 0);
        
        $data = array();
        $data['leftmenu'] = $this->load->view('headadvisor/menu', '', true);
        $data['homeroom'] = $this->homeroom_model->getItem($id);
        $data['profile'] = $this->profile_lib->getData();
        
        $data['homeroom_confirm_stats'] = $this->homeroomconfirm_model->getStats($id, $advisor_id);
        $data['homeroom_confirm_items'] = $this->homeroomconfirm_model->getSummaryItems($id, $advisor_id);
        $data['homeroom_confirm_obedience'] = $this->homeroomconfirm_model->getObedienceData($id, $advisor_id);

        $data['advisor_id'] = $this->tank_auth->get_user_id();
        
        $this->load->view('nav');
        $this->load->view('headadvisor/homeroom/confirm', $data);
        $this->load->view('footer');
    }

    public function approve()
    {
        $this->headadvisorhomeroom_model->approve();
        redirect('/headadvisor/homeroom/');
    }

    public function unapprove()
    {
        $this->headadvisorhomeroom_model->unapprove();
        redirect('/headadvisor/homeroom/');
    }

    public function remove_confirm()
    {
        $this->headadvisorhomeroom_model->remove_confirm();
        redirect('/headadvisor/homeroom/');
    }
}
