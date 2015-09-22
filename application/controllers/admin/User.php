<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user extends CI_Controller 
{
        
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    public function list_data()
    {
        $this->load->Model('Service_user');
        $user_list = $this->Service_user->get_user_list();
        $data['user_list'] = $user_list;
        //print"<pre>";
        //var_dump($data);
        //exit;
        $this->load->view('admin/user_list',$data);
    }
    
    public function detail($id)
    {
        $this->load->Model('Service_user');
        $ret['user_detail'] = $this->Service_user->get_user_detail($id);
        //print"<pre>";
        //var_dump($ret);
        //exit;
        $this->load->view('admin/user_detail',$ret);
    }
   
    public function delete($id)
    {
        $this->load->Model('Service_user');
        $delete = $this->Service_user->change_delete_flag($id);
        
        redirect(base_url().'admin/user/list');
    }
}
?>  