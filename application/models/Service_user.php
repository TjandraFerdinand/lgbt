<?php 
class Service_user extends CI_Model 
{

    public function __construct()
    {
        $this->load->database();
        parent::__construct();
    }

    public function get_user_list()
    {
        $sql = <<<EOF
                SELECT `user_id`,`fullname`,`delete_flag`
            FROM
                `user`    
            ;
EOF;
        
        $res = $this->db->query($sql)->result_array();
        return $res;
    }
    
    public function get_user_detail($id)
    {
        $this->db->trans_start();//Used for upload several datas as a PACKAGE! Start   
        //
        $sql = <<<EOF
            SELECT *
            FROM 
               user
            WHERE user_id = '{$id}'
EOF;
        $res['user'] = $this->db->query($sql)->result_array();
        
        $sql2 = <<<EOF
            SELECT ujr.job_list_name
            FROM 
                user_job_relation AS ujr
                INNER JOIN user AS u
                    ON ujr.user_id = u.user_id
            WHERE ujr.user_id = '{$id}';
EOF;
        $res['job_list'] = $this->db->query($sql2)->result_array();
        
        $this->db->trans_complete();
        return $res;
    }
    
    public function change_delete_flag($id)
    {
        $sql = <<<EOF
            UPDATE `user` SET `delete_flag`='1'
            
            WHERE user_id = '{$id}';
EOF;
        $res['user'] = $this->db->query($sql);
    }
}
?>