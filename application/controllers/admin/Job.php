<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class job extends CI_Controller 
{
        
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    public function list_data()
    {
        //LOADING JOB LIST
        $this->load->model('Service_admin');
        $data['job_list'] = $this->Service_admin->get_job_list();
        
        $this->load->view('admin/job_list',$data);
    }
    
    public function add_job()
    {
        $this->load->model('Service_admin');
        $data['job_category'] = $this->Service_admin->get_job_category();
      
        $this->load->view('admin/add_job',$data);
    }
    
    //CONFIRM JOB NAME AND REGISTER
    public function confirm_job()
    {
        $res = $this->_validate();
        if ($res) { 
            $post = $this->input->post();
            $data['job_name'] = $this->input->post('job_name');
            $data['input_job_category'] = $this->input->post('input_job_category');
            
            $this->load->model('Service_admin');
            $res = $this->Service_admin->add_job($data);
            redirect(base_url().'admin/job/list');
        }else 
            {//If does not work go to
            $this->load->model('Service_admin');
            $data['job_category'] = $this->Service_admin->get_job_category();
            $this->load->view('admin/add_job',$data);
            }
    }
    
    //VALIDATING JOB NAME
    private function _validate() 
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('job_name', 'Job Name', 'required|callback_job_name_check');
        $this->form_validation->set_message('required', '※Please Input %s');
        $this->form_validation->set_error_delimiters('<font color="red">', '</font>');
        
            if ($this->form_validation->run() == FALSE)
            {
            return FALSE;
            } else
            {
            return TRUE;
            }
    }
    
    //JOB NAME CHECK
    function job_name_check($str)
    {
        $this->load->database();
        $sql = <<<EOF
            SELECT * FROM `job_list` WHERE job_list_name = '{$str}' ;
EOF;
        
        $result = $this->db->query($sql)->result_array();
        if ($result)
        {
            $this->form_validation->set_message('job_name_check', '※%s is already been used.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    
    
    
    
    
    
    
    public function add_job_category()
    {
        $this->load->view('admin/add_job_category');
    }
    
    //CONFIRM JOB CATEGORY NAME AND REGISTER
    public function confirm_job_category()
    {
        $res = $this->_validatejc();
        if ($res) { 
            $post = $this->input->post();
            $data['job_category_name'] = $this->input->post('job_category_name');
            
            $this->load->model('Service_admin');
            $res = $this->Service_admin->add_job_category($data);
            redirect(base_url().'admin/job/list');
        }else 
            {//If does not work go to
            $this->load->view('admin/add_job_category');
            }
    }
    
    //VALIDATING JOB CATEGORY NAME
    private function _validatejc() 
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('job_category_name', 'Job Category Name', 'required|callback_job_category_name_check');
        $this->form_validation->set_message('required', '※Please Input %s');
        $this->form_validation->set_error_delimiters('<font color="red">', '</font>');
        
            if ($this->form_validation->run() == FALSE)
            {
            return FALSE;
            } else
            {
            return TRUE;
            }
    }
    
    //JOB CATEGORY NAME CHECK
    function job_category_name_check($str)
    {
        $this->load->database();
        $sql = <<<EOF
            SELECT * FROM `job_category` WHERE job_category_name = '{$str}' ;
EOF;
        
        $result = $this->db->query($sql)->result_array();
        if ($result)
        {
            $this->form_validation->set_message('job_category_name_check', '※%s is already been used.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    
}
?> 