<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghuni extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Data Penghuni Perum';
        $data['status_huni'] = $this->db->anggota_enum('penghuni', 'status_huni');
        $data['dihuni'] = $this->db->get_where('penghuni', ['status_huni' => 'dihuni'])->num_rows();
        $data['dikontrakan'] = $this->db->get_where('penghuni', ['status_huni' => 'dikontrakan'])->num_rows();
        $data['tidak_dihuni'] = $this->db->get_where('penghuni', ['status_huni' => 'tidak dihuni'])->num_rows();
        $data['dihuni'] = $this->db->get_where('penghuni', ['status_huni' => 'dihuni'])->num_rows();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Penghuni_model', 'penghuni');
        $data['penghuni'] = $this->penghuni->penghuni();
        $data['kode'] = $this->penghuni->get_kode_penghuni();

        $data['grup'] = $this->db->get('grup_pelanggan')->result_array();

        $this->form_validation->set_rules('nama_warga', 'Nama Warga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('penghuni/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'kode' => $this->input->post('kode'),
                'nama_warga' => $this->input->post('nama_warga'),
                'no_hp' => $this->input->post('no_hp'),
                'blok_perum' => $this->input->post('blok_perum'),
                'status_huni' => $this->input->post('status_huni'),
                'no_kk' => $this->input->post('no_kk'),
                'jml_iuran' => 50000,

            ];

            $data2 = [

                'kode_warga' => $this->input->post('kode'),
                'bulan' => date('n')

            ];
            $this->db->insert('penghuni', $data);
            $this->db->insert('tbl_iuran', $data2);

            $this->session->set_flashdata('message', 'Warga berhasil ditambah');
            redirect('penghuni');
        }
    }



    public function hapuspeng($id)
    {
        $this->load->model('Penghuni_model');
        $this->Penghuni_model->hapusPeng($id);


        $this->session->set_flashdata('message', 'Penghuni berhasil dihapus!');
        redirect('penghuni');
    }


    public function getubahPeng()
    {
        $this->load->model('Penghuni_model');

        echo json_encode($this->Penghuni_model->getPengById($_POST['id']));
    }

    public function ubahPeng()
    {
        $data = [

            'kode' => $this->input->post('kode'),
            'nama_warga' => $this->input->post('nama_warga'),
            'no_hp' => $this->input->post('no_hp'),
            'blok_perum' => $this->input->post('blok_perum'),
            'status_huni' => $this->input->post('status_huni'),
            'no_kk' => $this->input->post('no_kk'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('penghuni', $data);

        $this->session->set_flashdata('message', 'Data berhasil Diubah');
        redirect('penghuni');
    }
}
