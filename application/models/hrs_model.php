<?php
Class hrs_model extends CI_Model
{
 function get_hrs()
 {
   $this->db->select('name, id');
   $this->db->from('hrs');

   $query = $this->db->get();
   return $query->result();
 }
  function get_all_employees_ids()
 {
   $this->db->select();
   $this->db->from('hrs');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
  function select_linked_employees($id)
 { 
   $this->db->select('linked_employees');
   $this->db->from('hrs_info');
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
 function get_discipline()
 {
   $this->db->select();
   $this->db->from('hrs');
   $this->db->where('status', 0 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_grievance()
 {
   $this->db->select();
   $this->db->from('hrs');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
  function get_future_hrs()
 {
   $this->db->select();
   $this->db->from('hrs');
   $this->db->where('status', 0 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_hr_data($id)
 {
   $this->db->select();
   $this->db->from('hrs');
   $this->db->where('id', $id);
   $this->db->limit(1);

   $query = $this->db->get();
   return $query->result();
 }
 function remove_hr($id)
 {
   $this->db->where('id', $id);
   $this->db->delete('hrs');

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
 function add_hr($data1)
 {
   $newID = 0;

   $this->db->select('id');
   $this->db->from('hrs');
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
      'date' => $data1['date'],
      'level' => $data1['level'],
      'issue' => $data1['issue'],
      'meeting' => $data1['meeting'],
      'letter' => $data1['letter'],
      'followed_up' => $data1['followed_up'],
      'status' => $data1['status']
      );
   
   $this->db->insert('hrs', $Edata1);

   return TRUE;
 }
 function update_hr($data,$data1)
 {
      $Edata1 = array(
      'id' => $data,
      'name' => $data1['name'],
      'date' => $data1['date'],
      'level' => $data1['level'],
      'issue' => $data1['issue'],
      'meeting' => $data1['meeting'],
      'letter' => $data1['letter'],
      'followed_up' => $data1['followed_up'],
      'status' => $data1['status']
      );

   $this->db->where('id', $data);
   $this->db->update('hrs', $Edata1);

   return TRUE;
 }
}

