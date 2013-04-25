<?php  
 class mdin extends CI_Model {
 
 public function insert($data)
 {
 $this->db->insert('de',$data);
 }
 public function listall()
 {
  return $this->db->get('de');
 }
  function delete($user_id)
  {
    $this->db->where('user_id', $user_id);
    $this->db->delete('de'); 
  }
   function get($id)
  {
    return $this->db->get_where('de', array('user_id'=> $id));
  }
   function upup($id, $data)
  {
    $this->db->where('user_id', $id);
     
    unset($data['user_id']);
    $this->db->update('de', $data); 
  }
 
 }









?>