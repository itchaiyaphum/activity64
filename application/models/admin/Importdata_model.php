<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Importdata_model extends BaseModel
{
    public function saveData()
    {
        $data           = $this->ci->input->post();
        $csv_data       = $data['csv_data'];
        $update_exists  = $data['update_exists'];
        $data_type      = $data['data_type'];

        $items = $this->extractData($csv_data);

        $result = false;
        if ($data_type=='group') {
            $result = $this->importGroup($items, array('update_exists'=>$update_exists));
        }
        return $result;
    }

    public function extractData($csv_data=null)
    {
        if (is_null($csv_data)) {
            $csv_data = $this->input->get_post('csv_data');
        }
        
        //extract data to each block
        $rows = explode("\n", $csv_data);

        $items = array();
        //explode data by tab
        foreach ($rows as $row) {
            //extract data by tab
            $item = explode("/t", $row);
            if (count($item)<=1) {
                $item = explode("	", $row);
            }
            //extract data by comma
            if (count($item)<=1) {
                $item = explode(",", $row);
            }

            array_push($items, $item);
        }

        return $items;
    }

    public function importGroup($items=null, $options=array())
    {
        $valid_num_field = 6;
        $update_exists = $options['update_exists'];

        $prepare_data = array();
        foreach ($items as $item) {
            $num = count($item);

            //check valid num field
            if ($num==$valid_num_field) {
                array_push($prepare_data, array(
                    'group_code' => $item[0],
                    'group_name' => $item[1],
                    'college_id' => $item[2],
                    'major_id' => $item[3],
                    'minor_id' => $item[4],
                    'status' => $item[5],
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time())
                ));
            }
        }

        if (count($prepare_data)) {
            if ($update_exists=='update') {
                return $this->updateData('groups', $prepare_data, 'group_code');
            } elseif ($update_exists=='replace') {
                return $this->insertData('groups', $prepare_data, 'group_code');
            }
        }
        return false;
    }
    private function insertData($table=null, $items=null, $key='id')
    {
        $ids = array();
        foreach ($items as $item) {
            array_push($ids, $item['group_code']);
        }

        $this->ci->db->where_in($key, $ids);
        $this->ci->db->delete($table);
        
        $result = $this->ci->db->insert_batch($table, $items);
        if ($result) {
            $this->ci->session->set_flashdata('import_status', 'Import data (insert) successfully!...');
        } else {
            $this->ci->session->set_flashdata('import_status', 'Import data (insert) not success!...');
        }
        return $result;
    }
        
    private function updateData($table=null, $items=null, $key='id')
    {
        // $sql = "SELECT * FROM {$table} ";
        // $query = $this->ci->db->query($sql);
        // $items = $query->result();

        return $this->ci->db->update_batch($table, $items, $key);
    }
}
