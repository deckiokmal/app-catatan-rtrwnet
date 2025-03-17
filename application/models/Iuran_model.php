<?php
class iuran_model extends CI_Model
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

    public function bulan()
    {
        $query = "SELECT
        id_bulan,
        nama_bulan,
        status_bayar
      FROM
        tbl_bulan
        LEFT JOIN tbl_iuran
          ON tbl_iuran.bulan = tbl_bulan.id_bulan
      ORDER BY id_bulan
                                 
                  
                ";
        return $this->db->query($query)->result_array();
    }

    public function getBayar($id)
    {
        return $this->db->get_where('tbl_iuran', ['id_iuran' => $id])->row_array();
    }
}
