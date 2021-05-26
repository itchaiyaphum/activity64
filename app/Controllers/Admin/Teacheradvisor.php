<?php
namespace App\Controllers\Admin;

class TeacherAdvisor extends \App\Controllers\BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | ครูที่ปรึกษา | หน้าหลัก'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('TeacherAdvisor/Index', $data);
        echo view('Layouts/Admin/Footer');
    }
}
