<?php

class Fungsi
{

    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }
    public function count_aset()
    {
        $this->ci->load->model('Admin_model');
        return $this->ci->Admin_model->getAll()->num_rows();
    }
}
