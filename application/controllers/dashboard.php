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
     $data['ongoing_issues'] = $this->get_ongoing_issues();
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
}