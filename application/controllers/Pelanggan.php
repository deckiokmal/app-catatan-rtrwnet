<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['perus'] = $this->db->get('perusahaan')->row_array();
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Data Pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Pelanggan_model', 'pelanggan');
        $data['pelanggan'] = $this->pelanggan->pelanggan();

        $data['grup'] = $this->db->get('grup_pelanggan')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pelanggan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'nama' => $this->input->post('nama'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
				'ip_address' => $this->input->post('ip_address'),
				'jn_akses' => $this->input->post('jn_akses'),
                'id_grup' => $this->input->post('id_grup'),

            ];
            $this->db->insert('pelanggan', $data);

            // $this->db->select('id');
            // $this->db->from('pelanggan');
            // $this->db->order_by('id', 'DESC');
            // $this->db->limit(1);
            // $ds = $this->db->get()->result_array();
            // $id_pel = $ds['id'];

            //  //variabel untuk menampung inputan dari form
            //  $bulanIndo = array(
            //     '01' => 'Januari',
            //     '02' => 'Februari',
            //     '03' => 'Maret',
            //     '04' => 'April',
            //     '05' => 'Mei',
            //     '06' => 'Juni',
            //     '07' => 'Juli',
            //     '08' => 'Agustus',
            //     '09' => 'September',
            //     '10' => 'Oktober',
            //     '11' => 'November',
            //     '12' => 'Desember'
            // );
            // $awaltempo = 2020-01-10;

            // for ($i = 0; $i < 12; $i++) {
            //     //membuat tanggal jatuh tempo nya setiap tanggal 10
            //     $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

            //     $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))] . " " . date('Y', strtotime($jatuhtempo));
            //     $data2 = [
            //         'id_pel' => $id_pel,
            //         'bandw' => $this->input->post('bandw'),
            //         'jatuhtempo' => $jatuhtempo,
            //         'bulan' => $bulan,
            //         'jumlah' => $this->input->post('harga_b'),
            //         'id_create' => $this->input->post('id_create'),

            //     ];

            //     $this->db->insert('tbl_iuran', $data2);

            $this->session->set_flashdata('message', 'Pelanggan berhasil ditambah');
            redirect('pelanggan');
        }
    }

    public function hapuspel($id)
    {
        $this->load->model('Pelanggan_model');
        $this->Pelanggan_model->hapusPel($id);


        $this->session->set_flashdata('message', 'Pelanggan berhasil dihapus!');
        redirect('pelanggan');
    }


    public function getubahPel()
    {
        $this->load->model('Pelanggan_model');

        echo json_encode($this->Pelanggan_model->getPelById($_POST['id']));
    }

    public function ubahPel()
    {
        $data = [

            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
			'ip_address' => $this->input->post('ip_address'),
			'jn_akses' => $this->input->post('jn_akses'),
            'id_grup' => $this->input->post('id_grup'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('pelanggan', $data);

        $this->session->set_flashdata('message', 'Data berhasil Diubah');
        redirect('pelanggan');
    }

    public function tambahpel()
    {
        $data = [

            'nama' => $this->input->post('nama_m'),
            'no_hp' => $this->input->post('no_hp_m'),
            'alamat' => $this->input->post('alamat_m'),
			'ip_address' => $this->input->post('ip_address_m'),
			'jn_akses' => $this->input->post('jn_akses_m'),
            'id_grup' => $this->input->post('id_grup_m'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->insert('pelanggan', $data);

        $this->session->set_flashdata('message', 'Pelanggan berhasil ditambah!');
        redirect('transaksi/keranjang');
    }

    public function grup()
    {
        $data['perus'] = $this->db->get('perusahaan')->row_array();
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Grup pelanggan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['grup'] = $this->db->get('grup_pelanggan')->result_array();

        $this->form_validation->set_rules('grup', 'Grup Pelanggan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pelanggan/grup', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'grup' => $this->input->post('grup'),
                'harga_b' => $this->input->post('harga_b'),

            ];
            $this->db->insert('grup_pelanggan', $data);

            $this->session->set_flashdata('message', 'Jasa Layanan berhasil ditambah');
            redirect('pelanggan/grup');
        }
    }
    public function hapusgrup($id)
    {
        $this->load->model('Pelanggan_model');
        $this->Pelanggan_model->hapusgrup($id);


        $this->session->set_flashdata('message', 'Jasa Layanan berhasil dihapus!');
        redirect('pelanggan/grup');
    }


    public function getubahgrup()
    {
        $this->load->model('Pelanggan_model');

        echo json_encode($this->Pelanggan_model->getGrupById($_POST['id']));
    }

    public function ubahgrup()
    {
        $data = [

            'grup' => $this->input->post('grup'),
            'harga_b' => $this->input->post('harga_b'),


        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('grup_pelanggan', $data);

        $this->session->set_flashdata('message', 'Data berhasil Diubah');
        redirect('pelanggan/grup');
    }
}
