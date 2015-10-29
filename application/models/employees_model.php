<?php
Class Employees_model extends CI_Model
{
 function get_employees()
 {
   $query = $this->db->get('employees');
   return $query->result();
 }
 
 function get_current_employees()
 {
   $this->db->select();
   $this->db->from('employees');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
  function get_future_employees()
 {
   $this->db->select();
   $this->db->from('employees');
   $this->db->where('status', 0 );

   $query = $this->db->get();
   return $query->result();
 }
  function get_removed_employees()
 {
   $this->db->select();
   $this->db->from('employees');
   $this->db->where('status', 2 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_employee_info($id)
 {
   $this->db->select();
   $this->db->from('employees_info');
   $this->db->where('id', $id);
   $this->db->limit(1);

   $query = $this->db->get();
   return $query->result();
 }
  function get_employee_levels($id)
 {
   $this->db->select();
   $this->db->from('employees');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function remove_employee($id)
 {
   $this->db->where('id', $id);
   $this->db->delete('employees');

   $this->db->where('id', $id);
   $this->db->delete('employees_info');

   $this->db->where('id', $id);
   $this->db->delete('users'); 

   return TRUE;
 }
 function move_employee($id, $where)
 {
   if($where == '2') {
      $data = array(
         "status" => 2
      );

      $this->db->where('id', $id);
      $this->db->update('employees', $data);
   } else
   {
      $data = array(
         "status" => 1
      );

      $this->db->where('id', $id);
      $this->db->update('employees', $data);
   }
 }
 function get_employee_name($id)
 {
     $this->db->select('name');
     $this->db->from('employees');
     $this->db->where('id', $id);
     
     $query = $this->db->get();
     
     return $query->result();
 }
 function get_hrs()
 {
     $this->db->select('id, name');
     $this->db->from('hrs');
     
     $query = $this->db->get();
     
     return $query->result();
 }
 function hr_data($ids)
 {
   $this->db->select();
   $this->db->from('hrs');
   $this->db->where_in('id', $ids);

   $query = $this->db->get();
   return $query->result();
 }
 function add_employee($data1, $data2)
 {
   $newID = 0;

   $this->db->select('id');
   $this->db->from('employees');
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
      'role' => $data1['role'],
      'name' => $data1['name'],
      'join_date' => $data1['join_date'],
      'salary' => $data1['salary'],
      'print' => $data1['print'],
      'website' => $data1['website'],
      'design' => $data1['design'],
      'marketing' => $data1['marketing'],
      'video' => $data1['video'],
      'seo' => $data1['seo'],
      'social' => $data1['social'],
      'photography' => $data1['photography'],
      'content' => $data1['content'],
      'signage' => $data1['signage'],
      'ecommerce' => $data1['ecommerce'],
      'email' => $data1['email'],
      'status' => $data1['status']
      );

      $Edata2 = array(
      'id' => $newID,
      'email' => $data2['email'],
      'name' => $data1['name'],
      'number' => $data2['number'],
      'address' => $data2['address'],
      'qualifications' => $data2['qualifications'],
      'training' => $data2['training'],
      'books_read' => $data2['books_read'],
      'external_learning' => $data2['external_learning'],
      'holiday_days' => $data2['holiday_days'],
      'holiday_taken' => $data2['holiday_taken'],
      'last_kpi' => $data2['last_kpi'],
      'kpi' => $data2['kpi'],
      'total_kpi' => $data2['total_kpi'],
      'notes' => $data2['notes'],
      'status' => $data1['status']
      );

   $this->db->insert('employees_info', $Edata2);

   $this->db->insert('employees', $Edata1);

   return TRUE;
 }
 function update_employee($data,$data1, $data2)
 {
   $Edata1 = array(
      'role' => $data1['role'],
      'name' => $data1['name'],
      'join_date' => $data1['join_date'],
      'salary' => $data1['salary'],
      'print' => $data1['print'],
      'website' => $data1['website'],
      'design' => $data1['design'],
      'marketing' => $data1['marketing'],
      'video' => $data1['video'],
      'seo' => $data1['seo'],
      'social' => $data1['social'],
      'photography' => $data1['photography'],
      'content' => $data1['content'],
      'signage' => $data1['signage'],
      'ecommerce' => $data1['ecommerce'],
      'email' => $data1['email'],
      'status' => $data1['status']
      );

      $Edata2 = array(
      'email' => $data2['email'],
      'name' => $data1['name'],
      'number' => $data2['number'],
      'address' => $data2['address'],
      'qualifications' => $data2['qualifications'],
      'training' => $data2['training'],
      'books_read' => $data2['books_read'],
      'external_learning' => $data2['external_learning'],
      'holiday_days' => $data2['holiday_days'],
      'holiday_taken' => $data2['holiday_taken'],
      'last_kpi' => $data2['last_kpi'],
      'kpi' => $data2['kpi'],
      'total_kpi' => $data2['total_kpi'],
      'notes' => $data2['notes'],
      'status' => $data1['status']
      );
   $this->db->where('id', $data);
   $this->db->update('employees_info', $Edata2);
   $this->db->where('id', $data);
   $this->db->update('employees', $Edata1);

   return TRUE;
 }
}