<?php
namespace App\Controllers;

class Home extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | หน้าหลัก'
        ];
        echo view('Layouts/Default/Nav');
        echo view('Home/Index', $data);
        echo view('Layouts/Default/Footer');
    }
}
