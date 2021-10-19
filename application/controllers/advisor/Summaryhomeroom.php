<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'advisor' . DIRECTORY_SEPARATOR . 'BaseController.php';

class Summaryhomeroom extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('summaryhomeroom_model', 'summary');
    }

    public function index()
    {
        $data['group'] = $this->summary->group($this->session->user_id);

        $data['leftmenu'] = $this->load->view('advisor/menu', '', true);
        $this->load->view('nav', array('title' => '/ ครูที่ปรึกษา / สรุปผลเข้าร่วมกิจกรรมโฮมรูม'));
        $this->load->view('advisor/homeroom/summaryhomeroom', $data);
        $this->load->view('footer');
    }
}
