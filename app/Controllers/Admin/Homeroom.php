<?php
namespace App\Controllers\Admin;

class HomeRoom extends \App\Controllers\BaseController
{
    public function index()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | กิจกรรมโฮมรูม | รายการทั้งหมด'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('HomeRoom/Index', $data);
        echo view('Layouts/Admin/Footer');
    }
    
    public function activity()
    {
        return redirect()->to('/admin/homeroom/activity1'); 
    }
    
    public function activity1()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | กิจกรรมโฮมรูม | บันทึกกิจกรรม'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('HomeRoom/Activity1', $data);
        echo view('Layouts/Admin/Footer');
    }
    
    public function activity2()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | กิจกรรมโฮมรูม | บันทึกกิจกรรม'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('HomeRoom/Activity2', $data);
        echo view('Layouts/Admin/Footer');
    }
    
    public function activity3()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | กิจกรรมโฮมรูม | บันทึกกิจกรรม'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('HomeRoom/Activity3', $data);
        echo view('Layouts/Admin/Footer');
    }
    
    public function activity4()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | กิจกรรมโฮมรูม | บันทึกกิจกรรม'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('HomeRoom/Activity4', $data);
        echo view('Layouts/Admin/Footer');
    }
    
}
