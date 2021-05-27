<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Activity_model extends BaseModel
{

    public $table = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->ci->factory_lib->getTable('Activity');
    }

    public function getInternship()
    {
        $this->ci->load->model('admin/internship_model', 'admin_internship_model');
        $items = $this->ci->admin_internship_model->getItems(array(
            'status' => 1
        ));
        return $items;
    }

    public function getStudent()
    {
        $advisor_profile = $this->ci->profile_lib->getData();
        
        $advisor_id = $advisor_profile->user_id;
        $sql = 'SELECT s.*, c.name as college_name FROM users_student s
                LEFT JOIN college as c ON (s.organization_id=c.id)
                WHERE s.advisor_id=' . $advisor_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getActivityItems($user_id = 0)
    {
        $sql = 'SELECT * FROM activity WHERE user_id=' . $user_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getActivityFiles($user_id = 0)
    {
        $sql = 'SELECT * FROM attachment_files WHERE user_id=' . $user_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getActivityPhotos($user_id = 0)
    {
        $sql = 'SELECT * FROM attachment_photos WHERE user_id=' . $user_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }
}
