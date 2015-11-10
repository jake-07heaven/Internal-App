<?php
Class jobs_model extends CI_Model
{
 function get_jobs()
 {
   $this->db->select('name, id');
   $this->db->from('jobs');

   $query = $this->db->get();
   return $query->result();
 }
  function get_companies()
 {
   $this->db->select('name, id');
   $this->db->from('companies');

   $query = $this->db->get();
   return $query->result();
 }
   function get_services()
 {
   $this->db->select('name, id');
   $this->db->from('services');

   $query = $this->db->get();
   return $query->result();
 }
 function get_company_details($name)
 {
   $this->db->select('id, contact, number');
   $this->db->from('companies');
   $this->db->where('name', $name);

   $query = $this->db->get();
   return $query->result();
 }
 function get_all_employees_ids()
 {
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
  function select_linked_employees($id)
 { 
   $this->db->select('linked_employees');
   $this->db->from('jobs_info');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }    
 function select_linked_jobs($id)
 { 
   $this->db->select('linked_jobs');
   $this->db->from('jobs_info');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function select_linked_companies($id)
 { 
   $this->db->select('linked_companies');
   $this->db->from('jobs_info');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function get_linked_employees($id)
 { 
   $this->db->select();
   $this->db->from('employees');
   $this->db->where_in('id', $id);

   $query = $this->db->get();
   return $query->result();
 } 
 function get_linked_jobs($id)
 { 
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where_in('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function get_linked_companies($id)
 { 
   $this->db->select();
   $this->db->from('companies');
   $this->db->where_in('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function get_current_jobs()
 {
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_ongoing_jobs_extra($ids)
 {
   $this->db->select();
   $this->db->from('jobs_info');
   $this->db->where_in('id', $ids );

   $query = $this->db->get();
   return $query->result();
 }
 function get_jobs_info()
 {
   $this->db->select();
   $this->db->from('jobs_info');

   $query = $this->db->get();
   return $query->result();
 }
 function get_completed_jobs()
 {
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where('status', 2 );

   $query = $this->db->get();
   return $query->result();
 }
  function get_future_jobs()
 {
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where('status', 0 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_job_info($id)
 {
   $this->db->select();
   $this->db->from('jobs_info');
   $this->db->where('id', $id);
   $this->db->limit(1);

   $query = $this->db->get();
   return $query->result();
 }
  function get_job_levels($id)
 {
   $this->db->select();
   $this->db->from('jobs');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function remove_job($id)
 {
   $this->db->where('id', $id);
   $this->db->delete('jobs');

   $this->db->where('id', $id);
   $this->db->delete('jobs_info');

   return TRUE;
 }
  function get_employees()
 {
   $this->db->select('name, id');
   $this->db->from('employees');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
 function add_job($data1, $data2)
 {
   $newID = 0;

   $this->db->select('id');
   $this->db->from('jobs');
   $query = $this->db->get();
   $result = $query->result();

   foreach ($result as $key) {
      if($key->id == $newID)
      {
         $newID += 1;
      }
   }

   $Edata1 = array(
      'id' => $newID,
      'name' => $data1['name'],
      'start_date' => $data1['start_date'],
      'deadline_date' => $data1['deadline_date'],
      'price' => $data1['price'],
      'cost' => $data1['cost'],
      'hours' => $data1['hours'],
      'taken' => $data1['taken'],
      'working_on' => $data1['working_on'],
      'status' => $data1['status'],
      'profit' => $data1['profit']
      );

      $Edata2 = array(
      'id' => $newID,
      'time_estimated' => $data2['time_estimated'],
      'stage' => $data2['stage'],
      'deposit_paid' => $data2['deposit_paid'],
      'desc' => $data2['desc'],
      'linked_jobs' => $data2['linked_jobs'],
      'linked_employees' => $data2['linked_employees'],
      'linked_companies' => $data2['linked_companies'],
      'notes' => $data2['notes'],
      'to_pay' => $data2['to_pay'],
      'service' => $data2['service']
              
      );

   $this->db->insert('jobs_info', $Edata2);

   $this->db->insert('jobs', $Edata1);

   return TRUE;
 }
 function update_job($data,$data1, $data2)
 {
      $Edata1 = array(
      'id' => $data,
      'name' => $data1['name'],
      'start_date' => $data1['start_date'],
      'deadline_date' => $data1['deadline_date'],
      'price' => $data1['price'],
      'cost' => $data1['cost'],
      'hours' => $data1['hours'],
      'taken' => $data1['taken'],
      'working_on' => $data1['working_on'],
      'status' => $data1['status'],
      'profit' => $data1['profit']
      );

      $Edata2 = array(
      'id' => $data,
      'time_estimated' => $data2['time_estimated'],
      'stage' => $data2['stage'],
      'deposit_paid' => $data2['deposit_paid'],
      'desc' => $data2['desc'],
      'linked_jobs' => $data2['linked_jobs'],
      'linked_employees' => $data2['linked_employees'],
      'linked_companies' => $data2['linked_companies'],
      'notes' => $data2['notes'],
      'to_pay' => $data2['to_pay'],
      'service' => $data2['service']
      );
   $this->db->where('id', $data);
   $this->db->update('jobs_info', $Edata2);
   $this->db->where('id', $data);
   $this->db->update('jobs', $Edata1);

   return TRUE;
 }
 function update_notes($id, $notes)
 {
     $array = array(
         'notes' => $notes
     );
     $this->db->where('id',$id);
     $this->db->update('jobs_info', $array);
 }
 
 function get_potential($service)
 {
     $this->db->select('id');
     $this->db->from('jobs_info');
     $this->db->where('service', $service);
     
     $query = $this->db->get();
     $result = $query->result();
     $ids = array();
   foreach ($result as $key) {
       $ids[] = $key->id;
   }
   if (empty($ids)){
       return null;
   } else {
   $this->db->select('profit');
   $this->db->from('jobs');
   $this->db->where_in('id', $ids);
   $this->db->where('status', 0);
   }
    $query = $this->db->get();
    return $query->result();
     
 }
  function get_ongoing($service)
 {
     $this->db->select('id');
     $this->db->from('jobs_info');
     $this->db->where('service', $service);
     
     $query = $this->db->get();
     $result = $query->result();
     $ids = array();
   foreach ($result as $key) {
       $ids[] = $key->id;
   }
   if (empty($ids)){
       return null;
   } else {
   $this->db->select('profit');
   $this->db->from('jobs');
   $this->db->where('status', 1);
   $this->db->where_in('id', $ids);
   }
   
    $query = $this->db->get();
    return $query->result();
     
 }
  function get_completed($service)
 {
     $this->db->select('id');
     $this->db->from('jobs_info');
     $this->db->where('service', $service);
     
     $query = $this->db->get();
     $result = $query->result();
     $ids = array();
   foreach ($result as $key) {
       $ids[] = $key->id;
   }
   if (empty($ids)){
       return null;
   } else {
   $this->db->select('profit');
   $this->db->from('jobs');
   $this->db->where('status', 2);
   $this->db->where_in('id', $ids);
   }
   
    $query = $this->db->get();
    return $query->result();
     
 }
}

