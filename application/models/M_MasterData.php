<?php
class M_MasterData extends CI_Model{



  function get_user($id = null){
    $this->db->select('*');
    $this->db->from('tb_user');
    if ($id != null) {
      $this->db->where('id_user',$id);
    }
    $result = $this->db->get();
    return $result;
  }

  function get_transport($id = null){
    $this->db->select('*');
    $this->db->from('tb_transport');
    if ($id != null) {
      $this->db->where('id_transport',$id);
    }
    $this->db->where('status_aktif',1);
    $result = $this->db->get();
    return $result;
  }

  function get_free_transport($id = null){
    $this->db->select('*');
    $this->db->from('tb_transport');
    if ($id != null) {
      $this->db->where('id_transport',$id);
    }
    $this->db->where('status_aktif',1);
    $this->db->where('status_mobil','FREE');
    $this->db->order_by('jenis_mobil','ASC');
    $result = $this->db->get();
    return $result;
  }

  function get_driver($id = null){
    $this->db->select('*');
    $this->db->from('tb_driver');
    if ($id != null) {
      $this->db->where('id_driver',$id);
    }
    $this->db->where('status_aktif',1);
    $result = $this->db->get();
    return $result;
  }

  function get_limbah($id = null){
    $this->db->select('*');
    $this->db->from('tb_limbah_2');
    if ($id != null) {
      $this->db->where('id_limbah',$id);
    }
    $this->db->where('status_aktif',1);
    $result = $this->db->get();
    return $result;
  }

  function get_perusahaan($id = null){
    $this->db->select('*');
    $this->db->from('tb_perusahaan');
    if ($id != null) {
      $this->db->where('id_perusahaan',$id);
    }
    $result = $this->db->get();
    return $result;
  }



  function get_free_driver(){
    $this->db->select('*');
    $this->db->from('tb_driver');
    $this->db->where('status_aktif',1);
    $this->db->where('status_booked !=',1);
    $result = $this->db->get();
    return $result;
  }

  function book_driver($driver)
  {
    $this->db->set('status_booked',1);
    $this->db->where('nik_driver',$driver);
    $this->db->update('tb_driver');
  }
}
