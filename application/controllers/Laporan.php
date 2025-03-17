<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function kas()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Laporan Kas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas_keluar'] = $this->db->get('tbl_kas_masuk')->result_array();
        $this->load->model('Kas_model', 'kas');
        $data['total_masuk'] = $this->kas->total_kas_masuk()->row_array();
        $data['total_keluar'] = $this->kas->total_kas_keluar()->row_array();
        $data['saldo'] = $this->kas->saldo()->row_array();

        $this->form_validation->set_rules('nama_kas_keluar', 'Kas Keluar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('laporan/kas', $data);
        } else {
            $data = [

                'nama_kas' => $this->input->post('nama_kas_keluar'),
                'jenis_kas' => 'keluar',
                'jumlah_kas_keluar' => $this->input->post('jumlah_kas_keluar'),
                'ket_kas' => $this->input->post('ket_kas_keluar'),
                'date_input' => date("Y-m-d\TH:i:s"),

            ];
            $this->db->insert('tbl_kas_masuk', $data);

            $this->session->set_flashdata('message', 'Kas Keluar berhasil ditambah');
            redirect('kas/kas_keluar');
        }
    }

    public function filter_kas($id)
    {
        $data['title'] = 'Filter Kas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($id == 0) {

            $this->db->select('jenis_kas, nama_kas, jumlah_kas, jumlah_kas_keluar, date_input');
            //$this->db->from('data_aset');            

            $this->db->order_by('id', 'DESC');
            $data = $this->db->get('tbl_kas_masuk')->result_array();
        } else {
            $this->db->select('jenis_kas, nama_kas, jumlah_kas, jumlah_kas_keluar, date_input');
            //$this->db->from('data_aset');            

            $this->db->order_by('id', 'DESC');

            $data = $this->db->get_where('tbl_kas_masuk', ['MONTH(date_input)' => $id])->result_array();
        }


        $dt['kas_keluar'] = $data;
        $dt['penghuni'] = $id;
        $this->load->view('laporan/preview_bln', $dt);
    }
}
