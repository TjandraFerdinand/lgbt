<?php

class Logic_user Extends CI_Model{

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        } 

	public function select_job_category()
	{
		$sql=<<<EOF

			SELECT * FROM `job_category`;
EOF;
		
		$res = $this->db->query($sql)->result_array();
		return $res;
	}

	public function select_job_list()
        {
                $sql=<<<EOF

                        SELECT * FROM `job_list`;
EOF;


                $res = $this->db->query($sql)->result_array();
                return $res;
        }

	public function insert_user($param)
	{
		$data[]	= $param['fullname1'].$param['fullname2'];
		$data[]	= $param['furigana1'].$param['furigana2'];
		$data[]	= $param['year']."-".$param['month']."-".$param['day'];
		$data[]	= $param['phone_num'];
		$data[]	= $param['email'];
		

		$this->db->trans_start();
		
		$sql=<<<EOF
	
		INSERT INTO `user` (`fullname`, `furigana`, `date_of_birth`, `phone_number`, `email`) VALUES (?,?,?,?,?);
EOF;
		$res = $this->db->query($sql,$data);

                $last_id = $this->db->insert_id($res);
		
		//INSERT INTO TABLE INDUSTRY
                foreach($param['current_job_type'] as $key)
                {
                        $sql_job=<<<EOF
                                INSERT INTO `user_job_relation` (`user_id`, `job_list_name`) VALUES ('{$last_id}', '{$key}');
EOF;
                        $res_job = $this->db->query($sql_job);
                }
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE)
                {
                        $this->db->trans_rollback();
                }
                else
                {
                        $this->db->trans_commit();
                        $result = true;
                }

                return $result;


	}
	
}


?>
