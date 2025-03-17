<?php
class Transaksi_model extends CI_Model
{

    function get_no_invoice()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(no_pesanan,4)) AS kd_max FROM tbl_penjualan WHERE DATE(tgl_pesan)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return "BPJ" . "-" . date('dmy') . $kd;
    }

    function cari_prod($produk)
    {
        $this->db->like('nama_produk', $produk, 'both');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(10);
        return $this->db->get('produk')->result();
    }


    function cari_pel($title)
    {
        $this->db->like('nama', $title, 'both');
        $this->db->order_by('id', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pelanggan')->result();
    }

    public function ambilData()
    {
        $query = "SELECT a.*, b.nama_produk, c.nama, c.alamat, c.no_hp
                  FROM tbl_penjualan as a 
                  LEFT JOIN produk as b ON a.id_produk =  b.id
                  LEFT JOIN pelanggan as c ON a.id_pelanggan =  c.id
                  
                  ORDER BY a.id 
                ";
        return $this->db->query($query)->result_array();
    }

    public function ambilDataId($id)
    {
        $query = "  SELECT a.*, b.nama_produk, c.nama, c.alamat, c.no_hp
                    FROM tbl_penjualan as a 
                    LEFT JOIN produk as b ON a.id_produk =  b.id
                    LEFT JOIN pelanggan as c ON a.id_pelanggan =  c.id
                    
                    ORDER BY a.id 
                ";
        return $this->db->query($query)->get_where('tbl_penjualan', ['id' => $id])->row_array();
    }

    public function get($id = null)
    {
        $this->db->from('stok_in');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getstok_in()
    {
        $query = "SELECT
        stok_in.*,
        nama_produk,
        supplier,
        gudang,
        stok_in
      FROM
        stok_in
        JOIN master_supplier
          ON stok_in.id_supp = master_supplier.id_supp
        JOIN produk
          ON stok_in.kode_produk = produk.kode_produk
        LEFT JOIN gudang
          ON stok_in.id_gud = gudang.id_gud
      ORDER BY stok_in.id DESC
        
      
                ";
        return $this->db->query($query)->result_array();
    }

    public function hapusStokin($stokin_id)
    {
        $this->db->where('id', $stokin_id);
        $this->db->delete('stok_in');
    }

    public function getStokinById($stokin_id)
    {
        return $this->db->get_where('stok_in', ['id' => $stokin_id])->row();
    }


    public function getPenjualanId($id)
    {
        return $this->db->get_where('tbl_penjualan', ['id' => $id])->row_array();
    }

    public function hapusGud($id)
    {
        $this->db->where('id_gud', $id);
        $this->db->delete('gudang');
    }

    public function getGudById($id)
    {
        return $this->db->get_where('gudang', ['id_gud' => $id])->row_array();
    }

    public function hapusSup($id)
    {
        $this->db->where('id_supp', $id);
        $this->db->delete('master_supplier');
    }

    public function getSupById($id)
    {
        return $this->db->get_where('master_supplier', ['id_supp' => $id])->row_array();
    }
}
