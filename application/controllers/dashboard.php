<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class Dashboard extends CI_Controller {

function __construct()
{
    parent::__construct();
}

function index()
{
    $this->load->helper('url');
    if($this->session->userdata('logged_in'))
    {
    $session_data = $this->session->userdata('logged_in');
    $session_data1 = $this->session->userdata('first-log');
    $data['log'] = $session_data1['log'];
    $data['username'] = $session_data['username'];
    $data['level'] = $session_data['level'];
    $data['id'] = $session_data['id'];
    $data['linked_tasks']=$this->get_tasks($data['id']);
    $data['ongoing_jobs'] = $this->get_ongoing_jobs();
    $ids = array();
    foreach($data['ongoing_jobs'] as $key)
    {
        $ids[] = $key->id;
    }
    $data['jobs_ammount'] = count($ids);
    if (empty($ids) != true)
    {
        $data['ongoing_jobs_extra'] = $this->get_ongoing_jobs_extra($ids);
    }
    else
    {
        $data['ongoing_jobs_extra'] = null;
    }
    $data['ongoing_issues'] = $this->get_ongoing_issues();
    $data['companies'] = $this->get_companies();
    $data['issues_ammount'] = count($data['ongoing_issues']);
    $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
    $this->load->view('dashboard_view', $data);
    $this->load->view('footer');
    $sess = array('log' => 'false');
    $this->session->set_userdata('first-log', $sess);
    }
    else
    {
    //If no session, redirect to login page
    redirect('login', 'refresh');
    }
}
function logout()
{
    $this->session->unset_userdata('logged_in');

    session_destroy();
    redirect('dashboard', 'refresh');
}
 function get_ongoing_jobs()
 {
    $this->load->model('jobs_model','',TRUE);
    $data = $this->jobs_model->get_current_jobs();
    return $data;
 }
 function  get_ongoing_issues()
 {
     $this->load->model('issues_model','',TRUE);
     $data = $this->issues_model->get_current_issues();
     return $data;
 }
  function  get_companies()
 {
     $this->load->model('companies_model','',TRUE);
     $data = $this->companies_model->get_companies();
     return $data;
 }
  function  get_ongoing_jobs_extra($ids)
 {
     $this->load->model('jobs_model','',TRUE);
     $data = $this->jobs_model->get_ongoing_jobs_extra($ids);
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
}