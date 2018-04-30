<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class upload extends CI_controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('model_upload');
  }

  public function index()
  {
    $this->load->view('upload/upload_view');
  }

  public function add()
  {
    $config['upload_path']   =  './assets/images/';
    $config['allowed_types'] =  'gif|jpg|jpeg|png|bmp|pdf';
    $config['max_size']      =  '2048';
    $config['max_width']     =  '1288';
    $config['max_height']    =  '768';

    $this->upload->initialize($config);
    $this->upload->do_upload('filefoto');
    $prod = $this->upload->data();

    $data = array('nama_file' => $prod['file_name']);
    $this->model_upload->get_insert($data);
  }
}
