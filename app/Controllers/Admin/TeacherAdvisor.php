<?php
namespace App\Controllers\Admin;

class TeacherAdvisor extends \App\Controllers\BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | ครูที่ปรึกษา | หน้าหลัก'
        ];
        echo view('Header', $data);
        echo view('TeacherAdvisor/Index');
        echo view('Footer');
    }
}
