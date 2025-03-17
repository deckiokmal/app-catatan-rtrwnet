<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function getUserAksesById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
    public function getPerusahaanId($id)
    {
        return $this->db->get_where('perusahaan', ['id' => $id])->row_array();
    }

    public function get()
    {
        $query = "SELECT a.*, b.role
                  FROM user as a 
                  LEFT JOIN user_role as b ON a.role_id =  b.id     
                ";
        return $this->db->query($query)->result_array();
    }

    public function hapusUserAkses($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    function hari_ini()
    {
        return $this->db->query(
            "SELECT sum(a.jumlah_jual) as terjual,
            FROM `tbl_penjualan` as a             
            where SUBSTR(a.tgl_pesan, 1,10)=DATE(NOW()) 
            GROUP BY c.id_barang"
        );
    }

    function minggu_ini()
    {
        return $this->db->query("SELECT c.kode_barang, c.nama_barang, sum(a.jumlah_jual) as terjual, b.waktu_proses FROM `mu_transaksi_detail` a JOIN mu_transaksi b ON a.id_transaksi=b.id_transaksi JOIN mu_barang c ON a.id_barang=c.id_barang  where YEARWEEK(b.waktu_proses)=YEARWEEK(NOW()) GROUP BY c.id_barang");
    }

    function bulan_ini()
    {
        return $this->db->query("SELECT sum(a.s_total) as terjual FROM `tbl_penjualan` as a where MONTH(a.tgl_pesan)=MONTH(NOW()) GROUP BY a.tgl_pesan");
    }

    function tahun_ini()
    {
        return $this->db->query("SELECT c.kode_barang, c.nama_barang, sum(a.jumlah_jual) as terjual, b.waktu_proses FROM `mu_transaksi_detail` a JOIN mu_transaksi b ON a.id_transaksi=b.id_transaksi JOIN mu_barang c ON a.id_barang=c.id_barang  where YEAR(b.waktu_proses)=YEAR(NOW()) GROUP BY c.id_barang");
    }

    public function hitungPenghasilan()
    {
        $this->db->select_sum('s_total');
        $query = $this->db->get('tbl_penjualan');
        if ($query->num_rows() > 0) {
            return $query->row()->s_total;
        } else {
            return 0;
        }
    }

    public function user_role($role)
    {
        $query = "SELECT
        `user`.`role_id`,
        `user`.`email`,
        `user_role`.`role`
      FROM
        `user`
        JOIN `user_role`
          ON `user`.`role_id` = `user_role`.`id` 
    WHERE `user`.`role_id` = '$role'
                ";
        return $this->db->query($query)->row_array();
    }
}
