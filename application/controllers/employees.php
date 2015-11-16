<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class Employees extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('employees_model','',TRUE);
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
    if($session_data['level'] == 5)
    {
        $data['username'] = $session_data['username'];
    $data['current_employees'] = $this->employees_model->get_current_employees();
    $data['future_employees'] = $this->employees_model->get_future_employees();
    $data['removed_employees'] = $this->employees_model->get_removed_employees();
         $data['id'] = $session_data['id'];
     $data['linked_tasks']=$this->get_tasks($data['id']);
    $data['level'] = $session_data['level'];
    $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
    $this->load->view('employee/employee_overview_view', $data);
    $this->load->view('footer');
    }
    else {
      redirect('employees/employee/'.$session_data['id'].'/profile', 'refresh');
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function employee($id, $view)
 {
  $session_data = $this->session->userdata('logged_in');
   if($this->session->userdata('logged_in'))
   {
    $data['level'] = $session_data['level'];
    $data['employee_level'] = $this->employees_model->get_employee_levels($id);
    $data['employee_info'] = $this->employees_model->get_employee_info($id);
    $current_employee = $this->employees_model->get_employee_name($id);
    $raw_hrs = $this->employees_model->get_hrs();
    $hrs_ids = array();
    foreach ($current_employee as $key) {
      $current_employee_name = $key->name;
    }
    foreach ($raw_hrs as $key) {
      if ($current_employee_name == $key->name)
      {
        $hrs_ids[] = $key->id;
      }
    }
    if (count($hrs_ids) != 0)
    {
      $data['hr_data'] =  $this->employees_model->hr_data($hrs_ids);
    }
    else
    {
      $data['hr_data'] =  null;
    }
    if($id == $session_data['id'] || 5 == $session_data['level'])
    {
      if(5 == $session_data['level'])
      {
        if($view == "profile")
        {
            $this->load->view('head', $data);
            $this->load->view('header', $data);
            $this->load->view('navigation', $data);
            $this->load->view('employee/employee_view_view', $data);
            $this->load->view('footer');
        }
        elseif ($view == "edit") {
          $this->load->helper(array('form'));
          $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
          $this->load->view('employee/employee_edit_view', $data);
          $this->load->view('footer');
        }
        
      }
      else 
      {
          $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
        $this->load->view('employee/employee_view_view', $data);
        $this->load->view('footer');
      }
      
    }
    else
    {
      redirect('employees/employee', 'refresh');
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function addEmployee()
 {
     $session_data = $this->session->userdata('logged_in');
     $data['level'] = $session_data['level'];
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
      $this->load->helper(array('form'));
      $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
      $this->load->view('employee/employee_add_view', $data);
      $this->load->view('footer');
    }
  }
 }
 function add_employee()
 {
  $data1['name'] = $this->input->post('name');
  $data1['role'] = $this->input->post('role');
  $data1['join_date'] = $this->input->post('join_date');
  $data1['salary'] = $this->input->post('salary');
  $data1['print'] = $this->input->post('print');
  $data1['website'] = $this->input->post('website');
  $data1['design'] = $this->input->post('design');
  $data1['marketing'] = $this->input->post('marketing');
  $data1['video'] = $this->input->post('video');
  $data1['seo'] = $this->input->post('seo');
  $data1['social'] = $this->input->post('social');
  $data1['photography'] = $this->input->post('photography');
  $data1['content'] = $this->input->post('content');
  $data1['signage'] = $this->input->post('signage');
  $data1['email'] = $this->input->post('emaill');
  $data1['ecommerce'] = $this->input->post('ecommerce');
  $data1['status'] = $this->input->post('status');
  $data2['email'] = $this->input->post('email');
  $data2['number'] = $this->input->post('number');
  $data2['address'] = $this->input->post('address');
  $data2['qualifications'] = $this->input->post('qualifications');
  $data2['training'] = $this->input->post('training');
  $data2['books_read'] = $this->input->post('books_read');
  $data2['external_learning'] = $this->input->post('external_learning');
  $data2['notes'] = $this->input->post('notes');
  $data2['holiday_days'] = $this->input->post('holiday_days');
  $data2['holiday_taken'] = $this->input->post('holiday_taken');
  $data2['last_kpi'] = $this->input->post('last_kpi');
  $data2['kpi'] = $this->input->post('kpi');
  $data2['total_kpi'] = $this->input->post('total_kpi');

  $this->employees_model->add_employee($data1, $data2);

  redirect('employees/overview', 'refresh');
 }

 function remove_employee($id)
 {
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $this->employees_model->remove_employee($id);

  redirect('employees/overview', 'refresh');
  }
  else 
  {
    redirect('employees/overview', 'refresh');
  }
  }
  else {
    redirect('employees/overview', 'refresh');
  }
 }

 function update_employee()
 {
  $data['id'] = $this->input->post('id');
  $data1['name'] = $this->input->post('name');
  $data1['role'] = $this->input->post('role');
  $data1['join_date'] = $this->input->post('join_date');
  $data1['salary'] = $this->input->post('salary');
  $data1['print'] = $this->input->post('print');
  $data1['website'] = $this->input->post('website');
  $data1['design'] = $this->input->post('design');
  $data1['marketing'] = $this->input->post('marketing');
  $data1['video'] = $this->input->post('video');
  $data1['seo'] = $this->input->post('seo');
  $data1['social'] = $this->input->post('social');
  $data1['photography'] = $this->input->post('photography');
  $data1['content'] = $this->input->post('content');
  $data1['signage'] = $this->input->post('signage');
  $data1['email'] = $this->input->post('emaill');
  $data1['ecommerce'] = $this->input->post('ecommerce');
  $data1['status'] = $this->input->post('status');
  $data2['email'] = $this->input->post('email');
  $data2['number'] = $this->input->post('number');
  $data2['address'] = $this->input->post('address');
  $data2['qualifications'] = $this->input->post('qualifications');
  $data2['training'] = $this->input->post('training');
  $data2['books_read'] = $this->input->post('books_read');
  $data2['external_learning'] = $this->input->post('external_learning');
  $data2['notes'] = $this->input->post('notes');
  $data2['holiday_days'] = $this->input->post('holiday_days');
  $data2['holiday_taken'] = $this->input->post('holiday_taken');
  $data2['last_kpi'] = $this->input->post('last_kpi');
  $data2['kpi'] = $this->input->post('kpi');
  $data2['total_kpi'] = $this->input->post('total_kpi');

  $this->employees_model->update_employee($data['id'], $data1, $data2);

  redirect('employees/overview', 'refresh');
 }
 function move_employee_prev($id)
 {
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $data = 2;
  $this->employees_model->move_employee($id, $data);
  redirect('employees/overview', 'refresh');
    }
  else 
  {
    redirect('employees/overview', 'refresh');
  }
  }
  else {
    redirect('employees/overview', 'refresh');
  }
 }
function move_employee_cur($id)
{
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $data = 1;
  $this->employees_model->move_employee($id, $data);
  redirect('employees/overview', 'refresh');
    }
  else 
  {
    redirect('employees/overview', 'refresh');
  }
  }
  else {
    redirect('employees/overview', 'refresh');
  }
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