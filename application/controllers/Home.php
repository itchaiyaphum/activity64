<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $this->load->view('home/nav');
        $this->load->view('home/index');
        $this->load->view('home/footer');
    }

    public function about()
    {
        $this->load->view('home/nav');
        $this->load->view('home/about');
        $this->load->view('home/footer');
    }

    public function contact()
    {
        $this->load->view('home/nav');
        $this->load->view('home/contact');
        $this->load->view('home/footer');
    }

    public function help()
    {
        $this->load->view('home/nav');
        $this->load->view('help/student');
        $this->load->view('home/footer');
    }
    public function admin_restricted_access(){
        echo "คุณไม่ได้รับอนุญาติให้เข้าใช้งาน /admin/ <br/><br/>";
        echo '<a href="/">กลับหน้าหลัก</a>';
    }
    public function trainer_restricted_access(){
        echo "คุณไม่ได้รับอนุญาติให้เข้าใช้งาน /trainer/ <br/><br/>";
        echo '<a href="/">กลับหน้าหลัก</a>';
    }
    public function advisor_restricted_access(){
        echo "คุณไม่ได้รับอนุญาติให้เข้าใช้งาน /advisor/ <br/><br/>";
        echo '<a href="/">กลับหน้าหลัก</a>';
    }
    public function staff_restricted_access(){
        echo "คุณไม่ได้รับอนุญาติให้เข้าใช้งาน /staff/ <br/><br/>";
        echo '<a href="/">กลับหน้าหลัก</a>';
    }
}
