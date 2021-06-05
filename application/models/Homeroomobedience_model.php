<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Homeroomobedience_model extends BaseModel
{
    public $table = null;

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

    public function getFileItems()
    {
        $file1 = new stdClass();
        $file1->img = "https://static.posttoday.com/media/content/2018/10/27/E11A0691A10B47C5BF94A4863EF23D43.jpg";
        $file2 = new stdClass();
        $file2->img = "https://siamrath.co.th/files/styles/1140/public/img/20190421/44925e900fb84689de5b40a7294616e6de7ed9fb55bbb10b46696d4c184aab88.jpg?itok=yIOrGssi";
        $items = array(
            $file1,
            $file2
        );
        return $items;
    }

    public function getItem($homeroom_id=0)
    {
        $sql = 'SELECT id FROM homeroom_obediences WHERE homeroom_id=' . $homeroom_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        $id = 0;
        if (count($items)) {
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
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }
}
