<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lp_lgbt extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->library('user_agent');
                $this->load->helper('url');
                $this->load->helper('form');
       		$this->load->library('form_validation');
                $this->load->database();
		$this->load->library('session');
                $this->load->library('email');
		$this->config->load('email_config', TRUE);
	 }


        public function index()
        {
                $this->load->model('Logic_user');
		$res['category'] = $this->Logic_user->select_job_category();	
		$res['list']	 = $this->Logic_user->select_job_list();

		if ($this->agent->mobile())
                {
                        $this->load->view('sp/index.html',$res);
                }else{
                        $this->load->view('pc/index.html',$res);
                }
        }
	
	private function _validate()
        {
                $this->form_validation->set_rules('fullname1', '姓', 'required');
                $this->form_validation->set_rules('fullname2', '名', 'required');
                $this->form_validation->set_rules('furigana1', 'セイ', 'required');
                $this->form_validation->set_rules('furigana2', 'メイ', 'required');
                $this->form_validation->set_rules('phone_num', '電話番号', 'required');
                $this->form_validation->set_rules('year', '年', 'required');
                $this->form_validation->set_rules('month', '月', 'required');
                $this->form_validation->set_rules('day', '日', 'required');
                $this->form_validation->set_rules('current_job_type[]', '現在の職種', 'required');
                $this->form_validation->set_rules('email', 'メールアドレス', 'required|valid_email|is_unique[user.email]');
                $this->form_validation->set_rules('re-email', '半角英数字のみ。入力確認のため、上記と同じメールアドレスをご入力ください', 'required|matches[email]');
	//	$this->form_validation->set_message('required', 'Please insert %s');

                $this->form_validation->set_error_delimiters('<span class="attention">*','</span>');

                if ($this->form_validation->run() == FALSE)
                {
                        $res = false;
                }else{
                        $res = true;
                }
                return $res;
        }

	public function register()
        {
	//	print "<pre>";
	//	var_dump($this->input->post());
	//exit;
                $res = $this->_validate();
                if (!$res)
                {
                        $this->index();

                }else{
                        $post['fullname1'] = $this->input->post('fullname1');
                        $post['fullname2'] = $this->input->post('fullname2');
                        $post['furigana1'] = $this->input->post('furigana1');
                        $post['furigana2'] = $this->input->post('furigana2');
                        $post['year']      = $this->input->post('year');
                        $post['month']     = $this->input->post('month');
                        $post['day']       = $this->input->post('day');
                        $post['phone_num'] = $this->input->post('phone_num');
                        $post['current_job_type'] = $this->input->post('current_job_type');
                        $post['email']      = $this->input->post('email');
                        $post['re-email']   = $this->input->post('re-email');
                        $post['newsletter'] = $this->input->post('newsletter');

			$email_config = $this->config->item('email_config');
               		 $this->email->initialize($email_config);
                        $this->load->model('Logic_user');
                        $this->Logic_user->insert_user($post);

                        $this->email_admin();
			$this->email_user();

                        $this->thanks();
                }
        }

	public function email_admin()
        {
                $this->email->from('ferdinand.reeracoen@gmail.com', 'Admin');
                $this->email->to('ferdinand.reeracoen@gmail.com');
		$this->email->cc('eric.reeracoen@gmail.com');
                $this->email->subject('[NEW] User Registered');
                $this->email->message('Some New User Registered on LGBT');

                $this->email->send();
        }

	 public function email_user()
        {
	        
		$this->email->from('ferdinand.reeracoen@gmail.com', 'Admin');
                $this->email->to($this->input->post('email'));
                $this->email->subject('[LGBT] Success Registered');
                $body = <<<HTML
<html>                
<body>

<font size="20px"> CONGRATULATION!! Your Form success registered</font>
</body>
</html>
HTML;
                $this->email->message($body);

                $this->email->send();
        }


        public function thanks()
        {
                $this->load->view('pc/thanks.html');
        }


	



}
