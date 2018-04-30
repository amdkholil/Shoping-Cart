<?php
/**
 *
 */
class Model_upload extends CI_Model
{

  public function get_insert($data)
  {
    $this->db->insert('tbl_upload',$data);
  }
}
