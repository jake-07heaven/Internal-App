<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class Timings extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('timings_model','',TRUE);
   $this->load->helper('url');

 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {

   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function overview()
 {
   $session_data = $this->session->userdata('logged_in');
   if($this->session->userdata('logged_in'))
   {
    if($session_data['level'] <= 5)
    {
        $this->update_percentages();
        $data['username'] = $session_data['username'];
    $data['level'] = $session_data['level'];
    $data['timings'] = $this->timings_model->get_timings();
    $data['employees'] = $this->timings_model->get_employees();
    $data['current_jobs'] = $this->timings_model->job_ongoing();
    $data['completed_jobs'] = $this->timings_model->job_completed();
    $this->load->view('time/timings_overview_view', $data);
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function time($id, $view)
 {
     $session_data = $this->session->userdata('logged_in');
     $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
      if(5 >= $session_data['level'])
      {
          $data['timings_info'] = $this->timings_model->get_timings($id);
        if ($view == "edit" && 5 == $session_data['level']) {
          $this->load->helper(array('form'));
          $this->load->view('time/timings_edit_view', $data);
        }
        else
        {
            redirect('services/overview', 'refresh');
        }
        
      }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function update_time()
 {
  $data1['year_to_date'] = $this->input->post('year_to_date');
  $data1['this_month'] = $this->input->post('this_month');
  $data1['this_week'] = $this->input->post('this_week');
  $data1['marketing'] = $this->input->post('marketing');
  $data1['website'] = $this->input->post('website');
  $data1['print'] = $this->input->post('print');
  $data1['seo'] = $this->input->post('seo');
  $data1['social'] = $this->input->post('social');
  $data1['video'] = $this->input->post('video');
  $data1['content'] = $this->input->post('content');
  $data1['signage'] = $this->input->post('signage');
  $data1['photography'] = $this->input->post('photography');
  $data1['email'] = $this->input->post('email');
  $data1['ecommerce'] = $this->input->post('ecommerce');
  

  $this->timings_model->update_timings($data1);

  redirect('timings/overview', 'refresh');
 }
 function update_percentages()
 {
     $raw_data = $this->timings_model->get_employees_attend();
     $attendT = 0;
     $late = 0;
     $hol_left = 0;
     $hol_tak = 0;
     foreach ($raw_data as $key)
     {
         $attend[] = $key->attendance;
         $attendT += $key->attendance;
         $late += $key->late;
         $hol_left += $key->holiday_days;
         $hol_tak += $key->holiday_taken;
     }
     
     $ammount = count($attend);
     $info = array(
         'avg_attendance' => $attendT / $ammount,
         'avg_lateness' => $late / $ammount,
         'total_holiday_left' => $hol_left,
         'total_holiday_taken' => $hol_tak
     );
     
     $this->timings_model->update_percent($info);

 }
}