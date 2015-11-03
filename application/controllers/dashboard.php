<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
     $data['username'] = $session_data['username'];
     $data['level'] = $session_data['level'];
     $data['ongoing_jobs'] = $this->get_ongoing_jobs();
     $ids =array();
     foreach($data['ongoing_jobs'] as $key)
     {
         $ids[] = $key->id;
     }
     $data['jobs_ammount'] = count($ids);
     $data['ongoing_jobs_extra'] = $this->get_ongoing_jobs_extra($ids);
     $data['ongoing_issues'] = $this->get_ongoing_issues();
     $data['companies'] = $this->get_companies();
     $data['issues_ammount'] = count($data['ongoing_issues']);
     $this->load->view('dashboard_view', $data);
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
}