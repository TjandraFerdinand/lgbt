<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends CI_Controller 
{
        
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    public function login()
    {
        $this->load->view('admin/login');
    }
    
    public function login_action()
    {
        $this->load->library('session');
        $name = $this->input->post('admin_name');
        $password = $this->input->post('admin_password');
        
        $this->load->model('Service_admin');
        $ret =  $this->Service_admin->is_user($name,$password);
        
            if ($ret) {
            //set session
            $admin = array('admin_name' => $ret[0]['id']);
            $this->session->set_userdata($admin);
            
            //redirect to mypage
            redirect(base_url().'admin/top');
            } else {
            //redirect login page to back
            redirect(base_url().'admin');
            }
    }
    
    public function top()
    {
        //$this->load->library('session');
        //$session = $this->session->userdata('username');
        
        $this->load->view('admin/top');
    }
    
   
   
}
?>    