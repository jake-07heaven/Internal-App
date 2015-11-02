<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class Jobs extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('jobs_model','',TRUE);
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
    $this->update_service_all();
    $data['current_jobs'] = $this->jobs_model->get_current_jobs();
    $data['future_jobs'] = $this->jobs_model->get_future_jobs();
    $data['completed_jobs'] = $this->jobs_model->get_completed_jobs();
    $data['level'] = $session_data['level'];
    $this->load->view('job/job_overview_view', $data);
    }
    else {
      redirect('jobs/job/'.$session_data['id'].'/profile', 'refresh');
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function job($id, $view)
 {
     $session_data = $this->session->userdata('logged_in');
    $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
    $data['job_level'] = $this->jobs_model->get_job_levels($id);
    $data['job_info'] = $this->jobs_model->get_job_info($id);
    $result1 = $this->jobs_model->select_linked_employees($id);
    $result2 = $this->jobs_model->select_linked_jobs($id);
    $result3 = $this->jobs_model->select_linked_companies($id);
    foreach ($result1 as $key) {
      $linked_employees_ids = $key->linked_employees;
    }
    foreach ($result2 as $key) {
      $linked_jobs_ids = $key->linked_jobs;
    }    
    foreach ($result3 as $key) {
      $linked_companies_ids = $key->linked_companies;
    }
    $ids = explode(",",$linked_employees_ids);
    $Jids = explode(",",$linked_jobs_ids);
    $Cids = explode(",", $linked_companies_ids);

      $data['employees_view'] = $this->jobs_model->get_linked_employees($ids);
      $data['jobs_view'] = $this->jobs_model->get_linked_jobs($Jids);
      $data['companies_view'] = $this->jobs_model->get_linked_companies($Cids);
      if(5 == $session_data['level'])
      {
        if($view == "profile")
        {
            $this->load->helper(array('form'));
            $this->load->view('job/job_view_view', $data);
        }
        elseif ($view == "edit") {
          $data['employees'] = $this->jobs_model->get_employees();
          $data['jobs'] = $this->jobs_model->get_jobs();
          $data['companies'] = $this->jobs_model->get_companies();
          $data['services'] = $this->jobs_model->get_services();
          $this->load->helper(array('form'));
          $this->load->view('job/job_edit_view', $data);
        }
        
      }
      else 
      {
          $this->load->helper(array('form'));
        $this->load->view('job/job_view_view', $data);
      }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function addjob()
 {
  $session_data = $this->session->userdata('logged_in');
  $data['employees'] = $this->jobs_model->get_employees();
  $data['jobs'] = $this->jobs_model->get_jobs();
  $data['companies'] = $this->jobs_model->get_companies();
  $data['services'] = $this->jobs_model->get_services();
      $data['level'] = $session_data['level'];
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
      $this->load->helper(array('form'));
      $this->load->view('job/job_add_view', $data);
    }
    else
    {
      redirect('jobs/overview', 'refresh');
    }
  }
 }
 function add_job()
 {
  $data1['name'] = $this->input->post('name');
  $data1['start_date'] = $this->input->post('start_date');
  $data1['deadline_date'] = $this->input->post('deadline_date');
  $data1['price'] = $this->input->post('price');
  $data1['cost'] = $this->input->post('cost');
  $data1['hours'] = $this->input->post('hours');
  $data1['taken'] = $this->input->post('taken');
  $data1['working_on'] = $this->input->post('working_on');
  $data1['status'] = $this->input->post('status');

  $data2['time_estimated'] = $this->input->post('time_estimated');
  $data2['stage'] = $this->input->post('stage');
  $data2['deposit_paid'] = $this->input->post('deposit_paid');
  $data2['desc'] = $this->input->post('desc');
  $data2['linked_jobs'] = $this->input->post('linked_jobs');
  $data2['linked_employees'] = $this->input->post('linked_employees');
  $data2['linked_companies'] = $this->input->post('linked_companies');
  $data2['notes'] = $this->input->post('notes');
  $data2['service'] = $this->input->post('service');
  
  $Cdata = $this->jobs_model->get_company_details($data2['linked_companies']);

  $data1['profit'] = $data1['price'] - $data1['cost'];
  $data2['to_pay'] = $data1['price'] - $data2['deposit_paid'];

  $this->jobs_model->add_job($data1, $data2);

  redirect('jobs/overview', 'refresh');
 }

 function remove_job($id)
 {
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $this->jobs_model->remove_job($id);

  redirect('jobs/overview', 'refresh');
  }
  else 
  {
    redirect('jobs/overview', 'refresh');
  }
  }
  else {
    redirect('jobs/overview', 'refresh');
  }
 }

 function update_job()
 {
  $data['id'] = $this->input->post('id');
  $data1['name'] = $this->input->post('name');
  $data1['start_date'] = $this->input->post('start_date');
  $data1['deadline_date'] = $this->input->post('deadline_date');
  $data1['price'] = $this->input->post('price');
  $data1['cost'] = $this->input->post('cost');
  $data1['hours'] = $this->input->post('hours');
  $data1['taken'] = $this->input->post('taken');
  $data1['working_on'] = $this->input->post('working_on');
  $data1['status'] = $this->input->post('status');

  $data2['time_estimated'] = $this->input->post('time_estimated');
  $data2['stage'] = $this->input->post('stage');
  $data2['deposit_paid'] = $this->input->post('deposit_paid');
  $data2['desc'] = $this->input->post('desc');
  $data2['linked_jobs'] = $this->input->post('linked_jobs');
  $data2['linked_employees'] = $this->input->post('linked_employees');
  $data2['linked_companies'] = $this->input->post('linked_companies');
  $data2['notes'] = $this->input->post('notes');
  $data2['service'] = $this->input->post('service');
 
  $data1['profit'] = $data1['price'] - $data1['cost'];
  $data2['to_pay'] = $data1['price'] - $data2['deposit_paid'];

  $this->jobs_model->update_job($data['id'], $data1, $data2);

  redirect('jobs/overview', 'refresh');
 }
 function update_notes()
 {
    $id = $this->input->post('id');
    $notes = $this->input->post('notes');
    
    $this->jobs_model->update_notes($id, $notes);
    redirect('jobs/job/'.$id.'/profile', 'refresh');
 }
 function update_service_all()
 {
     $this->update_service('marketing');
     $this->update_service('website');
     $this->update_service('e-commerce');
     $this->update_service('design');
     $this->update_service('seo');
     $this->update_service('social');
     $this->update_service('print');
     $this->update_service('email');
     $this->update_service('signage');
     $this->update_service('photography');
     $this->update_service('content');
     $this->update_service('video');
 }
 function update_service($service)
 {
     $raw_potential = $this->jobs_model->get_potential($service);
     
     $raw_ongoing = $this->jobs_model->get_ongoing($service);
     
     $raw_completed = $this->jobs_model->get_completed($service);
     
     $total_potential = 0;
     $total_ongoing = 0;
     $total_completed = 0;
     if ($raw_potential != null) {
         
        foreach ($raw_potential as $key)
        {
            $total_potential += $key->profit;
        }
     
     }
     if ($raw_ongoing != null) {
     foreach ($raw_ongoing as $key)
     {
         $total_ongoing += $key->profit;
     }
     }
     if ($raw_completed != null) {
     foreach ($raw_completed as $key)
     {
         $total_completed += $key->profit;
     }
     }
     $this->load->model('services_model','',TRUE);
     
     $total = $total_ongoing + $total_completed;
     
     $data['money_in'] = $total_completed;
     $data['ongoing'] = $total_ongoing;
     $data['total'] = $total;
     $data['potential'] = $total_potential;
     
     $this->services_model->update_service($service, $data);
 }
}