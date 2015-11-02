<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $session_data = $this->session->userdata('logged_in');
        $data['level'] = $session_data['level'];
        if($this->session->userdata('logged_in'))
        {
            if($data['level'] == 5)
            {
                $this->load->view('admin/panel', $data);
            } else
            {
                redirect('dashboard', 'refresh');
            }
        } else
        {
            redirect('login', 'refresh');
        }
    }
}