<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang_model extends CI_Model
{

  public function getHutang()
  {
    $query = "
        SELECT
          tbl_hutang.*,
          master_supplier.supplier
        FROM
          `tbl_hutang`
          JOIN `master_supplier`
            ON `tbl_hutang`.`id_supp` = `master_supplier`.`id_supp`
          ORDER BY id_hut DESC
                ";
    return $this->db->query($query)->result_array();
  }
  public function getCicil()
  {
    $query = "
        
        SELECT
        tgl_cicil,
        tbl_cicil_hut.*,
        `tbl_hutang`.`id_supp`,
        master_supplier.supplier,
        jml_cicil
      FROM
        `tbl_cicil_hut`
        JOIN `tbl_hutang`
          ON `tbl_hutang`.`id_hut` = `tbl_cicil_hut`.`id_hut`
        JOIN `master_supplier`
          ON `tbl_hutang`.`id_supp` = `master_supplier`.`id_supp`
      GROUP BY tgl_cicil
      ORDER BY tgl_cicil DESC
                ";
    return $this->db->query($query)->result_array();
  }

  public function getTotalCicilById()
  {
    $query = "
        
        SELECT
  tgl_cicil,
  no_pesanan,
  SUM(jml_cicil) AS totalcicil
FROM
  `tbl_cicil_hut`
  JOIN tbl_hutang
    ON tbl_cicil_hut.id_hut = tbl_hutang.`id_hut`
WHERE tbl_cicil_hut.id_hut = tbl_hutang.`id_hut`
                ";
    return $query;
  }

  public function hapushut($id)
  {
    $this->db->where('id_hut', $id);
    $this->db->delete('tbl_hutang');
  }

  public function getHutById($id)
  {
    return $this->db->get_where('tbl_hutang', ['id_hut' => $id])->row_array();
  }
}
