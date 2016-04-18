<?php
   class Usermodel extends CI_Model{
   
  function __construct(){
        parent::__construct();
        $this->load->database();



   }
   function u_all(){
       $query = $this ->db->query('select * from tk');
       return $query -> result();


   }
   function u_select($user){
      	$this->db->where('name',$user);
      	$this->db->select('*');
      	$list=$this->db->get('tk');
      	return $list->result();  


   }
      function u_set($user){
      	$this->db->where('uname',$user);
      	$this->db->select('*');
      	$list=$this->db->get('tk');
      	return $list->result();  


   }
   function u_insert($arr){
   		$this->db->insert('tk',$arr);


   }
   function u_delete($yid){
      	$this->db->where('id',$yid);
     	 $this->db->delete('tk');

   }
   function u_update($arr,$name){
 		$this->db->where('name',$name);
 		$this->db->update('tk',$arr);
   }
   
}

?>