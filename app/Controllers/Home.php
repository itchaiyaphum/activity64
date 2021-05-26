<?php
namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | หน้าหลัก'
        ];
        echo view('Header', $data);
        echo view('Home/Index');
        echo view('Footer');
    }
}
