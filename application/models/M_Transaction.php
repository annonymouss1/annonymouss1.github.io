<?php
class M_Transaction extends CI_Model{



  function get_schedule($id = null){
    $this->db->select('*');
    $this->db->from('tb_transaksi_pengangkutan');
    $this->db->join('tb_limbah_2','tb_transaksi_pengangkutan.kode_limbah=tb_limbah_2.kode');
    if ($id != null) {
      $this->db->where('id_transaksi',$id);
    }
    $this->db->order_by('tgl_request','ASC');
    $result = $this->db->get();
    return $result;
  }

  function approval($data)
  {
    $this->db->set('status_angkut',$data['status_angkut']);
    $this->db->where('id_transaksi',$data['id_transaksi']);
    $this->db->update('tb_transaksi_pengangkutan');
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

  function add_detail($data)
  {
    $this->db->where('id_transaksi',$data['id_transaksi']);
    $this->db->update('tb_transaksi_pengangkutan',$data);
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    }else{
      return FALSE;
    }
  }

}
