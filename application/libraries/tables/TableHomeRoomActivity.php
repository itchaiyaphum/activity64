<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TableHomeRoomActivity extends JTable
{
    public $id = NULL;
    public $homeroom_id = NULL;
    public $user_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $status = NULL;
    public $major_id = NULL;
    
    // Join Field (Hidden)
    private $semester_name = NULL;
    
    public function __construct($db=NULL){
        parent::__construct('homeroom_activities', 'id', $db);
    }
}