<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'BaseController.php';

class Importdata extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('data_type', 'ประเภทข้อมูล', 'trim|required|xss_clean');
        
        $data = array();
        $data['errors'] = array();
        if ($this->form_validation->run()) {
            if ($this->importdata_model->save()) {
                redirect('/admin/importdata/');
            } else {
                $data['errors']['global'] = "ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบการกรอกข้อมูลและลองใหม่อีกครั้ง!";
            }
        }

        $data['leftmenu'] = $this->load->view('admin/menu', '', true);
        
        $this->load->view('nav');
        $this->load->view('admin/importdata/index', $data);
        $this->load->view('footer');
    }
}
