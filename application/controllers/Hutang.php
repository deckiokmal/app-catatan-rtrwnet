<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Hutang_model', 'hutang');
    }

    public function index()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Data Hutang Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('master_supplier')->result_array();


        $data['hutang'] = $this->hutang->getHutang();
        $data['cicil'] = $this->hutang->getCicil();
        $data['total_cicil'] = $this->hutang->getTotalCicilById();



        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('hutang/index', $data);
        } else {
            $data = [

                'nama' => $this->input->post('nama'),
                'id_supp' => $this->input->post('id_supp'),
                'jml_hut' => $this->input->post('jml_hut'),
                'terbayar_hut' => $this->input->post('terbayar_hut'),
                'sisa_hut' => $this->input->post('sisa_hut'),
                'tgl_hut' => date('Y-m-d H:i:s')


            ];


            $this->db->insert('tbl_hutang', $data);


            $this->session->set_flashdata('message', 'berhasil ditambah');
            redirect('hutang');
        }
    }

    public function hapushut($id)
    {

        $this->hutang->hapushut($id);


        $this->session->set_flashdata('message', 'berhasil dihapus!');
        redirect('hutang');
    }


    public function getubahhut()
    {

        echo json_encode($this->hutang->getHutById($_POST['id']));
    }

    public function ubahhut()
    {

        $terbayar = $this->input->post('terbayar');
        $id = ($_POST['id']);

        $sql = "UPDATE tbl_hutang SET terbayar_hut = terbayar_hut + '$terbayar', sisa_hut = sisa_hut - '$terbayar' WHERE id_hut =$id";
        $this->db->query($sql);

        $this->session->set_flashdata('message', 'berhasil diubah!');
        redirect('hutang');
    }

    public function ubahhut2()
    {

        $terbayar = $this->input->post('bayar');
        $id = ($_POST['id']);

        $this->db->where('id_hut', $id);
        $this->db->set('terbayar_hut', 'terbayar_hut +  ' . $terbayar . '');
        $this->db->set('terbayar_hut', 'terbayar_hut - ' . $terbayar . '');
        $this->db->update('tbl_hutang');

        $this->session->set_flashdata('message', 'Satuan berhasil diubah!');
        redirect('hutang');
    }
}
