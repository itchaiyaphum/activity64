<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helper_lib
{

    public function __construct()
    {
        $this->ci = & get_instance();
    }

    public function getActiveMenu($check = '')
    {
        $url1 = $this->ci->uri->segment(1);
        $url2 = $this->ci->uri->segment(2);
        $css_class = '';
        if ($url2 == '') {
            if ($url1 == $check) {
                $css_class = 'uk-active';
            }
        } else {
            if ($url2 == $check) {
                $css_class = 'uk-active';
            }
        }
        
        return $css_class;
    }
    
    public function getProgressBarHtml($percentage=0)
    {
        $percentage = number_format($percentage,0);
        
        $bar_class = " ";
        if($percentage<=50){
            $bar_class = "uk-progress-danger";
        }else if($percentage<=79){
            $bar_class = "uk-progress-warning";
        }else if($percentage>=80){
            $bar_class = "uk-progress-success";
        }
        $html = '<div class="uk-progress '.$bar_class.'">';
        $html .= '<div class="uk-progress-bar" style="width: '.number_format($percentage,0).'%;">'.number_format($percentage,0).'%</div>';
        $html .= '</div>';
        return $html;
    }
    
    public function getPaginationIndex($i=0){
        $page = $this->ci->input->get_post('per_page', 1);
        $limit = 10;
        if($page>=2){
            $i = ($limit * $page) + $i;
        }
        return $i;
    }
    
    public function getStatusIcon($status=0){
        $icon = '-';
        if($status==0){
            $icon = '<div class="uk-button uk-button-mini uk-button-danger"><i class="uk-icon uk-icon-remove"></i></div>';
        }else if($status==1){
            $icon = '<div class="uk-button uk-button-mini uk-button-success"><i class="uk-icon uk-icon-check"></i></div>';
        }else if($status==(-1)){
            $icon = '<div class="uk-button uk-button-mini uk-button-primary"><i class="uk-icon uk-icon-trash"></i></div>';
        }
        return $icon;
    }
    
    public function getFilterStatus($name='filter_status'){
        return $this->ci->input->get_post($name);
    }
    
    public function getStatusHtml($name='filter_status'){
        return '
            <select name="'.$name.'" onchange="this.form.submit();">
                <option value="all" '.set_select($name,'all',TRUE).'>- แสดงสถานะทั้งหมด -</option>
                <option value="publish" '.set_select($name,'publish').'>เผยแพร่</option>
                <option value="unpublish" '.set_select($name,'unpublish').'>ไม่เผยแพร่</option>
                <option value="trash" '.set_select($name,'trash').'>อยู่ในถังขยะ</option>
            </select>
        ';
    }
    
    public function getPagination($data=array()){
        $config['base_url'] = $data['base_url'];
        $config['total_rows'] = $data['total_rows'];
        $config['per_page'] = $data['per_page'];
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
//         $config['full_tag_open'] = '<li>';
//         $config['full_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="uk-active"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="uk-pagination-previous">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="uk-pagination-next">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->ci->load->library('pagination');
        $this->ci->pagination->initialize($config);
        return $this->ci->pagination;
    }
    
    public function getActiveMainMenu($check = '')
    {
        $url1 = $this->ci->uri->segment(1);
        $css_class = '';
        if ($url1 == $check) {
            $css_class = 'uk-active';
        }
        
        return $css_class;
    }
}
