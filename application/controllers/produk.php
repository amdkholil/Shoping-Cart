<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller
{

   public function __construct() {
       parent::__construct();
       $this->load->model('model_produk');
   }

   public function index()
   {
      $batas =3;
      $config['base_url']   = base_url().'/produk/index/';
      $config['total_rows'] = $this->model_produk->get_all()->num_rows();
      $config['per_page']   = $batas;

      $this->pagination->initialize($config);

      $data['paging']     = $this->pagination->create_links();
      $halaman            = $this->uri->segment(3);
      $halaman            = $halaman==''?0:$halaman;
      $data['query']      = $this->model_produk->get_all_paging($halaman,$batas);
      $this->template->load('template','admin/view_lihatproduk',$data);

      //Pengambilan data sebelum pagination
      //$data['query'] = $this->model_produk->get_all();
      //$this->load->view('admin/view_lihatproduk',$data);
   }

   public function add() {
       //$this->load->view('admin/fupload',$data);
       $this->template->load('template','admin/view_inputproduk');
   }

   public function insert(){
       $nmfile = "file_".time();  //nama file saya beri nama langsung dan diikuti fungsi time
       $config['upload_path'] = './assets/images/'; //path folder
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
       $config['max_size'] = '2048'; //maksimum besar file 2M
       $config['max_width']  = '1288'; //lebar maksimum 1288 px
       $config['max_height']  = '768'; //tinggi maksimum 768 px
       $config['file_name'] = $nmfile; //nama yang terupload nantinya

       $this->upload->initialize($config);
       $foto= $_FILES['filefoto']['name'];
       var_dump($foto);
       if($_FILES['filefoto']['name'])
       {
           if ($this->upload->do_upload('filefoto'))
           {
               $prod = $this->upload->data();
               $data = array(
                 'produk_nama'  =>$this->input->post('nama'),
                 'produk_harga' =>$this->input->post('harga'),
                 'produk_image' =>$prod['file_name']
               );

               $this->model_produk->get_insert($data); //akses model untuk menyimpan ke database
               //pesan yang muncul jika berhasil diupload pada session flashdata
               $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\">Upload gambar berhasil !!</div>");
               redirect('produk'); //jika berhasil maka akan ditampilkan view vupload
           }else{
               //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
               $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div>");
               redirect('produk/add'); //jika gagal maka akan ditampilkan form upload
           }
       }
   }

   /* untuk menangani edit gambar */
   public function edit(){
      //$data['title']='Form Edit Produk';
      $idprod=$this->input->get('idprod'); //mengambil variabel get idprod dari url
      $where=array('produk_id'=>$idprod); //array where query untuk menampilkan gambar per id
      $data['row'] = $this->model_produk->get_byid($where);   //query dari model ambil per id

      //utk form edit nya, saya tambahkan sebuah view bernama feupload.php
      //$this->load->view('admin/feupload',$data);
      $this->template->load('template','admin/view_editproduk',$data);

   }

   //untuk menangani proses upload gambar yang di edit
   public function update(){

      //$this->load->library('upload');// library dapat di load di fungsi , di autoload atau di construc nya tinggal pilih salah satunya
      $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
      $path   = './assets/images/'; //path folder
      $config['upload_path']   = $path; //variabel path untuk config upload
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['max_size']      = '2048'; //maksimum besar file 2M
      $config['max_width']     = '1288'; //lebar maksimum 1288 px
      $config['max_height']    = '768'; //tinggi maksimu 768 px
      $config['file_name']     = $nmfile; //nama yang terupload nantinya

      $this->upload->initialize($config);

      $idprod     = $this->input->post('kode'); /* variabel id gambar */
      $filelama   = $this->input->post('filelama'); /* variabel file gambar lama */

      if($_FILES['filefoto']['name'])
      {
          if ($this->upload->do_upload('filefoto'))
          {
              $prod = $this->upload->data();
              $data = array(
                 'produk_nama'  =>$this->input->post('nama'),
                 'produk_harga'   =>$this->input->post('harga'),
                 'produk_image' =>$prod['file_name']

              );

              @unlink($path.$filelama);//menghapus gambar lama, variabel dibawa dari form

              $where =array('produk_id'=>$idprod); //array where query sebagai identitas pada saat query dijalankan
              $this->model_produk->get_update($data,$where); //akses model untuk menyimpan ke database

              $this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" produk_id=\"alert\">Edit dan Upload produk berhasil !!</div>"); //pesan yang muncul jika berhasil diupload pada session flashdata
              redirect('produk'); //jika berhasil maka akan ditampilkan view vupload

          }else{  /* jika upload gambar gagal maka akan menjalankan skrip ini */
              $er_upload=$this->upload->display_errors(); /* untuk melihat error uploadnya apa */
              //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
              $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" produk_id=\"alert\">Gagal edit dan produk gambar !! ".$er_upload."</div>");
              redirect('produk/edit'); //jika gagal maka akan ditampilkan form upload
          }
      }else{ /* jika file foto tidak ada maka query yg dijalankan adalah skrip ini  */

          $data = array(
             'produk_nama'  =>$this->input->post('nama'),
             'produk_harga' =>$this->input->post('harga')

          );

          $where =array('produk_id'=>$idprod); //array where query sebagai identitas pada saat query dijalankan
          $this->model_produk->get_update($data,$where); //akses model untuk menyimpan ke database

          $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" produk_id=\"alert\">Berhasil edit, Gambar tidak ada yang diupload !!</div>");
          redirect('produk'); /* jika berhasil maka akan kembali ke home upload */
      }
   }

   /* fungsi untuk menangani proses hapus */
   public function hapus(){
      /* variabel di deklarasikan */

      $idprod=$this->input->get('idprod'); //mengambil variabel get idprod dari url
      /* query menampilkan gambar dibuat dulu agar gambarnya dihapus sebelum dihapus dari database */
      $path   = './assets/images/';
      $ardel  = array('produk_id'=>$idprod);
      $rowdel = $this->model_produk->get_byid($ardel);

      /* file gambar dihapus dari folder */
      @unlink($path.$rowdel->nm_prod);

      /* query hapus dilanjutkan ke model get_delete */
      $this->model_produk->get_delete($ardel); //karna array where querynya sama, maka saya langsung include saja $ardel

      $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\">Berhasil hapus data produk dan file gambar dari folder !!</div>");
      redirect('produk'); /* jika berhasil maka akan kembali ke home upload */
   }

}

/* End of file upload.php */
/* Location: ./application/controllers/upload.php */
