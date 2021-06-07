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

    public function getAttactments($homeroom_id=0)
    {
        $sql = 'SELECT * FROM homeroom_obedience_attachments WHERE homeroom_id=' . $homeroom_id.' AND status=1';
        $query = $this->ci->db->query($sql);
        $items = $query->result();
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

    public function saveData()
    {
        $obedience_data = $this->ci->input->post();
        $homeroom_id = $this->ci->input->post('homeroom_id', 0);
        $advisor_id = $this->ci->tank_auth->get_user_id();
        
        /*
        // upload files
        */
        $file_items = $this->saveFiles();
        $files_data = array();
        foreach ($file_items as $key => $val) {
            if (!is_null($val)) {
                array_push($files_data, array(
                    'homeroom_id' => $homeroom_id,
                    'advisor_id' => $advisor_id,
                    'img' => $val,
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                    'status' => 1
                ));
            }
        }
        if (count($files_data)) {
            // clear old obedience_attachments data
            $this->ci->db->delete('homeroom_obedience_attachments', array('homeroom_id' => $homeroom_id));
            // insert obedience_attachments items
            $this->ci->db->insert_batch('homeroom_obedience_attachments', $files_data);
        }

        /*
        // save obedience data
        */
        $sql = 'SELECT id 
                    FROM homeroom_obediences
                    WHERE homeroom_id='.$homeroom_id.' AND advisor_id='.$advisor_id;
        $query = $this->ci->db->query($sql);
        $obedience_items = $query->result();

        $data = array();
        if (count($obedience_items)) {
            $data['id'] = $obedience_items[0]->id;
            $data['updated_at'] = mdate('%Y-%m-%d %H:%i:%s', time());
        } else {
            $data['created_at'] = mdate('%Y-%m-%d %H:%i:%s', time());
            $data['updated_at'] = mdate('%Y-%m-%d %H:%i:%s', time());
            $data['status'] = 1;
        }

        return $this->save(array_merge($obedience_data, $data));
    }

    private function saveFiles()
    {
        $homeroom_id = $this->ci->input->post('homeroom_id', 0);
        $advisor_id = $this->ci->tank_auth->get_user_id();
        
        $config = array();
        $config['upload_path'] = './storage/obediences/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['file_name'] = $homeroom_id.'-'.$advisor_id;
        $config['max_size']	= '10240';
        $this->ci->upload->initialize($config);

        $file_items = array(
            'file1' => null,
            'file2' => null
        );
    
        if ($this->ci->upload->do_upload('upload_file_1')) {
            $file1_data = $this->ci->upload->data();
            //resize thumbnail
            $config_photo['image_library'] = 'gd2';
            $config_photo['source_image']	= $config['upload_path'].$file1_data['file_name'];
            $config_photo['new_image'] = $config['upload_path'].'/thumbnail/'.$file1_data['file_name'];
            $config_photo['create_thumb'] = false;
            $config_photo['maintain_ratio'] = true;
            $config_photo['width']	= 1920;
            $config_photo['height']	= 1080;
            $this->ci->image_lib->initialize($config_photo);
            $this->ci->image_lib->resize();
            
            $file_items['file1'] = '/storage/obediences/thumbnail/'.$file1_data['file_name'];
        }

        if ($this->ci->upload->do_upload('upload_file_2')) {
            $file2_data = $this->ci->upload->data();
            //resize thumbnail
            $config_photo['image_library'] = 'gd2';
            $config_photo['source_image']	= $config['upload_path'].$file2_data['file_name'];
            $config_photo['new_image'] = $config['upload_path'].'/thumbnail/'.$file2_data['file_name'];
            $config_photo['create_thumb'] = false;
            $config_photo['maintain_ratio'] = false;
            $config_photo['width']	= 1920;
            $config_photo['height']	= 1080;
            $this->ci->image_lib->initialize($config_photo);
            $this->ci->image_lib->resize();
            
            $file_items['file2'] = '/storage/obediences/thumbnail/'.$file2_data['file_name'];
        }

        return $file_items;
    }
}
