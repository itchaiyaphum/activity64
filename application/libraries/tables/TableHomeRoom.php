<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TableHomeRoom extends JTable
{
    public $id = NULL;
    public $semester_id = NULL;
    public $week = NULL;
    public $join_start = NULL;
    public $join_end = NULL;
    public $coverr_img = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $status = NULL;
    public $created_by_user_id = NULL;
    public $remark = NULL;
    
    // Join Field (Hidden)
    private $semester_name = NULL;
    
    public function __construct($db=NULL){
        parent::__construct('homerooms', 'id', $db);
    }
}