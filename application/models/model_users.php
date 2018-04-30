<?php
class Model_users extends CI_Model{

    public function tampil_data(){
        return $this->db->get('users');
    }

    public function get_one($id){
        $data= array('users_id'=>$id);
        return $this->db->get_where('users',$data);
    }

    public function add_data($data){
    	$this->db->insert('users',$data);
    }

    public function edit_data($data,$id){
    	$this->db->where('users_id',$id);
        $this->db->update('users',$data);
    }

    public function delete_data($id){
    	$this->db->where('users_id',$id);
    	$this->db->delete('users');
    }

    public function tampil_data_paging($halaman,$batas)
    {
      $query  = "select * from users limit $halaman,$batas";
      return $this->db->query($query);
    }
}
