<?php
namespace App\Controllers\Admin;

class StaffAdvisor extends \App\Controllers\BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | เจ้าหน้าที่งานครูที่ปรึกษา | หน้าหลัก'
        ];
        echo view('Header', $data);
        echo view('StaffAdvisor/Index');
        echo view('Footer');
    }
}
