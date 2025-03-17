<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model
{

    public function hapusPeng($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengeluaran');
    }

    public function getPengById($id)
    {
        return $this->db->get_where('pengeluaran', ['id' => $id])->row_array();
    }
}
