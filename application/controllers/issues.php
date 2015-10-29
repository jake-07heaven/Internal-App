<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class issues extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('issues_model','',TRUE);
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
    $data['current_issues'] = $this->issues_model->get_current_issues();
    $data['future_issues'] = $this->issues_model->get_future_issues();
    $data['completed_issues'] = $this->issues_model->get_completed_issues();
    $data['level'] = $session_data['level'];
    $this->load->view('issue/issue_overview_view', $data);
    }
    else {
      redirect('issues/issue/'.$session_data['id'].'/profile', 'refresh');
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function issue($id, $view)
 {
     $session_data = $this->session->userdata('logged_in');
         $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
    $data['issue_level'] = $this->issues_model->get_issue_levels($id);
    $data['issue_info'] = $this->issues_model->get_issue_info($id);
    $result1 = $this->issues_model->select_linked_employees($id);
    $result3 = $this->issues_model->select_linked_companies($id);
    foreach ($result1 as $key) {
      $linked_employees_ids = $key->linked_employees;
    }
    $ids = explode(",",$linked_employees_ids);

      $data['employees_view'] = $this->issues_model->get_linked_employees($ids);
      if(5 == $session_data['level'])
      {
        if($view == "profile")
        {
          $this->load->view('issue/issue_view_view', $data);
        }
        elseif ($view == "edit") {
          $data['employees'] = $this->issues_model->get_employees();
          $data['companies'] = $this->issues_model->get_companies();
          $this->load->helper(array('form'));
          $this->load->view('issue/issue_edit_view', $data);
        }
        
      }
      else 
      {
        $this->load->view('issue/issue_view_view', $data);
      }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function addissue()
 {
  $session_data = $this->session->userdata('logged_in');
  $data['employees'] = $this->issues_model->get_employees();
  $data['companies'] = $this->issues_model->get_companies();
      $data['level'] = $session_data['level'];
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
      $this->load->helper(array('form'));
      $this->load->view('issue/issue_add_view', $data);
    }
    else
    {
      redirect('issues/overview', 'refresh');
    }
  }
 }
 function add_issue()
 {
  $data1['company'] = $this->input->post('linked_companies');
  $data1['date'] = $this->input->post('date');
  $data1['service'] = $this->input->post('service');
  $data1['issue'] = $this->input->post('issue');
  $data1['priority'] = $this->input->post('priority');
  $data1['resolved'] = $this->input->post('resolved');
  $data1['cause'] = $this->input->post('cause');
  $data1['client_feeling'] = $this->input->post('client_feeling');
  $data1['status'] = $this->input->post('status');

  $data2['resolved_date'] = $this->input->post('resolved_date');
  $data2['resolution'] = $this->input->post('resolution');
  $data2['survey_result'] = $this->input->post('survey_result');
  $data2['info'] = $this->input->post('info');
  $data2['linked_employees'] = $this->input->post('linked_employees');
  $data2['corrective_action'] = $this->input->post('corrective_action');
  $data2['preventative_action'] = $this->input->post('preventative_action');

  $this->issues_model->add_issue($data1, $data2);

  redirect('issues/overview', 'refresh');
 }

 function remove_issue($id)
 {
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $this->issues_model->remove_issue($id);

  redirect('issues/overview', 'refresh');
  }
  else 
  {
    redirect('issues/overview', 'refresh');
  }
  }
  else {
    redirect('issues/overview', 'refresh');
  }
 }

 function update_issue()
 {
  $data['id'] = $this->input->post('id');

  $data1['company'] = $this->input->post('linked_companies');
  $data1['date'] = $this->input->post('date');
  $data1['service'] = $this->input->post('service');
  $data1['issue'] = $this->input->post('issue');
  $data1['priority'] = $this->input->post('priority');
  $data1['resolved'] = $this->input->post('resolved');
  $data1['cause'] = $this->input->post('cause');
  $data1['client_feeling'] = $this->input->post('client_feeling');
  $data1['status'] = $this->input->post('status');

  $data2['resolved_date'] = $this->input->post('resolved_date');
  $data2['resolution'] = $this->input->post('resolution');
  $data2['survey_result'] = $this->input->post('survey_result');
  $data2['info'] = $this->input->post('info');
  $data2['linked_employees'] = $this->input->post('linked_employees');
  $data2['corrective_action'] = $this->input->post('corrective_action');
  $data2['preventative_action'] = $this->input->post('preventative_action');

  $this->issues_model->update_issue($data['id'], $data1, $data2);

  redirect('issues/overview', 'refresh');
 }
 function move_issue_prev($id)
 {
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $data = 2;
  $this->issues_model->move_issue($id, $data);
  redirect('issues/overview', 'refresh');
    }
    else 
    {
      redirect('issues/overview', 'refresh');
    }
  }
  else {
    redirect('issues/overview', 'refresh');
  }
 }
function move_issue_cur($id)
{
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
    $data = 1;
    $this->issues_model->move_issue($id, $data);
    redirect('issues/overview', 'refresh');
      }
    else 
    {
      redirect('issues/overview', 'refresh');
    }
  }
  else {
    redirect('issues/overview', 'refresh');
  }
 }
}