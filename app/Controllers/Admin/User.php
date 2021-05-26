<?php
namespace App\Controllers\Admin;

class User extends \App\Controllers\BaseController
{
    public function index()
    {
        return redirect()->to('user/changeprofile'); 
    }
    
    public function changeProfile()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | แก้ไขข้้อมูลส่วนตัว'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('User/ChangeProfile', $data);
        echo view('Layouts/Admin/Footer');
    }
    
    public function changePassword()
    {
        $data = [
            'title' => 'ระบบกิจกรรมนักเรียน นักศึกษา | แก้ไขรหัสผ่าน'
        ];
        echo view('Layouts/Admin/Nav');
        echo view('Layouts/Admin/LeftMenu');
        echo view('User/ChangePassword', $data);
        echo view('Layouts/Admin/Footer');
    }
}
