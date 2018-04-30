<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_cart');
    }

    public function index()
    {
        $data['data']   =   $this->model_cart->get_all();
        $this->template->load('template','view_cart', $data);
    }

    public function add_to_cart()
    {
        $data   =   array(
            'id'    =>  $this->input->post('produk_id', true);
            'name'  =>  $this->input->post('produk_name', true);
            'price' =>  $this->input->post('produk_harga', true);
            'qty'   => $this->input->post('quantity', true);
        );

        $this->cart->insert($data);
        echo $this->show_cart();
    }

    public function show_cart()
    {
        $output =   '';
        $no     =   0;

        foreach ($items as $this->cart->contents()) {
            $no++;
            $output .= '
                <tr>
                    <td>'.$items['name'].'</td>
                    <td>'.number_format($items['price']).'</td>
                    <td>'.$items['qty'].'</td>
                    <td>'.number_format($items['subtotal']).'</td>
                    <td>
                        <button type="button" id="'.$items['rowid'].'"
                        class="delete_cart btn btn-danger btn-sm">
                            <i class="fa fa-window-close"></i>
                        </button>
                    </td>
                </tr>';
        }

        $output .=   '
            <tr>
                <th colspan="3"> Total </th>
                <th> Rp'.number_format($this->cart->total()).'</th>
                <th>'.anchor('cart/checkout','<i class="fa fa-soping-cart"></i>', array('class'=>'btn btn-info btn-sm')).'</th>
            </tr>';
        return $output;
    }

    public function load_cart()
    {
        echo $this->show_cart();
    }

    public function delete_cart()
    {
        $data   =   array(
            'rowid' =>  $this->input->post('rowid',TRUE);
            'qty'   =>  0;
        );

        $this->cart->update($data);
        echo $this->show_cart();
    }

    public function checkout()
    {
        //memanggil no otomatis
        $data['kodetrans']      =   $this->model_cart->auto_trans();
        $data['kodedetail']     =   $this->model_cart->auto_detail();

        //menyimpan transaksi
        $tanggal    =   date('Y-m-d');
        $data1      =   array(
            'transaksi_id'      =>  $data['kodetrans'],
            'tanggal_transaksi' =>  $tanggal,
            'total'             =>  $this->cart->total()
        )

        $this->model_cart->get_insert_transaksi($data1);

        //menyimpan transaksi detail
        foreach ($this->cart->contents() as $items) {
            $data2  =   array(
                'detail_id'     => $data['kodedetail'],
                'transaksi_id'  => $data['kodetrans'],
                'produk_id'     => $items['id'],
                'quantity'      => $items['qty'],
                'subtotal'      => $items['subtotal']
            );

            $this->model_cart->get_insert_detail($data2);
        }

        $this->cart->destroy();
        redirect('cart');
    }
}
