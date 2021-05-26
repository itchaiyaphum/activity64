<?php
namespace App\Controllers\Admin;

class Executive extends \App\Controllers\BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | ฝ่ายบริหาร | หน้าหลัก'
        ];
        echo view('Header', $data);
        echo view('Executive/Index');
        echo view('Footer');
    }
}
