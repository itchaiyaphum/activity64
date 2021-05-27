<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TableUsers extends JTable
{
    public $id = NULL;
    public $username = NULL;
    public $password = NULL;
    public $email = NULL;
    public $firstname = NULL;
    public $lastname = NULL;
    public $user_type = NULL;
    public $organization_id = NULL;
    public $thumbnail = NULL;
    public $activated = NULL;
    public $banned = NULL;
    public $ban_reason = NULL;
    public $new_password_key = NULL;
    public $new_password_requested = NULL;
    public $new_email = NULL;
    public $new_email_key = NULL;
    public $last_ip = NULL;
    public $last_login = NULL;
    public $created = NULL;
    public $modified = NULL;
    
    public function __construct($db=NULL){
        parent::__construct('users', 'id', $db);
    }
}