<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Kas Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas'] = $this->db->order_by('id', 'DESC')->get_where('tbl_kas_masuk', ['jenis_kas' => 'masuk'])->result_array();
        $this->load->model('Kas_model', 'kas');
        $data['total_masuk'] = $this->kas->total_kas_masuk()->row_array();
        $data['total_keluar'] = $this->kas->total_kas_keluar()->row_array();
        $data['saldo'] = $this->kas->saldo()->row_array();
        $this->form_validation->set_rules('nama_kas_masuk', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kas/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'nama_kas' => $this->input->post('nama_kas_masuk'),
                'jenis_kas' => 'masuk',
                'jumlah_kas' => $this->input->post('jumlah_kas_masuk'),
                'ket_kas' => $this->input->post('ket_kas_masuk'),
                'date_input' => date("Y-m-d\TH:i:s"),

            ];
            $this->db->insert('tbl_kas_masuk', $data);

            $this->session->set_flashdata('message', 'Kas Masuk berhasil ditambah');
            redirect('kas');
        }
    }
    public function hapusKas($id)
    {
        $this->load->model('Kas_model');
        $this->Kas_model->hapusKas($id);


        $this->session->set_flashdata('message', 'Kas Masuk berhasil dihapus!');
        redirect('kas');
    }


    public function getubahKas()
    {
        $this->load->model('Kas_model');

        echo json_encode($this->Kas_model->getKasById($_POST['id']));
    }

    public function ubahKas()
    {
        $data = [

            'nama_kas' => $this->input->post('nama_kas_masuk'),
            'jenis_kas' => 'masuk',
            'jumlah_kas' => $this->input->post('jumlah_kas_masuk'),
            'ket_kas' => $this->input->post('ket_kas_masuk'),
            'date_input' => date("Y-m-d\TH:i:s"),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('tbl_kas_masuk', $data);

        $this->session->set_flashdata('message', 'Data berhasil Diubah');
        redirect('kas');
    }

    public function tambahpel()
    {
        $data = [

            'nama' => $this->input->post('nama_m'),
            'no_hp' => $this->input->post('no_hp_m'),
            'alamat' => $this->input->post('alamat_m'),
            'id_grup' => $this->input->post('id_grup_m'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->insert('pelanggan', $data);

        $this->session->set_flashdata('message', 'Pelanggan berhasil ditambah!');
        redirect('transaksi/keranjang');
    }

    public function kas_keluar()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Kas Keluar';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kas_keluar'] = $this->db->order_by('id', 'DESC')->get_where('tbl_kas_masuk', ['jenis_kas' => 'keluar'])->result_array();
        $this->load->model('Kas_model', 'kas');
        $data['total_masuk'] = $this->kas->total_kas_masuk()->row_array();
        $data['total_keluar'] = $this->kas->total_kas_keluar()->row_array();
        $data['saldo'] = $this->kas->saldo()->row_array();
        $this->form_validation->set_rules('nama_kas_keluar', 'Kas Keluar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kas/kas_keluar', $data);
            $this->load->view('templates/footer');
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
    public function hapusKasKel($id)
    {
        $this->load->model('Kas_model');
        $this->Kas_model->hapusKasKel($id);


        $this->session->set_flashdata('message', 'Kas Keluar berhasil dihapus!');
        redirect('kas/kas_keluar');
    }


    public function getubahKasKel()
    {
        $this->load->model('Kas_model');

        echo json_encode($this->Kas_model->getKasKelById($_POST['id']));
    }

    public function ubahKasKel()
    {
        $data = [

            'nama_kas' => $this->input->post('nama_kas_keluar'),
            'jenis_kas' => 'keluar',
            'jumlah_kas_keluar' => $this->input->post('jumlah_kas_keluar'),
            'ket_kas' => $this->input->post('ket_kas_keluar'),
            'date_input' => date("Y-m-d\TH:i:s"),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('tbl_kas_masuk', $data);

        $this->session->set_flashdata('message', 'Data berhasil Diubah');
        redirect('kas/kas_keluar');
    }
}
