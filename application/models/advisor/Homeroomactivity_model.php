<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Homeroomactivity_model extends BaseModel
{

    public $table = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->ci->factory_lib->getTable('HomeRoomActivity');
    }

    public function getHomeroomItems()
    {
        $this->ci->load->model('admin/homeroom_model', 'homeroom_model');
        $items = $this->ci->homeroom_model->getItems(array(
            'status' => 1
        ));
        return $items;
    }

    public function getStudentItems()
    {
        $advisor_profile = $this->ci->profile_lib->getData();
        $advisor_id = $advisor_profile->user_id;
        
        $sql = 'SELECT users.* FROM users
                LEFT JOIN majors ON (users.major_id=majors.id)
                WHERE s.advisor_id=' . $advisor_id;
        
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getItems($advisor_id = 0)
    {
        $sql = 'SELECT * FROM homeroom_activities WHERE advisor_id=' . $advisor_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }
    
    public function getItem($id = 0)
    {
        $sql = 'SELECT homerooms.week, ha.* FROM homeroom_activities AS ha
                    LEFT JOIN homerooms ON (ha.homeroom_id=homerooms.id)
                    WHERE ha.id=' . $id;
        echo $sql;
        
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }
    
    public function getItemByAdvisor($advisor_id = 0)
    {
        $sql = 'SELECT homerooms.week, ha.* FROM homeroom_activities AS ha 
                    LEFT JOIN homerooms ON (ha.homeroom_id=homerooms.id)
                    WHERE ha.advisor_id=' . $advisor_id;
        echo $sql;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

}
