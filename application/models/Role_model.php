<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{

    public function hapusMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }

    public function getRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }
}
