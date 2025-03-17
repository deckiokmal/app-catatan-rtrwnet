<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{

    public function hapusPel($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pelanggan');
    }

    public function getPelById($id)
    {
        return $this->db->get_where('pelanggan', ['id' => $id])->row_array();
    }

    public function pelanggan()
    {
        $query = "SELECT a.*, b.grup, b.harga_b
                  FROM pelanggan as a 
                  LEFT JOIN grup_pelanggan as b ON a.id_grup =  b.id                  
                  
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
