<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Menu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'menu' => $this->input->post('menu'),
                'icon_menu' => $this->input->post('icon'),
                'url_menu' => $this->input->post('url_menu'),

            ];
            $this->db->insert('user_menu', $data);

            $this->session->set_flashdata('message', 'Data berhasil Ditambah!');
            redirect('menu');
        }
    }

    public function hapus($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusMenu($id);


        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        redirect('menu');
    }


    public function getubah()
    {
        $this->load->model('Menu_model');

        echo json_encode($this->Menu_model->getMenuById($_POST['id']));
    }

    public function ubah()
    {
        $data = [

            'menu' => $this->input->post('menu'),
            'icon_menu' => $this->input->post('icon'),
            'url_menu' => $this->input->post('url_menu'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('user_menu', $data);

        $this->session->set_flashdata('message', 'Data berhasil Diubah');
        redirect('menu');
    }


    public function submenu()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Submenu Manajemen';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),

                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', 'Submenu berhasil ditambah!');
            redirect('menu/submenu');
        }
    }
    public function hapusSub($id)
    {
        $this->load->model('Menu_model');
        $this->Menu_model->hapusSubMenu($id);


        $this->session->set_flashdata('message', 'Submenu berhasil dihapus!');
        redirect('menu/submenu');
    }


    public function getubahSub()
    {
        $this->load->model('Menu_model');

        echo json_encode($this->Menu_model->getSubMenuById($_POST['id']));
    }

    public function ubahSub()
    {
        $data = [

            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'is_active' => $this->input->post('is_active')

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('user_sub_menu', $data);

        $this->session->set_flashdata('message', 'Submenu berhasil di ubah!');
        redirect('menu/submenu');
    }
}
