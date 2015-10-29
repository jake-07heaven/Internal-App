<?php
Class routes_model extends CI_Model
{
 function get_routes()
 {
   $this->db->select();
   $this->db->from('routes');

   $query = $this->db->get();
   return $query->result();
 }
 function update_route($website, $seo,$refferals,$newsletter,$social,$networking,$presentations,$e_shots,$partners,$shop_front,$pr,$events,$hubspot,$pph)
 {
   $this->db->where('id', 0);
   $this->db->update('routes', $website);
      $this->db->where('id', 1);
   $this->db->update('routes', $seo);
      $this->db->where('id', 2);
   $this->db->update('routes', $refferals);
      $this->db->where('id', 3);
   $this->db->update('routes', $newsletter);
      $this->db->where('id', 4);
   $this->db->update('routes', $social);
      $this->db->where('id', 5);
   $this->db->update('routes', $networking);
      $this->db->where('id', 6);
   $this->db->update('routes', $presentations);
      $this->db->where('id', 7);
   $this->db->update('routes', $e_shots);
      $this->db->where('id', 8);
   $this->db->update('routes', $partners);
      $this->db->where('id', 9);
   $this->db->update('routes', $shop_front);
        $this->db->where('id', 10);
   $this->db->update('routes', $pr);
         $this->db->where('id', 11);
   $this->db->update('routes', $events);
         $this->db->where('id', 12);
   $this->db->update('routes', $hubspot);
         $this->db->where('id', 13);
   $this->db->update('routes', $pph);
   
   
   

   return TRUE;
 }
}

