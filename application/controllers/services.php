<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class Services extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('services_model','',TRUE);
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
        $data['username'] = $session_data['username'];
    $data['level'] = $session_data['level'];
         $data['id'] = $session_data['id'];
     $data['linked_tasks']=$this->get_tasks($data['id']);
    $this->load->view('service/services_menu_view', $data);
    }
    else {
      redirect('services/service/'.$session_data['id'].'/profile', 'refresh');
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function service($id, $view)
 {
     $session_data = $this->session->userdata('logged_in');
     $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
      if(5 >= $session_data['level'])
      {
          $data['service_info'] = $this->services_model->get_service($id);
        if($view == "profile")
        {
          
          foreach($data['service_info'] as $key)
          {
              $service = $key->name;
          }
          
            $emp = 'name,'.$service;
            $data['employees'] = $this->services_model->get_employees($emp);
            $current_service = $this->services_model->get_service_name($id);
            $raw_jobs = $this->services_model->get_jobs();
            $jobs_ids = array();
            foreach ($current_service as $key) {
              $current_service_name = $key->name;
            }
            foreach ($raw_jobs as $key) {
              if ($current_service_name == $key->service)
              {
                $jobs_ids[] = $key->id;
              }
            }
            if (count($jobs_ids) != 0)
            {
              $data['job_potential'] = $this->services_model->job_potential($jobs_ids);
              $data['job_ongoing'] = $this->services_model->job_ongoing($jobs_ids);
              $data['job_completed'] = $this->services_model->job_completed($jobs_ids);
            }
            else
            {
              $data['job_potential'] = null;
              $data['job_ongoing'] = null;
              $data['job_completed'] = null;
            }
          $this->load->view('service/service_view_view', $data);
        }
        elseif ($view == "edit" && 5 == $session_data['level']) {
          $this->load->helper(array('form'));
          $this->load->view('service/service_edit_view', $data);
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
 function update_service()
 {
  $data['id'] = $this->input->post('id');
  $data1['name'] = $this->input->post('name');
  $data1['target'] = $this->input->post('target');
  $data1['happiness'] = $this->input->post('happiness');

  $this->services_model->update_service_info($data['id'], $data1);

  redirect('services/overview', 'refresh');
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