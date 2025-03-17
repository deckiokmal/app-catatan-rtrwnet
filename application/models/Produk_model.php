<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{

  public function getProduk()
  {
    $query = "SELECT a.*, c.satuan, b.kategori
                  FROM produk as a 
                  LEFT JOIN kategori as b ON a.k_prod =  b.id
                  LEFT JOIN satuan_ukur as c ON a.s_prod =  c.id                  
                  ORDER BY a.id 
                ";
    return $this->db->query($query)->result_array();
  }

  public function getNoProduk()
  {
    $char = "BRG";
    $query = "SELECT max(kode_produk) as maxKode FROM produk";
    $data = $this->db->query($query)->row_array();
    $kodeBarang = $data['maxKode'];
    $noUrut = (int) substr($kodeBarang, 4, 4);
    $noUrut++;
    $kodeBarang = $char . sprintf('%05s', $noUrut);
    return $kodeBarang;
  }

  public function getProdukByno($id)
  {
    return $this->db->get_where('progress', ['id_lap' => $id])->row_array();
  }

  public function listProduk()
  {
    $query = "SELECT
    produk.id,
    produk.kode_produk,
    nama_produk,
    harga_modal,
    harga_jual,
    kategori,
    satuan,
    konversi,
    gudang,
    jml_stok
  FROM
    produk
    JOIN kategori
      ON produk.k_prod = kategori.id
    JOIN satuan_ukur
      ON produk.s_prod = satuan_ukur.id
    LEFT JOIN stok
      ON produk.kode_produk = stok.kode_produk
    LEFT JOIN gudang
      ON stok.id_gud = gudang.id_gud
  ORDER BY gudang
                ";
    return $this->db->query($query)->result_array();
  }

  public function hapusProd($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('produk');
  }

  public function getProdById($id)
  {
    return $this->db->get_where('produk', ['id' => $id])->row_array();
  }

  public function hapusSat($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('satuan_ukur');
  }

  public function getSatById($id)
  {
    return $this->db->get_where('satuan_ukur', ['id' => $id])->row_array();
  }

  public function hapuskat($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('kategori');
  }

  public function getKatById($id)
  {
    return $this->db->get_where('kategori', ['id' => $id])->row_array();
  }

  function update_stok_masuk($data)
  {
    $stok_in = $data['stok'];
    $id = $data['id_prod'];
    $id_gud = $data['id_id_gud'];
    $sql = "UPDATE stok SET jml_stok = jml_stok + '$stok_in' WHERE id_prod ='$id' AND id_gud = '$id_gud'";
    $this->db->query($sql);
  }
}
