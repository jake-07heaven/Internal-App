<?php

/**
 * Tasks_model
 * 
 * Description...
 * 
 * @package tasks
 * @author jakea <your@email.com>
 * @version 0.0.0
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tasks_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function new_task($data)
    {
        $newID = 0;

        $this->db->select('id');
        $this->db->from('tasks');
        $query = $this->db->get();
        $result = $query->result();

        foreach ($result as $key) {
            if($key->id == $newID)
            {
                $newID += 1;
            }
        }
        $data['id'] = $newID;
        $this->db->insert('tasks', $data);
    }
    public function get_tasks_emp()
    {
        $this->db->select('id, linked_employees');
        $this->db->from('tasks');
        
        $query = $this->db->get();
        
        return $query->result();
    }
    public function get_tasks_linked($ids)
    {
        $this->db->select();
        $this->db->from('tasks');
        $this->db->where_in('id', $ids);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    public function get_task($id)
    {
        $this->db->select();
        $this->db->from('tasks');
        $this->db->where('id', $id);
        
        $query = $this->db->get();
        
        return $query->result();
    }

}

/* End of file tasks_model.php */
/* Location: ./application/models/tasks_model.php */