<?php
namespace App\Controllers\Admin;

class HeadTeacherAdvisor extends \App\Controllers\BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | หัวหน้างานครูที่ปรึกษา | หน้าหลัก'
        ];
        echo view('Header', $data);
        echo view('HeadTeacherAdvisor/Index');
        echo view('Footer');
    }
}
