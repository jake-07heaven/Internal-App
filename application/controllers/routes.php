<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
session_start(); //we need to call PHP's session object to access it through CI
class routes extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('routes_model','',TRUE);
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
    $data['route'] = $this->routes_model->get_routes();
    $data['level'] = $session_data['level'];
         $data['id'] = $session_data['id'];
     $data['linked_tasks']=$this->get_tasks($data['id']);
    $this->load->view('route/route_overview_view', $data);
    }
   }
   else
   { 
     redirect('login', 'refresh');
   }
 }
 function edit()
 {
   $session_data = $this->session->userdata('logged_in');
   $data['level'] = $session_data['level'];
   if($this->session->userdata('logged_in'))
   {
        $data['routes'] = $this->routes_model->get_routes();
        $this->load->helper(array('form'));
        $this->load->view('route/route_edit_view', $data);
   }
 }
// function route($id, $view)
// {
//     $session_data = $this->session->userdata('logged_in');
//   if($this->session->userdata('logged_in'))
//   {
//    $data['route_level'] = $this->routes_model->get_route_levels($id);
//    $data['route_info'] = $this->routes_model->get_route_info($id);
//    $result1 = $this->routes_model->select_linked_employees($id);
//    $result2 = $this->routes_model->select_linked_routes($id);
//    $result3 = $this->routes_model->select_linked_companies($id);
//    foreach ($result1 as $key) {
//      $linked_employees_ids = $key->linked_employees;
//    }
//    foreach ($result2 as $key) {
//      $linked_routes_ids = $key->linked_routes;
//    }    
//    foreach ($result3 as $key) {
//      $linked_companies_ids = $key->linked_companies;
//    }
//    $ids = explode(",",$linked_employees_ids);
//    $Jids = explode(",",$linked_routes_ids);
//    $Cids = explode(",", $linked_companies_ids);
//
//      $data['employees_view'] = $this->routes_model->get_linked_employees($ids);
//      $data['routes_view'] = $this->routes_model->get_linked_routes($Jids);
//      $data['companies_view'] = $this->routes_model->get_linked_companies($Cids);
//      if(5 == $session_data['level'])
//      {
//        if($view == "profile")
//        {
//          $this->load->view('route/route_view_view', $data);
//        }
//        elseif ($view == "edit") {
//          $data['employees'] = $this->routes_model->get_employees();
//          $data['routes'] = $this->routes_model->get_routes();
//          $data['companies'] = $this->routes_model->get_companies();
//          $this->load->helper(array('form'));
//          $this->load->view('route/route_edit_view', $data);
//        }
//        
//      }
//      else 
//      {
//        $this->load->view('route/route_view_view', $data);
//      }
//   }
//   else
//   { 
//     redirect('login', 'refresh');
//   }
// }
// function addroute()
// {
//  $session_data = $this->session->userdata('logged_in');
//  $data['employees'] = $this->routes_model->get_employees();
//  $data['routes'] = $this->routes_model->get_routes();
//  $data['companies'] = $this->routes_model->get_companies();
//  if($this->session->userdata('logged_in'))
//  {
//    if($session_data['level'] == 5)
//    {
//      $this->load->helper(array('form'));
//      $this->load->view('route/route_add_view', $data);
//    }
//    else
//    {
//      redirect('routes/overview', 'refresh');
//    }
//  }
// }
// function add_route()
// {
//  $data1['name'] = $this->input->post('name');
//  $data1['start_date'] = $this->input->post('start_date');
//  $data1['deadline_date'] = $this->input->post('deadline_date');
//  $data1['price'] = $this->input->post('price');
//  $data1['cost'] = $this->input->post('cost');
//  $data1['hours'] = $this->input->post('hours');
//  $data1['taken'] = $this->input->post('taken');
//  $data1['working_on'] = $this->input->post('working_on');
//  $data1['status'] = $this->input->post('status');
//
//  $data2['time_estimated'] = $this->input->post('time_estimated');
//  $data2['stage'] = $this->input->post('stage');
//  $data2['deposit_paid'] = $this->input->post('deposit_paid');
//  $data2['desc'] = $this->input->post('desc');
//  $data2['linked_routes'] = $this->input->post('linked_routes');
//  $data2['linked_employees'] = $this->input->post('linked_employees');
//  $data2['linked_companies'] = $this->input->post('linked_companies');
//  $data2['notes'] = $this->input->post('notes');
//
//  $data1['profit'] = $data1['price'] - $data1['cost'];
//  $data2['to_pay'] = $data1['price'] - $data2['deposit_paid'];
//
//  $this->routes_model->add_route($data1, $data2);
//
//  redirect('routes/overview', 'refresh');
// }
//
// function remove_route($id)
// {
//  $session_data = $this->session->userdata('logged_in');
//  if($this->session->userdata('logged_in'))
//  {
//    if($session_data['level'] == 5)
//    {
//  $this->routes_model->remove_route($id);
//
//  redirect('routes/overview', 'refresh');
//  }
//  else 
//  {
//    redirect('routes/overview', 'refresh');
//  }
//  }
//  else {
//    redirect('routes/overview', 'refresh');
//  }
// }

 function update_route()
 {
    $website = array(
        'name' => $this->input->post('0-name'),
        'leads' => $this->input->post('0-leads'),
        'converted' => $this->input->post('0-converted'),
        'profit' => $this->input->post('0-profit'),
        'hours' => $this->input->post('0-hours')
    );
    $seo = array(
        'name' => $this->input->post('1-name'),
        'leads' => $this->input->post('1-leads'),
        'converted' => $this->input->post('1-converted'),
        'profit' => $this->input->post('1-profit'),
        'hours' => $this->input->post('1-hours')
    );
    $refferals = array(
        'name' => $this->input->post('2-name'),
        'leads' => $this->input->post('2-leads'),
        'converted' => $this->input->post('2-converted'),
        'profit' => $this->input->post('2-profit'),
        'hours' => $this->input->post('2-hours')
    );
    $newsletter = array(
        'name' => $this->input->post('3-name'),
        'leads' => $this->input->post('3-leads'),
        'converted' => $this->input->post('3-converted'),
        'profit' => $this->input->post('3-profit'),
        'hours' => $this->input->post('3-hours')
    );
    $social = array(
        'name' => $this->input->post('4-name'),
        'leads' => $this->input->post('4-leads'),
        'converted' => $this->input->post('4-converted'),
        'profit' => $this->input->post('4-profit'),
        'hours' => $this->input->post('4-hours')
    );
    $networking = array(
        'name' => $this->input->post('5-name'),
        'leads' => $this->input->post('5-leads'),
        'converted' => $this->input->post('5-converted'),
        'profit' => $this->input->post('5-profit'),
        'hours' => $this->input->post('5-hours')
    );
    $presentations = array(
        'name' => $this->input->post('6-name'),
        'leads' => $this->input->post('6-leads'),
        'converted' => $this->input->post('6-converted'),
        'profit' => $this->input->post('6-profit'),
        'hours' => $this->input->post('6-hours')
    );
    $e_shots = array(
        'name' => $this->input->post('7-name'),
        'leads' => $this->input->post('7-leads'),
        'converted' => $this->input->post('7-converted'),
        'profit' => $this->input->post('7-profit'),
        'hours' => $this->input->post('7-hours')
    );
    $partners = array(
        'name' => $this->input->post('8-name'),
        'leads' => $this->input->post('8-leads'),
        'converted' => $this->input->post('8-converted'),
        'profit' => $this->input->post('8-profit'),
        'hours' => $this->input->post('8-hours')
    );
    $shop_front = array(
        'name' => $this->input->post('9-name'),
        'leads' => $this->input->post('9-leads'),
        'converted' => $this->input->post('9-converted'),
        'profit' => $this->input->post('9-profit'),
        'hours' => $this->input->post('9-hours')
    );
    $pr = array(
        'name' => $this->input->post('10-name'),
        'leads' => $this->input->post('10-leads'),
        'converted' => $this->input->post('10-converted'),
        'profit' => $this->input->post('10-profit'),
        'hours' => $this->input->post('10-hours')
    );
    $events = array(
        'name' => $this->input->post('11-name'),
        'leads' => $this->input->post('11-leads'),
        'converted' => $this->input->post('11-converted'),
        'profit' => $this->input->post('11-profit'),
        'hours' => $this->input->post('11-hours')
    );
    $hubspot = array(
        'name' => $this->input->post('12-name'),
        'leads' => $this->input->post('12-leads'),
        'converted' => $this->input->post('12-converted'),
        'profit' => $this->input->post('12-profit'),
        'hours' => $this->input->post('12-hours')
    );
    $pph = array(
        'name' => $this->input->post('13-name'),
        'leads' => $this->input->post('13-leads'),
        'converted' => $this->input->post('13-converted'),
        'profit' => $this->input->post('13-profit'),
        'hours' => $this->input->post('13-hours')       
    );
    $this->routes_model->update_route($website, $seo,$refferals,$newsletter,$social,$networking,$presentations,$e_shots,$partners,$shop_front,$pr,$events,$hubspot,$pph);

    redirect('routes/overview', 'refresh');
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