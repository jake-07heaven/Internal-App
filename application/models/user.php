<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this->db->select('id, username, password, perm');
   $this->db->from('users');
   $this->db->where('username', $username);
   $this->db->where('password', MD5($password));
   $this->db->limit(1);
 
   $query = $this->db->get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
 function getLastLogin($id)
 {
   $this->db->select('last_login, attend');
   $this->db->from('attendance');
   $this->db->where('id', $id);
 
   $query = $this->db->get();

   return $query->result();
 }
  function get_join_date($id)
 {
   $this->db->select('join_date');
   $this->db->from('employees');
   $this->db->where('id', $id);
 
   $query = $this->db->get();

   return $query->result();
 }
 function setLastLogin($id, $date, $attendance)
 {
    $data = array(
      'last_login' => $date,
      'attend' => $attendance
      );
   $this->db->where('id', $id);
   $this->db->update('attendance', $data);

   return true;
 }
 function getLate($id)
 {
  $this->db->select('late');
  $this->db->from('attendance');
  $this->db->where('id', $id);

  $query = $this->db->get();

  return $query->result();
 }
 function setLate($id, $late)
 {
  $data = array(
    'late' => $late
    );

  $this->db->where('id', $id);
  $this->db->update('attendance', $data);
 }
  function updatePercentage($id, $late, $attend)
 {
  $data = array(
    'late' => $late,
    'attendance' => $attend
    );

  $this->db->where('id', $id);
  $this->db->update('employees_info', $data);
 }
 function getStartDate()
 {
  $this->db->select('start_date');
  $this->db->from('do_not_edit');
  $this->db->where('id', 0);

  $query = $this->db->get();

  return $query->result();
 }
 function setDays($days)
 {
  $data = array(
    'days' => $days
    );

  $this->db->where('id', 0);
  $this->db->update('do_not_edit', $data);
 }
  function getDays()
 {
  $this->db->select('days');
  $this->db->from('do_not_edit');
  $this->db->where('id', 0);

  $query = $this->db->get();

  return $query->result();
 }
}