<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class Companies extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('companies_model','',TRUE);
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
    $data['current_companies'] = $this->companies_model->get_current_companies();
    $data['future_companies'] = $this->companies_model->get_future_companies();
    $data['level'] = $session_data['level'];     $data['id'] = $session_data['id'];
     $data['linked_tasks']=$this->get_tasks($data['id']);
    
    $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
    $this->load->view('company/company_overview_view', $data);
    }
    else {
      redirect('companies/company/'.$session_data['id'].'/profile', 'refresh');
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function company($id, $view)
 {
     $session_data = $this->session->userdata('logged_in');
     $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
    $data['company_level'] = $this->companies_model->get_company_levels($id);
    $data['company_info'] = $this->companies_model->get_company_info($id);
    $current_company = $this->companies_model->get_company_name($id);
    $raw_jobs = $this->companies_model->get_jobs();
    $raw_issues = $this->companies_model->get_issues();
    $jobs_ids = array();
    $issues_ids = array();
    foreach ($current_company as $key) {
      $current_company_name = $key->name;
    }
    foreach ($raw_jobs as $key) {
      if ($current_company_name == $key->linked_companies)
      {
        $jobs_ids[] = $key->id;
      }
    }
    foreach ($raw_issues as $key) {
      if ($current_company_name == $key->company)
      {
        $issues_ids[] = $key->id;
      }
    }

    if (count($issues_ids) != 0)
    {
      $data['issue_open'] =  $this->companies_model->issue_open($issues_ids);
      $data['issue_closed'] = $this->companies_model->issue_closed($issues_ids);
    }
    else
    {
      $data['issue_open'] =  null;
      $data['issue_closed'] = null;
    }

    if (count($jobs_ids) != 0)
    {
      $data['job_potential'] = $this->companies_model->job_potential($jobs_ids);
      $data['job_ongoing'] = $this->companies_model->job_ongoing($jobs_ids);
      $data['job_completed'] = $this->companies_model->job_completed($jobs_ids);
      
          $totalPotential = 0;
    foreach ($data['job_potential'] as $key)
    {
        $totalPotential += $key->profit;
    }
        $totalprice = 0;
        $totalcost = 0;
        $totalprofit = 0;
    foreach ($data['job_ongoing'] as $key)
    {
        $totalprice += $key->price;
        $totalcost += $key->cost;
        $totalprofit += $key->profit;
    }
    foreach ($data['job_completed'] as $key)
    {
        $totalprice += $key->price;
        $totalcost += $key->cost;
        $totalprofit += $key->profit;
    }
    
    $updateMoney1 = array(
        'cost' => $totalcost,
        'profit' => $totalprofit,
        'potential' => $totalPotential
    );
    $updateMoney2 = array(
        'spend' => $totalprice
    );
    
    $this->companies_model->updateMoney($id, $updateMoney1,$updateMoney2);
    }
    else
    {
      $data['job_potential'] = null;
      $data['job_ongoing'] = null;
      $data['job_completed'] = null;
    }
      if(5 == $session_data['level'])
      {
        if($view == "profile")
        {
            $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
          $this->load->view('company/company_view_view', $data);
        }
        elseif ($view == "edit") {
          $this->load->helper(array('form'));
          $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
          $this->load->view('company/company_edit_view', $data);
        }
        
      }
      else 
      {
          $this->load->view('head', $data);
    $this->load->view('header', $data);
    $this->load->view('navigation', $data);
        $this->load->view('company/company_view_view', $data);
      }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function addcompany()
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
      $this->load->view('company/company_add_view', $data);
    }
    else
    {
      redirect('companies/overview', 'refresh');
    }
  }
 }
 function add_company()
 {
  $data1['name'] = $this->input->post('name');
  $data1['join_date'] = $this->input->post('join_date');
  $data1['number'] = $this->input->post('number');
  $data1['contact'] = $this->input->post('contact');
  $data1['spend'] = $this->input->post('spend');
  $data1['last_contact'] = $this->input->post('last_contact');
  $data1['status'] = $this->input->post('status');

  $data2['email'] = $this->input->post('email');
  $data2['address'] = $this->input->post('address');

  $this->companies_model->add_company($data1, $data2);

  redirect('companies/overview', 'refresh');
 }

 function remove_company($id)
 {
  $session_data = $this->session->userdata('logged_in');
  if($this->session->userdata('logged_in'))
  {
    if($session_data['level'] == 5)
    {
  $this->companies_model->remove_company($id);

  redirect('companies/overview', 'refresh');
  }
  else 
  {
    redirect('companies/overview', 'refresh');
  }
  }
  else {
    redirect('companies/overview', 'refresh');
  }
 }

 function update_company()
 {
  $data['id'] = $this->input->post('id');
  $data1['name'] = $this->input->post('name');
  $data1['join_date'] = $this->input->post('join_date');
  $data1['number'] = $this->input->post('number');
  $data1['contact'] = $this->input->post('contact');
  $data1['spend'] = $this->input->post('spend');
  $data1['happiness'] = $this->input->post('happiness');
  $data1['last_contact'] = $this->input->post('last_contact');
  $data1['status'] = $this->input->post('status');

  $data2['cost'] = $this->input->post('email');
  $data2['profit'] = $this->input->post('number');
  $data2['potential'] = $this->input->post('address');
  $data2['hours'] = $this->input->post('qualifications');
  $data2['refferals'] = $this->input->post('training');
  $data2['success'] = $this->input->post('books_read');
  $data2['amount'] = $this->input->post('external_learning');
  $data2['email'] = $this->input->post('email');
  $data2['address'] = $this->input->post('address');

  $this->companies_model->update_company($data['id'], $data1, $data2);

  redirect('companies/overview', 'refresh');
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