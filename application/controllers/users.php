<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_users');
    }

    public function index(){
      $config['base_url']     = base_url().'users/index/';
      $config['total_rows']   = $this->model_users->tampil_data()->num_rows();
      $config['per_page']     =3;

      $this->pagination->initialize($config);

      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman==''?0:$halaman;
      $data['tampil']     = $this->model_users->tampil_data_paging($halaman,$config['per_page']);
      $this->template->load('template', 'admin/view_lihatusers', $data);
        //$data['tampil']= $this->model_users->tampil_data();
        //$this->load->view('admin/view_lihatusers',$data);
    }

    public function add(){
        if(isset($_POST['submit'])){
            //proses data
            $username   =  $this->input->post('username',true);
            $password   =  $this->input->post('password',true);
            $data       =  array('username'=>$username, password=>md5($password));

            $this->model_users->add_data($data);
            redirect('users');
        }
        else{
            // $this->load->view('admin/view_inputusers');
            $this->template->load('template', 'admin/view_inputusers');
        }
    }

    public function edit(){
        if(isset($_POST['submit'])){
            //proses data
            $id         =   $this->input->post('id',true);
            $username   =   $this->input->post('username',true);
            $password   =   $this->input->post('password',true);

            if(empty($password)){
                $data= array('username' => $username);

            }
            else{
                $data= array('username'=> $username, 'password' => md5($password));
            }

            $this->model_users->edit_data($data,$id);
            redirect('users');
        }
        else{
            $id=$this->uri->segment(3);
            $data['tampil']=$this->model_users->get_one($id)->row_array();
            // $this->load->view('admin/view_editusers',$data);
            $this->template->load('template', 'admin/view_editusers',$data);
        }
    }

    public function delete(){
        $id=$this->uri->segment(3);
        $this->model_users->delete_data($id);
        redirect('users');
    }
}
