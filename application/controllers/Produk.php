<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Produk_model');

        $data['produk'] = $this->Produk_model->getProduk();
        $data['kode_produk'] = $this->Produk_model->getNoProduk();
        $data['gudang'] = $this->db->get('gudang')->result_array();
        $data['satuan'] = $this->db->get('satuan_ukur')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();


        $this->form_validation->set_rules('nama_produk', 'Produk', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produk/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'k_prod' => $this->input->post('k_prod'),
                's_prod' => $this->input->post('s_prod'),
                'harga_modal' => $this->input->post('harga_modal'),
                'harga_jual' => $this->input->post('harga_jual'),

            ];

            $data2 = [
                'kode_produk' => $this->input->post('kode_produk'),
                'id_gud' => $this->input->post('id_gud'),
            ];
            $this->db->insert('produk', $data);
            $this->db->insert('stok', $data2);

            $this->session->set_flashdata('message', 'Produk berhasil ditambah');
            redirect('produk');
        }
    }

    public function list_stok()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'List Stok Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Produk_model');

        $data['produk'] = $this->Produk_model->listProduk();
        $data['satuan'] = $this->db->get('satuan_ukur')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();


        $this->form_validation->set_rules('nama_produk', 'Produk', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produk/list_stok', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'nama_produk' => $this->input->post('nama_produk'),
                'k_prod' => $this->input->post('k_prod'),
                's_prod' => $this->input->post('s_prod'),
                'harga_modal' => $this->input->post('harga_modal'),
                'harga_jual' => $this->input->post('harga_jual'),

            ];
            $this->db->insert('produk', $data);

            $this->session->set_flashdata('message', 'Produk berhasil ditambah');
            redirect('produk');
        }
    }


    public function hapusprod($id)
    {
        $this->load->model('Produk_model');
        $this->Produk_model->hapusProd($id);


        $this->session->set_flashdata('message', 'Produk berhasil dihapus!');
        redirect('produk');
    }


    public function getubahprod()
    {
        $this->load->model('Produk_model');

        echo json_encode($this->Produk_model->getProdById($_POST['id']));
    }

    public function ubahprod()
    {
        $data = [

            'nama_produk' => $this->input->post('nama_produk'),
            'k_prod' => $this->input->post('k_prod'),
            's_prod' => $this->input->post('s_prod'),
            'harga_modal' => $this->input->post('harga_modal'),
            'harga_jual' => $this->input->post('harga_jual'),


        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('produk', $data);

        $this->session->set_flashdata('message', 'Produk berhasil diubah!');
        redirect('produk');
    }

    public function satuan()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Satuan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['satuan'] = $this->db->get('satuan_ukur')->result_array();

        $this->form_validation->set_rules('satuan', 'Satuan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produk/satuan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'satuan' => $this->input->post('satuan'),
                'qty' => $this->input->post('qty'),

            ];
            $this->db->insert('satuan_ukur', $data);

            $this->session->set_flashdata('message', 'Satuan berhasil ditambah');
            redirect('produk/satuan');
        }
    }

    public function hapussat($id)
    {
        $this->load->model('Produk_model');
        $this->Produk_model->hapusSat($id);


        $this->session->set_flashdata('message', 'Satuan berhasil dihapus!');
        redirect('produk/satuan');
    }


    public function getubahsat()
    {
        $this->load->model('Produk_model');

        echo json_encode($this->Produk_model->getSatById($_POST['id']));
    }

    public function ubahsat()
    {
        $data = [

            'satuan' => $this->input->post('satuan'),
            'qty' => $this->input->post('qty'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('satuan_ukur', $data);

        $this->session->set_flashdata('message', 'Satuan berhasil diubah!');
        redirect('produk/satuan');
    }

    public function kategori()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Kategori Produk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produk/kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'kategori' => $this->input->post('kategori'),

            ];
            $this->db->insert('kategori', $data);

            $this->session->set_flashdata('message', 'Kategori berhasil ditambah');
            redirect('produk/kategori');
        }
    }

    public function hapuskat($id)
    {
        $this->load->model('Produk_model');
        $this->Produk_model->hapuskat($id);


        $this->session->set_flashdata('message', 'Kategori berhasil dihapus!');
        redirect('produk/kategori');
    }


    public function getubahkat()
    {
        $this->load->model('Produk_model');

        echo json_encode($this->Produk_model->getKatById($_POST['id']));
    }

    public function ubahkat()
    {
        $data = [

            'kategori' => $this->input->post('kategori'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('kategori', $data);

        $this->session->set_flashdata('message', 'Kategori berhasil diubah!');
        redirect('produk/kategori');
    }
}
