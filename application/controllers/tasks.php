<?php 
if (!defined('BASEPATH')) 
	exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function __construct() {
		parent::__construct();
                $this->load->helper('url');
	}
	
	public function index()
	{
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['level'] = $session_data['level'];
           $this->load->view("task/normal/add_task_view", $data);
	}

}