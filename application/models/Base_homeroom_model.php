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
    }

    public function getGroupsByAdvisor($advisor_id=0)
    {
        if ($advisor_id==0) {
            $advisor_id = $this->ci->tank_auth->get_user_id();
        }
        $sql = "SELECT groups.*,majors.major_name,minors.minor_name FROM groups 
                    LEFT JOIN majors ON (groups.major_id=majors.id)
                    LEFT JOIN minors ON (groups.minor_id=minors.id)
                    WHERE groups.id IN (SELECT group_id FROM advisors_groups WHERE advisor_id={$advisor_id}) 
                            AND groups.status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getActionItems($group_id=0)
    {
        //get all groups items
        $group_items = $this->getGroupsByAdvisor();
        $groups = array();
        foreach ($group_items as $group) {
            array_push($groups, $group->id);
        }
        $group_ids = implode(',', $groups);

        $sql = "SELECT * FROM homeroom_actions 
                    WHERE user_id IN (SELECT DISTINCT advisor_id FROM advisors_groups WHERE group_id IN({$group_ids})) 
                            AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getAdvisorGroupsItems()
    {
        //get all groups items
        $group_items = $this->getGroupsByAdvisor();
        $groups = array();
        foreach ($group_items as $group) {
            array_push($groups, $group->id);
        }
        $group_ids = implode(',', $groups);

        $sql = "SELECT * FROM advisors_groups WHERE group_id IN({$group_ids}) AND status=1";
        $query = $this->ci->db->query($sql);
        $items = $query->result();
        return $items;
    }

    public function getItems()
    {
        $advisor_id = $this->ci->tank_auth->get_user_id();

        $items = array();

        //get all homeroom items
        $this->ci->load->model('admin/homeroom_model', 'admin_homeroom_model');
        $homeroom_items = $this->ci->admin_homeroom_model->getItems(array(
            'status' => 1,
            'no_limit' => true
        ));

        //get all groups items
        $group_items = $this->getGroupsByAdvisor();

        //get all action items
        $action_items = $this->getActionItems();

        //get all groups by advisor items
        $advisor_groups_items = $this->getAdvisorGroupsItems();

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
                $action_status = '';
                foreach ($action_items as $action) {
                    if ($homeroom->id==$action->homeroom_id && $group->id==$action->group_id) {
                        $action_status = $action->action_status;
                    }
                }

                $user_type = '';
                foreach ($advisor_groups_items as $advisor_group) {
                    if ($advisor_group->advisor_id==$advisor_id && $group->id==$advisor_group->group_id) {
                        $user_type = $advisor_group->advisor_type;
                    }
                }

                $temp_group = new stdClass();
                $temp_group->id                 = $group->id;
                $temp_group->group_name         = $group->group_name;
                $temp_group->major_name         = $group->major_name;
                $temp_group->minor_name         = $group->minor_name;
                $temp_group->advisor_id         = 1;
                $temp_group->advisor_type       = $user_type;
                $temp_group->advisor_status     = $action_status;
                array_push($temp_item->groups, $temp_group);
            }
            array_push($items, $temp_item);
        }
        
        return $items;
    }
}
