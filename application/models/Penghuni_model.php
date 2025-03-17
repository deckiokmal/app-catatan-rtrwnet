<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghuni_model extends CI_Model
{
    public function get_kode_penghuni()
    {
        $char = "GCP";
        $query = "SELECT max(kode) as maxKode FROM penghuni";
        $data = $this->db->query($query)->row_array();
        $kodeBarang = $data['maxKode'];
        $noUrut = (int) substr($kodeBarang, 4, 4);
        $noUrut++;
        $kodeBarang = $char . sprintf('%05s', $noUrut);
        return $kodeBarang;
    }

    public function hapusPeng($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('penghuni');
    }

    public function getPengById($id)
    {
        return $this->db->get_where('penghuni', ['id' => $id])->row_array();
    }

    public function penghuni()
    {
        $query = "SELECT a.*
                  FROM penghuni as a 
                                 
                  
                ";
        return $this->db->query($query)->result_array();
    }

    public function hapusgrup($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('grup_pelanggan');
    }

    public function getGrupById($id)
    {
        return $this->db->get_where('grup_pelanggan', ['id' => $id])->row_array();
    }
}
