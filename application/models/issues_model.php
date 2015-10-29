<?php
Class issues_model extends CI_Model
{
 function get_issues()
 {
   $this->db->select('id');
   $this->db->from('issues');

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
  function get_all_employees_ids()
 {
   $this->db->select();
   $this->db->from('issues');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
  function select_linked_employees($id)
 { 
   $this->db->select('linked_employees');
   $this->db->from('issues_info');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }    
 function select_linked_companies($id)
 { 
   $this->db->select('company');
   $this->db->from('issues');
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
 function get_linked_issues($id)
 { 
   $this->db->select();
   $this->db->from('issues');
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
 function get_current_issues()
 {
   $this->db->select();
   $this->db->from('issues');
   $this->db->where('status', 1 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_completed_issues()
 {
   $this->db->select();
   $this->db->from('issues');
   $this->db->where('status', 2 );

   $query = $this->db->get();
   return $query->result();
 }
  function get_future_issues()
 {
   $this->db->select();
   $this->db->from('issues');
   $this->db->where('status', 0 );

   $query = $this->db->get();
   return $query->result();
 }
 function get_issue_info($id)
 {
   $this->db->select();
   $this->db->from('issues_info');
   $this->db->where('id', $id);
   $this->db->limit(1);

   $query = $this->db->get();
   return $query->result();
 }
  function get_issue_levels($id)
 {
   $this->db->select();
   $this->db->from('issues');
   $this->db->where('id', $id);

   $query = $this->db->get();
   return $query->result();
 }
 function remove_issue($id)
 {
   $this->db->where('id', $id);
   $this->db->delete('issues');

   $this->db->where('id', $id);
   $this->db->delete('issues_info');

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
 function add_issue($data1, $data2)
 {
   $newID = 0;

   $this->db->select('id');
   $this->db->from('issues');
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
      'company' => $data1['company'],
      'date' => $data1['date'],
      'service' => $data1['service'],
      'issue' => $data1['issue'],
      'priority' => $data1['priority'],
      'resolved' => $data1['resolved'],
      'cause' => $data1['cause'],
      'client_feeling' => $data1['client_feeling'],
      'status' => $data1['status']
      );

      $Edata2 = array(
      'id' => $newID,
      'resolved_date' => $data2['resolved_date'],
      'survey_result' => $data2['survey_result'],
      'resolution' => $data2['resolution'],
      'info' => $data2['info'],
      'linked_employees' => $data2['linked_employees'],
      'corrective_action' => $data2['corrective_action'],
      'preventative_action' => $data2['preventative_action']
      );

   $this->db->insert('issues_info', $Edata2);

   $this->db->insert('issues', $Edata1);

   return TRUE;
 }
 function update_issue($data,$data1, $data2)
 {
      $Edata1 = array(
      'id' => $data,
      'company' => $data1['company'],
      'date' => $data1['date'],
      'service' => $data1['service'],
      'issue' => $data1['issue'],
      'priority' => $data1['priority'],
      'resolved' => $data1['resolved'],
      'cause' => $data1['cause'],
      'client_feeling' => $data1['client_feeling'],
      'status' => $data1['status']
      );

      $Edata2 = array(
      'id' => $data,
      'resolved_date' => $data2['resolved_date'],
      'survey_result' => $data2['survey_result'],
      'resolution' => $data2['resolution'],
      'info' => $data2['info'],
      'linked_employees' => $data2['linked_employees'],
      'corrective_action' => $data2['corrective_action'],
      'preventative_action' => $data2['preventative_action']
      );
   $this->db->where('id', $data);
   $this->db->update('issues_info', $Edata2);
   $this->db->where('id', $data);
   $this->db->update('issues', $Edata1);

   return TRUE;
 }
}

