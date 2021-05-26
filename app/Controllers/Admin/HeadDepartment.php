<?php
namespace App\Controllers\Admin;

class HeadDepartment extends \App\Controllers\BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | หัวหน้าแผนก | หน้าหลัก'
        ];
        echo view('Header', $data);
        echo view('HeadDepartment/Index');
        echo view('Footer');
    }
}
