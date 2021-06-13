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
        } elseif ($data_type=='major') {
            $result = $this->importMajor($items, array('update_exists'=>$update_exists));
        } elseif ($data_type=='minor') {
            $result = $this->importMinor($items, array('update_exists'=>$update_exists));
        } elseif ($data_type=='advisor') {
            $result = $this->importAdvisor($items, array('update_exists'=>$update_exists));
        }
        return $result;
    }

    public function extractData($csv_data=null)
    {
        if (is_null($csv_data)) {
            $csv_data = $this->ci->input->get_post('csv_data');
        }
        
        //extract data to each block
        $rows = explode("\n", $csv_data);

        $items = array();
        //explode data by tab
        foreach ($rows as $row) {
            //extract data by tab
            $item = explode("/t", $row);
            //extract data by comma
            if (count($item)<=1) {
                $item = explode(",", $row);
            }

            array_push($items, $item);
        }

        return $items;
    }

    // [group_code,group_name,college_id,major_id,minor_id,status]
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

        // echo "<pre>";
        // print_r($items);
        // print_r($prepare_data);
        // exit();
        
        if (count($prepare_data)) {
            if ($update_exists=='update') {
                return $this->updateData('groups', $prepare_data, 'group_code');
            } elseif ($update_exists=='replace') {
                return $this->insertData('groups', $prepare_data, 'group_code');
            }
        }
        return false;
    }

    // [college_id,major_code,major_name,major_eng,status]
    public function importMajor($items=null, $options=array())
    {
        $valid_num_field = 5;
        $update_exists = $options['update_exists'];

        $prepare_data = array();
        foreach ($items as $item) {
            $num = count($item);

            //check valid num field
            if ($num>=$valid_num_field) {
                array_push($prepare_data, array(
                    'college_id' => $item[0],
                    'major_code' => $item[1],
                    'major_name' => $item[2],
                    'major_eng' => $item[3],
                    'status' => $item[4],
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time())
                ));
            }
        }

        // echo "<pre>";
        // print_r($items);
        // print_r($prepare_data);
        // exit();
        
        if (count($prepare_data)) {
            if ($update_exists=='update') {
                return $this->updateData('majors', $prepare_data, 'major_code');
            } elseif ($update_exists=='replace') {
                return $this->insertData('majors', $prepare_data, 'major_code');
            }
        }
        return false;
    }

    // [college_id,major_id,minor_code,minor_name,minor_eng,status]
    public function importMinor($items=null, $options=array())
    {
        $valid_num_field = 6;
        $update_exists = $options['update_exists'];

        $prepare_data = array();
        foreach ($items as $item) {
            $num = count($item);

            //check valid num field
            if ($num>=$valid_num_field) {
                array_push($prepare_data, array(
                    'college_id' => $item[0],
                    'major_id' => $item[1],
                    'minor_code' => $item[2],
                    'minor_name' => $item[3],
                    'minor_eng' => $item[4],
                    'status' => $item[5],
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time())
                ));
            }
        }

        // echo "<pre>";
        // print_r($items);
        // print_r($prepare_data);
        // exit();
        
        if (count($prepare_data)) {
            if ($update_exists=='update') {
                return $this->updateData('minors', $prepare_data, 'minor_code');
            } elseif ($update_exists=='replace') {
                return $this->insertData('minors', $prepare_data, 'minor_code');
            }
        }
        return false;
    }

    // [college_id,major_id,firstname,lastname,email,status]
    public function importAdvisor($items=null, $options=array())
    {
        $valid_num_field = 6;
        $update_exists = $options['update_exists'];

        $prepare_data = array();
        foreach ($items as $item) {
            $num = count($item);

            //check valid num field
            if ($num>=$valid_num_field) {
                array_push($prepare_data, array(
                    'college_id' => $item[0],
                    'major_id' => $item[1],
                    'firstname' => $item[2],
                    'lastname' => $item[3],
                    'email' => $item[4],
                    'status' => $item[5],
                    'created_at' => mdate('%Y-%m-%d %H:%i:%s', time()),
                    'updated_at' => mdate('%Y-%m-%d %H:%i:%s', time())
                ));
            }
        }

        // echo "<pre>";
        // print_r($items);
        // print_r($prepare_data);
        // exit();
        
        if (count($prepare_data)) {
            if ($update_exists=='update') {
                return $this->updateData('users_advisor', $prepare_data, 'email');
            } elseif ($update_exists=='replace') {
                return $this->insertData('users_advisor', $prepare_data, 'email');
            }
        }
        return false;
    }

    private function insertData($table=null, $items=null, $key='id')
    {
        $ids = array();
        foreach ($items as $item) {
            array_push($ids, $item[$key]);
        }

        $this->ci->db->where_in($key, $ids);
        $this->ci->db->delete($table);
        
        $result = $this->ci->db->insert_batch($table, $items);
        return $result;
    }
        
    private function updateData($table=null, $items=null, $key='id')
    {
        return $this->ci->db->update_batch($table, $items, $key);
    }
}
