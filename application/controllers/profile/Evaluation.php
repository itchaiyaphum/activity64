<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluation extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('form_validation');
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
        
        $this->executeRedirection();
    }
    
    private function executeRedirection(){
        $profile = $this->profile_lib->getData();
        if($profile->user_type=="advisor"){
            redirect('/advisor/');
        }else if($profile->user_type=="trainer"){
            redirect('/trainer/');
        }else if($profile->user_type=="staff"){
            redirect('/staff/');
        }
    }

    public function index()
    {
        if (! $this->tank_auth->is_logged_in()) { // not logged in or not activated
            redirect('/auth/login/');
        } else {
            if($this->profile_lib->checkNotChooseInternship()){
                $this->load->view('nav');
                $this->load->view('student/changeprofile');
                $this->load->view('footer');
            } else {
                
                $profile = $this->profile_lib->getData();
                $student_id = $profile->user_id;
                $internship_id = $profile->internship_id;
                $company_id = $profile->company_id;
                $college_id = $profile->college_id;
                
                $items = array();
                
                // TIME
                $sql = "SELECT * FROM time WHERE user_id={$student_id} ";
                $query = $this->db->query($sql);
                $items['time_items'] = $query->result();
                
                // ACTIVITY
                $sql = "SELECT * FROM activity WHERE user_id={$student_id} ";
                $query = $this->db->query($sql);
                $items['activity_items'] = $query->result();
                
                // Internship
                $sql = "SELECT * FROM internship WHERE id={$internship_id} ";
                $query = $this->db->query($sql);
                $items['internship_items'] = $query->result();
                
                // Company
                $sql = "SELECT * FROM company WHERE id={$company_id} ";
                $query = $this->db->query($sql);
                $items['company_items'] = $query->result();
                
                // College and Department
                $sql = "SELECT d.name as department_name, c.name as college_name FROM users as u
                            LEFT JOIN users_student as u_student ON (u.id=u_student.user_id)
                            LEFT JOIN college as c ON (u_student.college_id=c.id)
                            LEFT JOIN department as d ON (u_student.department_id=d.id)
                            WHERE u.id={$student_id} ";
                $query = $this->db->query($sql);
                $items['college_items'] = $query->result();
                

                $data = array();
                $data['leftmenu'] = $this->load->view('trainer/menu', '', true);
                $data['time_items'] = $items['time_items'];
                $data['activity_items'] = $items['activity_items'];
                
                $data['data'] = $this->renderViewIndexData($items);
                
                $this->load->view('nav');
                $this->load->view('student/evaluation',$data);
                $this->load->view('footer');
            }
        }
    }
    
    private function renderViewIndexData($items=array()){
        //get items data
        $college_items = $items['college_items'];
        $company_items = $items['company_items'];
        $internship_items = $items['internship_items'];
        $time_items = $items['time_items'];
        $activity_items = $items['activity_items'];
        
        // calculation
        $total_come = 0;
        $total_late = 0;
        $total_not_come = 0;
        $total_leave = 0;
        $total_all = 0;
        
        $total_advisor_check = 0;
        $total_student_activity = 0;
        $total_trainer_confirm = 0;
        $total_advisor_check_percentage = 0;
        $total_student_activity_percentage = 0;
        $total_trainer_confirm_percentage = 0;
        
        $stats = array();
        for($i=0; $i<18; $i++){
            $week_no = $i + 1;
            $num_come = 0;
            $num_late = 0;
            $num_not_come = 0;
            $num_leave = 0;
            $num_total = 0;
        
            $advisor_check = 0;
            $advisor_check_percentage = 0;
            $student_activity = 0;
            $student_activity_percentage = 0;
            $trainer_confirm = 0;
            $trainer_confirm_percentage = 0;
        
            // calculate stats (time) each week
            for($j=0; $j<count($time_items); $j++){
                if($time_items[$j]->week==$week_no){
                    // calculate: come
                    $num_come++;
        
                    // calculate: not come
                    // calculate: late
                    // calculate: leave
        
                    // calculate: advisor check
                    if($time_items[$j]->advisor_check_status==1){
                        $advisor_check++;
                    }
        
                    // calculate: trainer confirm
                    if($time_items[$j]->trainer_confirm_status==1){
                        $trainer_confirm++;
                    }
                }
            }
        
            // calculate stats (activity) each week
            for($j=0; $j<count($activity_items); $j++){
                if($activity_items[$j]->week==$week_no){
                    // calculate: activity save
                    $student_activity++;
                }
            }
        
            $num_total = $num_come;
        
            // summary stats
            $total_come += $num_come;
            $total_late += $num_late;
            $total_not_come += $num_not_come;
            $total_leave += $num_leave;
            $total_all += $num_total;
        
            $total_advisor_check += $advisor_check;
            $total_student_activity += $student_activity;
            $total_trainer_confirm += $trainer_confirm;
        
            $advisor_check_percentage = ($advisor_check/5) * 100;
            $student_activity_percentage = ($student_activity/5) * 100;
            $trainer_confirm_percentage = ($trainer_confirm/5) * 100;
            
            // mapping data
            $stat = new stdClass();
            $stat->week = $week_no;
            $stat->come = $num_come;
            $stat->not_come = $num_not_come;
            $stat->late = $num_late;
            $stat->leave = $num_leave;
            $stat->total = $num_total;
            $stat->advisor_check_percentage = $advisor_check_percentage;
            $stat->student_activity_percentage = $student_activity_percentage;
            $stat->trainer_confirm_percentage = $trainer_confirm_percentage;
            array_push($stats, $stat);
        }
        
        $total_advisor_check_percentage = ($total_advisor_check/(18*5)) * 100;
        $total_student_activity_percentage = ($total_student_activity/(18*5)) * 100;
        $total_trainer_confirm_percentage = ($total_trainer_confirm/(18*5)) * 100;
        
        // totals
        $totals = new stdClass();
        $totals->come = $total_come;
        $totals->not_come = $total_not_come;
        $totals->late = $total_late;
        $totals->leave = $total_leave;
        $totals->total = $total_all;
        $totals->advisor_check = $total_advisor_check;
        $totals->student_activity = $total_student_activity;
        $totals->trainer_confirm = $total_trainer_confirm;
        $totals->advisor_check_percentage = $total_advisor_check_percentage;
        $totals->student_activity_percentage = $total_student_activity_percentage;
        $totals->trainer_confirm_percentage = $total_trainer_confirm_percentage;
        
        //mapping data
        $data = new stdClass();
        $data->college_name = $college_items[0]->college_name;
        $data->college_department_name = $college_items[0]->department_name;
        $data->company_name = $company_items[0]->name;
        $data->internship_start = $internship_items[0]->internship_start;
        $data->internship_end = $internship_items[0]->internship_end;
        $data->stats = $stats;
        $data->totals = $totals;
        
        return $data;
    }
}
