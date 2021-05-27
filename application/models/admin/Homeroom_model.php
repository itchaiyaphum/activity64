<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Homeroom_model extends BaseModel
{

    public $table = NULL;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->ci->factory_lib->getTable('HomeRoom');
    }

    public function getPagination()
    {
        return $this->ci->helper_lib->getPagination(array(
            'base_url' => '/admin/homeroom/',
            'total_rows' => count($this->getItems(array(
                'no_limit' => true
            ))),
            'per_page' => 10
        ));
    }

    public function getItems($options = array())
    {
        $where = $this->getQueryWhere($options);
//         $sql = "SELECT * FROM homerooms WHERE {$where}";
        $sql = "SELECT semester.name AS semester_name,homerooms.* FROM homerooms
                    LEFT JOIN semester ON (homerooms.semester_id=semester.id)
                    WHERE {$where}";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getQueryWhere($options)
    {
        $filter_search = $this->ci->input->get_post('homeroom_filter_search');
        $filter_status = $this->ci->input->get_post('homeroom_filter_status');
        
        $wheres = array();
        
        // filter: status
        $options['filter_status'] = $filter_status;
        $filter_status_value = $this->getQueryStatus($options);
        $wheres[] = "homerooms.status IN({$filter_status_value})";
        
        // filter: search
        if ($filter_search != "") {
            $filter_search_value = $filter_search;
            $wheres[] = "homerooms.week LIKE '%{$filter_search_value}%'";
        }
        
        // render query
        return $this->renderQueryWhere($wheres, $options);
    }

}
