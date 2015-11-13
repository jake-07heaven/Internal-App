<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class hrs extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('hrs_model','',TRUE);
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
   $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
    if($session_data['level'] == 5)
    {
        $data['username'] = $session_data['username'];
    $data['hr_dis'] = $this->hrs_model->get_discipline();
    $data['hr_gri'] = $this->hrs_model->get_grievance();
         $data['id'] = $session_data['id'];
     $data['linked_tasks']=$this->get_tasks($data['id']);
    $data['level'] = $session_data['level'];
    $this->load->view('hr/hr_overview_view', $data);
    }
    else {
      redirect('dashboard', 'refresh');
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function hr($id, $view)
 {
     $session_data = $this->session->userdata('logged_in');
        $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
      if(5 == $session_data['level'])
      {
        if ($view == "edit") {
          $data['hr'] = $this->hrs_model->get_hr_data($id);
          $data['employees'] = $this->hrs_model->get_employees();
          $this->load->helper(array('form'));
          $this->load->view('hr/hr_edit_view', $data);
        }
      }
      else 
      {
        redirect('dashboard', 'refresh');
      }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function addhr()
 {
  $session_data = $this->session->userdata('logged_in');
  $data['employees'] = $this->hrs_model->get_employees();
     $data['level'] = $session_data['level'];
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
      $this->load->helper(array('form'));
      $this->load->view('hr/hr_add_view', $data);
    }
    else
    {
      redirect('dashboard', 'refresh');
    }
  }
 }
 function add_hr()
 {
  $data1['name'] = $this->input->post('name');
  $data1['date'] = $this->input->post('date');
  $data1['level'] = $this->input->post('level');
  $data1['issue'] = $this->input->post('issue');
  $data1['meeting'] = $this->input->post('meeting');
  $data1['letter'] = $this->input->post('letter');
  $data1['followed_up'] = $this->input->post('followed_up');
  $data1['status'] = $this->input->post('status');
  
  $this->hrs_model->add_hr($data1);

  redirect('hrs/overview', 'refresh');
 }

 function remove_hr($id)
 {
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $this->hrs_model->remove_hr($id);

  redirect('dashboard', 'refresh');
  }
  else 
  {
    redirect('dashboard', 'refresh');
  }
  }
  else {
    redirect('dashboard', 'refresh');
  }
 }

 function update_hr()
 {
  $data['id'] = $this->input->post('id');
  $data1['name'] = $this->input->post('name');
  $data1['date'] = $this->input->post('date');
  $data1['level'] = $this->input->post('level');
  $data1['issue'] = $this->input->post('issue');
  $data1['meeting'] = $this->input->post('meeting');
  $data1['letter'] = $this->input->post('letter');
  $data1['followed_up'] = $this->input->post('followed_up');
  $data1['status'] = $this->input->post('status');

  $this->hrs_model->update_hr($data['id'], $data1);
  
  redirect('dashboard', 'refresh');
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