<?php
class Model_produk extends CI_Model {
  var $tabel = 'produk'; //variabel tabel produk
  public function __construct() {
    parent::__construct();
  }

  //fungsi untuk menampilkan semua data dari tabel database
  public function get_all() {
    return $this->db->get($this->tabel);
  }

  public function get_all_paging($halaman,$batas)
  {
    $query= "SELECT * FROM produk limit $halaman,$batas";
    return $this->db->query($query);
  }

  //fungsi insert ke database
  public function get_insert($data){
    $this->db->insert($this->tabel, $data);
    return TRUE;
  }

  //fungsi update ke database
  public function get_update($data,$where){
    $this->db->where($where);
    $this->db->update($this->tabel, $data);
    return TRUE;
  }

  //fungsi delete ke database
  public function get_delete($where){
    $this->db->where($where);
    $this->db->delete($this->tabel);
    return TRUE;
  }
  
  //fungsi untuk menampilkan data per satuan dari tabel database
  public function get_byid($where) {
    $this->db->from($this->tabel);
    $this->db->where($where);
    $query = $this->db->get();
    //cek apakah ada data
    if ($query->num_rows() == 1) {
      return $query->row();
    }
  }
}
