<?php
Class services_model extends CI_Model
{
 function get_service_name($id)
 {
   $this->db->select('id, name');
   $this->db->from('services');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function job_potential($ids)
 {
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where_in('id', $ids);
   $this->db->where('status', 0);

   $query = $this->db->get();
   return $query->result();
 }
  function job_ongoing($ids)
 {
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where_in('id', $ids);
   $this->db->where('status', 1);

   $query = $this->db->get();
   return $query->result();
 }
  function job_completed($ids)
 {
      $this->db->select();
   $this->db->from('jobs');
   $this->db->where_in('id', $ids);
   $this->db->where('status', 2);

   $query = $this->db->get();
   return $query->result();
 }
 function get_jobs()
 {
   $this->db->select('id, service');
   $this->db->from('jobs_info');

   $query = $this->db->get();
   return $query->result();
 }
  function get_employees($emp)
 {
   $this->db->select($emp);
   $this->db->from('employees');
   $this->db->where('status', 1);

   $query = $this->db->get();
   return $query->result();
 }
 function get_service($id)
 {
   $this->db->select();
   $this->db->from('services');
   $this->db->where('id', $id);
   $this->db->limit(1);

   $query = $this->db->get();
   return $query->result();
 }
 function update_service_info($data,$data1)
 {
      $Edata1 = array(
      'id' => $data,
      'name' => $data1['name'],
      'target' => $data1['target'],
      'happiness' => $data1['happiness']
      );

   $this->db->where('id', $data);
   $this->db->update('services', $Edata1);

   return TRUE;
 }
 function update_service($service, $data)
 {
     $Edata = array(
        'money_in' => $data['money_in'],
        'ongoing' => $data['ongoing'],
        'total' => $data['total'],
        'potential' => $data['potential']
     );
     $this->db->where('name', $service);
     $this->db->update('services', $Edata);
 }
}
