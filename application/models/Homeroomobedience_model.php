<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Homeroomobedience_model extends BaseModel
{

    public $table = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->ci->factory_lib->getTable('HomeRoomObedience');
    }

    /*
    public function saveItem(){
        $homeroom_id = $this->ci->input->get_post('homeroom_id', 0);
        $students = $this->ci->input->get_post('join_status', array());
        
        $activity_items = array();
        foreach ($students as $key => $val){
            array_push($activity_items, array(
                'homeroom_id' => $homeroom_id,
                'student_id' => $key,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                'status' => 1,
                'check_status' => $val
            ));
        }
        
        // clear old homeroom data
        $this->ci->db->delete('homeroom_activity_items', array('homeroom_id' => $homeroom_id));
        
        // insert activity items
        return $this->ci->db->insert_batch('homeroom_activity_items', $activity_items);
    }
    */

    public function getItem($homeroom_id=0){
        $sql = 'SELECT id FROM homeroom_obediences WHERE homeroom_id=' . $homeroom_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        $id = 0;
        if(count($items)){
            $id = $items[0]->id;
            $this->table->load($id);
        }
        return $this->table;
    }

    public function getItems($advisor_id = 0)
    {
        $sql = 'SELECT * FROM homeroom_activities WHERE advisor_id=' . $advisor_id;
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
