<?php

/**
 *
 */
class Model_cart extends CI_Model
{

    public function get_all()
    {
        $data   =   $this->db->get('produk');
        return $data->result();
    }

    public function get_insert_transaksi($data)
    {
        $this->db->insert('transaksi',$data);
    }

    public function get_insert_detail($data)
    {
        $this->db->insert('transaksi_detail', $data);
    }

    public function auto_trans()
    {
        $this->db->select('Right(transaksi.transaksi_id,3) as kode', false);
        $this->db->order_by('transaksi_id','desc');
        $this->db->limit(1);
        $query  =   $this->db->get('transaksi');
        if($query->num_rows()<>0)
        {
            $data   =   $query->row();
            $kode   =   intval($data->kode)+1;
        }
        else {
            $kode=1;
        }

        $kodemax    =   str_pad($kode,3,"0",str_pad_left);
        $kodetrans  =   "TR".$kodemax;
        return $kodetrans;
    }

    public function auto_detail()
    {
        $this->db->select('Right(transaksi_detail.detail_id,3) as kode', false);
        $this->db->order_by('detail_id','desc');
        $this->db->limit(1);
        $query  =   $this->db->get('transaksi_detail');
        if($query->num_rows()<>0)
        {
            $data   =   $query->row();
            $kode   =   intval($data->kode)+1;
        }
        else {
            $kode=1;
        }

        $kodemax    =   str_pad($kode,3,"0",str_pad_left);
        $kodedetail  =   "DT".$kodemax;
        return $kodedetail;
    }
}
