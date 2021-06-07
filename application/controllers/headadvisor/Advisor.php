<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'headadvisor' . DIRECTORY_SEPARATOR . 'BaseController.php';

class Advisor extends BaseController
{
    public function index()
    {
        $data = array();
        $data['leftmenu'] = $this->load->view('headadvisor/menu', '', true);
        
        $this->load->view('nav');
        $this->load->view('headadvisor/advisor', $data);
        $this->load->view('footer');
    }
}
