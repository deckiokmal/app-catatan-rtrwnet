<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_model extends CI_Model
{

  function total_kas_masuk()
  {
    $hsl = $this->db->query("SELECT
        date_input AS tglkas,
        nama_kas,
        SUM(jumlah_kas) AS total
      FROM
        tbl_kas_masuk
      WHERE MONTH(date_input) = MONTH(NOW())
 ");
    return $hsl;
  }

  function total_kas_masuk_filter($id)
  {
    $hsl = $this->db->query("SELECT
        date_input AS tglkas,
        nama_kas,
        SUM(jumlah_kas) AS total
      FROM
        tbl_kas_masuk
      WHERE MONTH(date_input) = $id
 ");
    return $hsl;
  }

  function total_kas_keluar()
  {
    $hsl = $this->db->query("SELECT
        date_input AS tglkas,
        nama_kas,
        SUM(jumlah_kas_keluar) AS total
      FROM
        tbl_kas_masuk
      WHERE MONTH(date_input) = MONTH(NOW())
 ");
    return $hsl;
  }

  function saldo()
  {
    $hsl = $this->db->query("SELECT
        date_input AS tglkas,
        nama_kas,
        SUM(jumlah_kas)-SUM(jumlah_kas_keluar) AS total
      FROM
        tbl_kas_masuk
      WHERE MONTH(date_input) = MONTH(NOW())
 ");
    return $hsl;
  }

  public function hapusKas($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tbl_kas_masuk');
  }

  public function getKasById($id)
  {
    return $this->db->get_where('tbl_kas_masuk', ['id' => $id])->row_array();
  }
  public function kas_masuk()
  {
    $query = "SELECT a.*, b.grup
                  FROM pelanggan as a 
                  LEFT JOIN grup_pelanggan as b ON a.id_grup =  b.id                  
                  
                ";
    return $this->db->query($query)->result_array();
  }

  public function hapusKasKel($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tbl_kas_masuk');
  }

  public function getKasKelById($id)
  {
    return $this->db->get_where('tbl_kas_masuk', ['id' => $id])->row_array();
  }
}
