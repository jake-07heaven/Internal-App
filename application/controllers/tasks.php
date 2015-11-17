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
            $this->add_task_view();
	}
        
        public function add_task_view()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['level'] = $session_data['level'];
            $data['employees'] = $this->get_employees();
            $data['companies'] = $this->get_companies();
            $data['jobs'] = $this->get_jobs();
            $data['jobs_companies'] = $this->get_jobs_comp();
            $this->load->helper(array('form'));
            $this->load->view('head', $data);
            $this->load->view('header', $data);
            $this->load->view('navigation', $data);
            $this->load->view("task/normal/add_task_view", $data);
            $this->load->view('footer');
        }


        public function get_employees()
        {
            $this->load->model('employees_model','',TRUE);
            
            $data = $this->employees_model->get_current_employees();
            
            return $data;
        }
        public function get_jobs()
        {
            $this->load->model('jobs_model','',TRUE);
            
            $data = $this->jobs_model->get_current_jobs();
            
            return $data;
        }
        public function get_jobs_comp()
        {
            $this->load->model('jobs_model','',TRUE);
            
            $data = $this->jobs_model->get_jobs_companies();
            
            return $data;
        }
        public function get_companies() 
        {
            $this->load->model('companies_model','',TRUE);
            
            $data = $this->companies_model->get_current_companies();
            
            return $data;
        }
        public function new_task()
        {
            
            $data = array(
                'name' => $this->input->post('task'),
                'description' => $this->input->post('desc'),
                'linked_job' => $this->input->post('job'),
                'linked_company' => $this->input->post('company'),
                'linked_employees' => $this->input->post('employees'),
                'start_date' => $this->input->post('start'),
                'end_date' => $this->input->post('end')
            );
            
            $this->load->model('tasks_model','',TRUE);
            
            $data = $this->tasks_model->new_task($data);
            
            redirect('tasks', 'refresh');
        }

}