<?php 
class Service_admin extends CI_Model 
{

    public function __construct()
    {
        $this->load->database();
        parent::__construct();
    }
    
     public function is_user($name,$password)
    {   
        $data[] = $name;
        $data[] = $password;
        
        $sql = <<<EOF
        SELECT `admin_id`,`admin_name`,`admin_password` FROM `admin` WHERE admin_name = ? AND admin_password = ?;
EOF;
        $res = $this->db->query($sql,$data)->result_array();
        
        if (empty($res)){
            return FALSE;    
        } else {
            return $res;
        }
        
    }

    public function add_job()
    {
        $input_job_category = $this->input->post('input_job_category');
        $job_name = $this->input->post('job_name');
        
        $data[] = $input_job_category;
        $data[] = $job_name;

        $sql = <<<EOF
            INSERT INTO `job_list` (`job_category_id`,`job_list_name`) VALUES (?,?);
EOF;
        
        $res = $this->db->query($sql,$data);
        return $res;
    }
    
    public function get_job_list()
    {
        $sql = <<<EOF
            SELECT `job_list_id`,`job_list_name`,`job_category_name` 
                FROM job_list AS jl 
                INNER JOIN job_category AS jc 
                ON jl.job_category_id = jc.job_category_id;
EOF;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }
   
    public function add_job_category()
    {
        $name = $this->input->post('job_category_name');
        $data[] = $name;

        $sql = <<<EOF
            INSERT INTO `job_category` (`job_category_name`) VALUES (?);
EOF;
        
        $res = $this->db->query($sql,$data);
        return $res;
    }
    
    public function get_job_category()
    {
        $sql = <<<EOF
            SELECT `job_category_id`,`job_category_name` FROM `job_category`;
EOF;
        $res = $this->db->query($sql)->result_array();
        return $res;
    }
}
?>    