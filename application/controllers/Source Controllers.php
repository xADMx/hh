<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
}
