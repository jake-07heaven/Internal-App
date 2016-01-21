<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);
class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {      
    $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('dashboard', 'refresh');
   }

 }

 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
        foreach($result as $row)
        {
            $sess_array = array(
                'id' => $row->id,
                'username' => $row->username,
                'level' => $row->perm
            );
            $id = $row->id;
            $this->session->set_userdata('logged_in', $sess_array);
        }
        $attend_data = $this->get_current_attendance($id);
        $current_late = $this->get_current_lateness($id);
        $this->update_attendance($id, $attend_data, $current_late);
        $this->update_days();

        $this->update_percentages($id);
        $sess = array('log' => 'true');
        $this->session->set_userdata('first-log', $sess);
        return TRUE;
      }
      
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }
 function get_current_attendance($id){
    $result = $this->user->getLastLogin($id);
    foreach($result as $row)
    {
        $attendanceData = array(
            'current_date' => date('Y-m-d'),
            'last_login' => $row->last_login,
            'attend' => $row->attend
        );
    }
    
    return $attendanceData;
 }
 function get_current_lateness($id){
    $result = $this->user->getLate($id);
    foreach($result as $row)
    {
        $current_lateness = $row->late;
    }
    
    return $current_lateness;
 }
 function update_percentages($id){
     $attend = $this->get_current_attendance($id);
     $late = $this->get_current_lateness($id);
     $join_date = $this->user->get_join_date($id);
     $date = date('Y-m-d');
     
    foreach($join_date as $row)
    {
        $days_array = array(
        'start_date' => $row->join_date
        );
    }

    $workingDays[] = 1;
    $workingDays[] = 2;
    $workingDays[] = 3;
    $workingDays[] = 4;
    $workingDays[] = 5;
    $holidayDays[] = "";

    $from = new DateTime($days_array['start_date']);
    $to = new DateTime($date);
    $to->modify('+1 day');
    $interval = new DateInterval('P1D');
    $periods = new DatePeriod($from, $interval, $to);

    $days = 0;
    foreach ($periods as $period) {
        if (!in_array($period->format('N'), $workingDays)) continue;
        if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($period->format('*-m-d'), $holidayDays)) continue;
        $days++;
    }
     
     $attendPercent = ($attend['attend'] / $days) * 100;
     $latePercent = ($late / $days) * 100;
     
     $this->user->updatePercentage($id, $latePercent, $attendPercent);
 }
 function update_lateness($id, $current_late){
        $starttime = 85500;
        $time = (int) date('Gis');

        if ($time > $starttime){

          $current_late += 1;

          $this->user->setLate($id, $current_late);

        }
 }
 function update_attendance($id, $attend_data, $current_late){
        if($attend_data['last_login'] != $attend_data['current_date'])
        {
          $new_attend = $attend_data['attend'] + 1;
          $this->update_lateness($id, $current_late);
          $this->user->setLastLogin($id,$attend_data['current_date'],$new_attend);
        }
 }
 function update_days()
 {
    $result = $this->user->getStartDate();
    $date = date('Y-m-d');
    foreach($result as $row)
    {
        $days_array = array(
        'start_date' => $row->start_date
        );
    }

    $workingDays[] = 1;
    $workingDays[] = 2;
    $workingDays[] = 3;
    $workingDays[] = 4;
    $workingDays[] = 5;
    $holidayDays[] = "";

    $from = new DateTime($days_array['start_date']);
    $to = new DateTime($date);
    $to->modify('+1 day');
    $interval = new DateInterval('P1D');
    $periods = new DatePeriod($from, $interval, $to);

    $days = 0;
    foreach ($periods as $period) {
        if (!in_array($period->format('N'), $workingDays)) continue;
        if (in_array($period->format('Y-m-d'), $holidayDays)) continue;
        if (in_array($period->format('*-m-d'), $holidayDays)) continue;
        $days++;
    }

    $this->user->setDays($days);
 }
}