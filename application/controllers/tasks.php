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
            $this->tasks_view();
	}
        public function tasks_view()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['level'] = $session_data['level'];
            $data['linked_tasks'] = $this->get_tasks($session_data['id']);
            $data['companies'] = $this->get_companies();
            $data['jobs'] = $this->get_jobs();
            $this->load->helper(array('form'));
            $this->load->view('head', $data);
            $this->load->view('header', $data);
            $this->load->view('navigation', $data);
            $this->load->view("task/normal/tasks_view", $data);
            $this->load->view('footer');
        }
        public function task_view($id)
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['level'] = $session_data['level'];
            $data['linked_tasks'] = $this->get_tasks($session_data['id']);
            $data['task'] = $this->get_task($id);
            $data['employees'] = $this->get_employees();
            $this->load->view('head', $data);
            $this->load->view('header', $data);
            $this->load->view('navigation', $data);
            $this->load->view("task/normal/task_view", $data);
            $this->load->view('footer');
        }
        public function add_task_view()
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['level'] = $session_data['level'];
            $data['linked_tasks'] = $this->get_tasks($session_data['id']);
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
                public function get_company() 
        {
            $this->load->model('companies_model','',TRUE);
            
            $data = $this->companies_model->get_current_companies();
            
            return $data;
        }
                public function get_job()
        {
            $this->load->model('jobs_model','',TRUE);
            
            $data = $this->jobs_model->get_current_jobs();
            
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
            
            $this->tasks_model->new_task($data);
            
            redirect('tasks', 'refresh');
        }
        
        public function get_task($id)
        {
            $this->load->model('tasks_model','',TRUE);
            
            $data = $this->tasks_model->get_task($id);
            
            return $data;
        }
        function get_tasks($id)
        {
        $this->load->model('tasks_model','',TRUE);
        $data = $this->tasks_model->get_tasks_emp();
        $linked_tasks_ids = array();
        foreach($data as $task)
        {
            $ids = explode(',', $task->linked_employees);
            array_pop($ids);
            foreach($ids as $ids_single)
            {
                if ($ids_single == $id)
                {
                    $linked_tasks_ids[] = $task->id;
                }
            }
         }


        if (empty($linked_tasks_ids) != True)
        {
        $data = $this->tasks_model->get_tasks_linked($linked_tasks_ids);
        }
        else
        {
            $data = null;
        }
        return $data;
        }
        function send_email() {
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "InternalApp.co.uk";
            $to = "jakea@07heavendesign.co.uk";
            $subject = "PHP Mail Test script";
            $message = "This is a test to check the PHP Mail functionality";
            $headers = "From:" . $from;
            mail($to,$subject,$message, $headers);
            echo "Test email sent";
        }
}