<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class TableGroup extends JTable
{
    public $id = NULL;
    public $college_id = NULL;
    public $major_id = NULL;
    public $minor_id = NULL;
    public $grouup_code = NULL;
    public $group_name = NULL;
    public $created_at = NULL;
    public $updated_at = NULL;
    public $status = NULL;
    
    // Join Field (Hidden)
    private $major_name = NULL;
    private $minor_name = NULL;
    
    public function __construct($db=NULL){
        parent::__construct('groups', 'id', $db);
    }
}