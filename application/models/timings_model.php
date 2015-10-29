<?php
Class timings_model extends CI_Model
{
  function job_ongoing()
 {
      $this->db->select();
   $this->db->from('jobs');
   $this->db->where('status', 1);

   $query = $this->db->get();
   return $query->result();
 }
  function job_completed()
 {
      $this->db->select();
   $this->db->from('jobs');
   $this->db->where('status', 2);

   $query = $this->db->get();
   return $query->result();
 }
  function get_employees()
 {
   $this->db->select();
   $this->db->from('employees_info');
   $this->db->where('status', 1);

   $query = $this->db->get();
   return $query->result();
 }
 function get_timings()
 {
   $this->db->select();
   $this->db->from('timings');
   $this->db->limit(1);

   $query = $this->db->get();
   return $query->result();
 }
 function update_timings_info($data)
 {
      $Edata = array(
      'avg_attendance' => $data['avg_attendance'],
      'avg_lateness' => $data['avg_lateness'],
      'total_holiday_taken' => $data['total_holiday_taken'],
      'total_holiday_left' => $data['total_holiday_left']
      );

   $this->db->where('id', $data);
   $this->db->update('services', $Edata);

   return TRUE;
 }
 function update_timings($data)
 {
     $Edata = array(
        'year_to_date' => $data['year_to_date'],
        'this_month' => $data['this_month'],
        'this_week' => $data['this_week'],
         
        'marketing' => $data['marketing'],
        'website' => $data['website'],
        'print' => $data['print'],
        'seo' => $data['seo'],
        'social' => $data['social'],
        'video' => $data['video'],
        'content' => $data['content'],
        'signage' => $data['signage'],
        'photography' => $data['photography'],
        'email' => $data['email'],
        'ecommerce' => $data['ecommerce']
     );
     $this->db->where('id', 0);
     $this->db->update('timings', $Edata);
 }
 function get_employees_attend()
 {
   $this->db->select('attendance, late, holiday_days, holiday_taken');
   $this->db->from('employees_info');
   $this->db->where('status', 1);

   $query = $this->db->get();
   return $query->result();
 }
 function update_percent($data)
 {
     $this->db->where('id', 0);
     $this->db->update('timings', $data);
 }
}
