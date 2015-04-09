<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
 	public function __construct()
    {
    	parent::__construct();

  		If ($this->session->has_userdata('ID_Session')) {
            if (!verify_access($this->session->userdata('Id_Group'), $this->uri->uri_string())) ? redirect('/', 'refresh');
    	} Else {
            redirect('/', 'refresh');
    	}
    }


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function reguser()
	{
		$data['title'] = "Регистрация пользователя";
        $data['page'] = 'reg_user';

		if !($this->uri->segment(3) === FALSE)
		{
				$this->form_validation->set_rules('login', 'Login', 'required|min_length[5]|max_length[12]');
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.Email_Users]');
		        $this->form_validation->set_rules('phone', 'Phone', 'required|is_unique[users.Phone_Users]');
		        $this->form_validation->set_rules('fio', 'FIO', 'required');

	        if ($this->form_validation->run() == TRUE)
	        {
          		$query = array(
				        'login' => $this->input->post('login');,
				        'email' => $this->input->post('email');,
				        'phone' => $this->input->post('phone');,
				        'fio'   => $this->input->post('fio');
				);

				$this->db->insert('users', $query);



	        	$data['backpage'] = 'registration/reguser';
	        	$data['page'] = 'formsuccess';

	        }
		}

		$this->load->view('main', $data);
	}

	public function regpartner()
	{
		$data['Title'] = "Регистрация партнера";

		$hidden = array('username' => 'Joe', 'member_id' => '234');
		$data['Form'] = "Регистрация партнера";

		$this->load->view('reg_partner', $data);
	}

	public function regcompany()
	{
	    $data['title'] = "Регистрация компании";
		$this->load->view('reg_company', $data);
	}
}
