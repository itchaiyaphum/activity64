<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_lib
{

    public $ci = null;

    public function __construct()
    {
        $this->ci = & get_instance();
    }

    public function isLogin()
    {
        if ($this->ci->session->userdata('user_id')) {
            return true;
        }
        return false;
    }

    public function login($email = '', $password = '')
    {
        if ($email == "student@demo.com" && $password == '123456') {
            $this->setUserSession(array(
                'user_id' => 111,
                'email' => $email,
                'firstname' => 'Wannapong',
                'lastname' => 'Kumjumpon',
                'guest' => 0
            ));
            return true;
        }
        return false;
    }

    public function logout()
    {
        $this->ci->session->sess_destroy();
    }

    public function setUserSession($data = array())
    {
        $this->ci->session->set_userdata($data);
    }
}
