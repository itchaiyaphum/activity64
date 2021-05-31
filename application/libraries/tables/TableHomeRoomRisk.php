<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TableHomeRoomRisk extends JTable
{
    public $id = NULL;
    public $homeroom_id = NULL;
    public $advisor_id = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $status = NULL;
    
    public function __construct($db=NULL){
        parent::__construct('homeroom_risks', 'id', $db);
    }
}