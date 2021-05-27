<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Factory_lib
{
    public $table = null;
    
    public function __construct()
    {
        $this->ci = & get_instance();
        $this->ci->load->database();
    }

    public function getTable($table)
    {
        $class_name = 'Table'.$table;
        return new $class_name($this->ci->db);
    }
    
}
