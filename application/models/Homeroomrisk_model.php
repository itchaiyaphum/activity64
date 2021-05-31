<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Homeroomrisk_model extends BaseModel
{

    public $table = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->ci->factory_lib->getTable('HomeRoomRisk');
    }

    public function getHomeroomItems()
    {
        $this->ci->load->model('admin/homeroom_model', 'homeroom_model');
        $items = $this->ci->homeroom_model->getItems(array(
            'status' => 1
        ));
        return $items;
    }
    
    public function saveItems(){
        $homeroom_id = $this->ci->input->get_post('homeroom_id', 0);
        $student_items = $this->ci->input->get_post('student_items', array());
        
        $risk_items = array();
        foreach ($student_items as $key => $val){
            array_push($risk_items, array(
                'homeroom_id' => $homeroom_id,
                'student_id' => $key,
                'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                'status' => 1,
                'risk_detail' => $val['detail'],
                'risk_comment' => $val['comment'],
                'risk_status' => $val['status']
            ));
        }
        
        // clear old homeroom data
        $this->ci->db->delete('homeroom_risk_items', array('homeroom_id' => $homeroom_id));
        
        // insert activity items
        return $this->ci->db->insert_batch('homeroom_risk_items', $risk_items);
    }
    

    
    public function getRiskItems($homeroom_id=0)
    {
        if($homeroom_id==0){
            $homeroom_id = $this->ci->input->get_post('id', 0);
        }
        
        $sql = 'SELECT * FROM homeroom_risk_items WHERE homeroom_id=' . $homeroom_id;
        return $this->ci->db->query($sql)->result();
    }
    
    public function getItem($homeroom_id=0){
        $sql = 'SELECT id FROM homeroom_risk_items WHERE homeroom_id=' . $homeroom_id;
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
        $sql = 'SELECT * FROM homeroom_risks WHERE advisor_id=' . $advisor_id;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }
    
    public function getItemByAdvisor($advisor_id = 0)
    {
        $sql = 'SELECT homerooms.week, homeroom_risks.* FROM homeroom_risks 
                    LEFT JOIN homerooms ON (homeroom_risks.homeroom_id=homerooms.id)
                    WHERE homeroom_risks.advisor_id=' . $advisor_id;
        echo $sql;
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

}
