<?php
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Base_homeroom_model extends BaseModel
{
    public $table = null;

    public function __construct()
    {
        parent::__construct();
        $this->ci->load->library('homeroom_lib');
        $this->ci->load->library('profile_lib');
    }

    public function getItems()
    {
        $advisor_id = $this->ci->profile_lib->getUserId();

        $items = array();

        //get all homeroom items
        $this->ci->load->model('admin/homeroom_model', 'admin_homeroom_model');
        $homeroom_items = $this->ci->admin_homeroom_model->getItems(array(
            'status' => 1,
            'no_limit' => true
        ));

        //get all groups items
        $group_items = $this->ci->homeroom_lib->getGroupsByAdvisor();

        //get all action items
        $action_items = $this->ci->homeroom_lib->getAllActionItems();

        //get all groups items
        $advisor_groups_items = $this->ci->homeroom_lib->getAllAdvisorGroups();

        foreach ($homeroom_items as $homeroom) {
            $temp_item = new stdClass();
            $temp_item->id              = $homeroom->id;
            $temp_item->week            = $homeroom->week;
            $temp_item->semester_name   = $homeroom->semester_name;
            $temp_item->join_start      = $homeroom->join_start;
            $temp_item->join_end        = $homeroom->join_end;
            $temp_item->is_lock         = $homeroom->id;
            $temp_item->remark          = $homeroom->remark;
            $temp_item->groups          = array();
            
            foreach ($group_items as $group) {
                $temp_group = new stdClass();
                $temp_group->id                 = $group->id;
                $temp_group->group_name         = $group->group_name;
                $temp_group->major_name         = $group->major_name;
                $temp_group->minor_name         = $group->minor_name;

                $temp_group->advisors           = array();
                foreach ($advisor_groups_items as $advisor_group) {
                    if ($advisor_group->group_id==$group->id) {
                        $action_status = 'pending';
                        foreach ($action_items as $action) {
                            if ($action->homeroom_id==$homeroom->id && $action->group_id==$group->id && $action->user_id==$advisor_group->advisor_id) {
                                $action_status = $action->action_status;
                            }
                        }

                        $tmp_advisor_group                  = new stdClass();
                        $tmp_advisor_group->advisor_id      = $advisor_group->advisor_id;
                        $tmp_advisor_group->advisor_type    = $advisor_group->advisor_type;
                        $tmp_advisor_group->advisor_status  = $action_status;

                        array_push($temp_group->advisors, $tmp_advisor_group);
                    }
                }

                array_push($temp_item->groups, $temp_group);
            }
            array_push($items, $temp_item);
        }

        // echo "<pre>";
        // print_r($items);
        // exit();
        
        return $items;
    }
}
