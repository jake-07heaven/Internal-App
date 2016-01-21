<?php
Class companies_model extends CI_Model
{
 function get_companies()
 {
   $query = $this->db->get('companies');
   return $query->result();
 }
 function get_company_name($id)
 {
   $this->db->select('id, name');
   $this->db->from('companies');
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
  function issue_open($ids)
 {
   $this->db->select();
   $this->db->from('issues');
   $this->db->where_in('id', $ids);
   $this->db->where('status', 1);

   $query = $this->db->get();
   return $query->result();
 }
  function issue_closed($ids)
 {
   $this->db->select();
   $this->db->from('issues');
   $this->db->where_in('id', $ids);
   $this->db->where('status', 2);

   $query = $this->db->get();
   return $query->result();
 }
 function get_jobs()
 {
   $this->db->select('id, linked_companies');
   $this->db->from('jobs_info');

   $query = $this->db->get();
   return $query->result();
 }
  function get_issues()
 {
   $this->db->select('id, company');
   $this->db->from('issues');

   $query = $this->db->get();
   return $query->result();
 }
 function get_current_companies()
 {
   $this->db->select();
   $this->db->from('companies');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
  function get_future_companies()
 {
   $this->db->select();
   $this->db->from('companies');
   $this->db->where('status', 0 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_company_info($id)
 {
   $this->db->select();
   $this->db->from('companies_info');
   $this->db->where('id', $id);
   $this->db->limit(1);

   $query = $this->db->get();
   return $query->result();
 }
  function get_company_levels($id)
 {
   $this->db->select();
   $this->db->from('companies');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function remove_company($id)
 {
   $this->db->where('id', $id);
   $this->db->delete('companies');

   $this->db->where('id', $id);
   $this->db->delete('companies_info');

   return TRUE;
 }
 function add_company($data1, $data2)
 {
   $newID = 0;

   $this->db->select('id');
   $this->db->from('companies');
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
      'comp_id' => $data1['comp_id'],
      'name' => $data1['name'],
      'date_joined' => $data1['join_date'],
      'number' => $data1['number'],
      'status' => $data1['status'],
      'contact' => $data1['contact'],
      'spend' => $data1['spend'],
      'last_contact' => $data1['last_contact']
      );

      $Edata2 = array(
      'id' => $newID,
      'email' => $data2['email'],
      'address' => $data2['address']
      );

   $this->db->insert('companies_info', $Edata2);

   $this->db->insert('companies', $Edata1);

   return TRUE;
 }
 function update_company($data,$data1, $data2)
 {
      $Edata1 = array(
      'id' => $data,
      'comp_id' => $data1['comp_id'],
      'name' => $data1['name'],
      'date_joined' => $data1['join_date'],
      'number' => $data1['number'],
      'contact' => $data1['contact'],
      'spend' => $data1['spend'],
      'happiness' => $data1['happiness'],
      'last_contact' => $data1['last_contact'],
      'status' => $data1['status']
      );

      $Edata2 = array(
      'id' => $data,
      'email' => $data2['email'],
      'address' => $data2['address'],
      'cost' => $data2['cost'],
      'profit' => $data2['profit'],
      'potential' => $data2['potential'],
      'hours' => $data2['hours'],
      'refferals' => $data2['refferals'],
      'success' => $data2['success'],
      'amount' => $data2['amount']
      );
   $this->db->where('id', $data);
   $this->db->update('companies_info', $Edata2);
   $this->db->where('id', $data);
   $this->db->update('companies', $Edata1);

   return TRUE;
 }
  function updateMoney($data,$data1, $data2)
 {
   $this->db->where('id', $data);
   $this->db->update('companies_info', $data1);
   $this->db->where('id', $data);
   $this->db->update('companies', $data2);

   return TRUE;
 }
}