<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {

        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Kas_model', 'kas');
        $data['total_masuk'] = $this->kas->total_kas_masuk()->row_array();
        $data['total_keluar'] = $this->kas->total_kas_keluar()->row_array();
        $data['saldo'] = $this->kas->saldo()->row_array();
        $this->db->from('notif');
        $this->db->join('user', 'user.name = notif.create_by');
        $this->db->where('user.name' == 'notif.create_by');
        $query = $this->db->get();
        $data['notif'] = $query;

        $data['selesai'] = $this->db->get_where('laporan', ['status' => 'selesai'])->num_rows();
        $data['dalam_proses'] = $this->db->get_where('laporan', ['status' => 'sedang di proses'])->num_rows();
        $data['belum_proses'] = $this->db->get_where('laporan', ['status' => 'belum di proses'])->num_rows();

        $data['admin'] = $this->db->get_where('user', ['role_id' => '1'])->num_rows();


        // $this->load->model('Admin_model');
        // $data['bulan_ini'] =
        //     $query = $this->Admin_model->bulan_ini();
        // $data = $query->row_array();
        // $data['data'] = $data;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    function laporan_harian()
    {

        $data = $this->model_app->hari_ini();
        $data = array('record' => $data);
        $this->template->load('app/template', 'app/mod_laporan/view_harian', $data);
    }


    public function role()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Role Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'role' => $this->input->post('role'),

            ];
            $this->db->insert('user_role', $data);

            $this->session->set_flashdata('message', 'Role berhasil ditambah!');
            redirect('admin/role');
        }
    }

    public function hapus($id)
    {
        $this->load->model('Role_model');
        $this->Role_model->hapusMenu($id);


        $this->session->set_flashdata('message', 'Role berhasil dihapus!');
        redirect('admin/role');
    }


    public function getubah()
    {
        $this->load->model('Role_model');

        echo json_encode($this->Role_model->getRoleById($_POST['id']));
    }

    public function ubah()
    {
        $data = [

            'role' => $this->input->post('role'),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('user_role', $data);

        $this->session->set_flashdata('message', 'Role berhasil diubah!');
        redirect('admin/role');
    }


    public function roleAccess($role_id)
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Menu Akses';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 0);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);

        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $data['uri'] = $this->uri->segment(1);
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', 'Akses berhasil diubah!');
    }

    public function userAkses()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Data Pengguna';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $data['userakses'] = $this->db->get('user')->result_array();
        $this->load->model('admin_model', 'admin');

        $data['admin'] = $this->admin->get();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/user', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', 'User berhasil ditambah!');

            redirect('admin/userakses');
        }
    }
    public function ubahUser()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
            'role_id' => htmlspecialchars($this->input->post('role_id', true)),

        ];
        $this->db->where('id', ($_POST['id']));
        $this->db->update('user', $data);

        $this->session->set_flashdata('message', 'User berhasil di ubah!');
        redirect('admin/userakses');
    }

    public function getubahUser()
    {
        $this->load->model('Admin_model');

        echo json_encode($this->Admin_model->getUserAksesById($_POST['id']));
    }

    public function hapusUser($id)
    {
        $this->load->model('Admin_model');
        $this->Admin_model->hapusUserAkses($id);


        $this->session->set_flashdata('message', 'User berhasil dihapus!');
        redirect('admin/userakses');
    }

    public function perusahaan()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Perusahaan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perus'] = $this->db->get('perusahaan')->row_array();


        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/perusahaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'no_telepon' => $this->input->post('no_telepon'),
                'alamat' => $this->input->post('alamat'),
                'alamat_lengkap' => $this->input->post('alamat_lengkap'),
                'struk_note' => urldecode($_POST['struk_note']),
            ];

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['logo']['name'];

            if ($upload_image) {
                $sql = "SELECT logo FROM perusahaan WHERE id_perus=1";
                $get_image = $this->db->query($sql)->row_array();
                $config['file_name'] = $get_image['logo'];
                $config['overwrite'] = TRUE; // this will overwrite your image
                $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
                $config['max_size']      = '8000';
                $config['upload_path'] = './assets/img/logo/';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {



                    $new_logo = $this->upload->data('file_name');
                    $this->db->set('logo', $new_logo);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->where('id_perus', $this->input->post('id_perus'));
            $this->db->update('perusahaan', $data);

            $this->session->set_flashdata('message', 'Profile berhasil diubah!');
            redirect('admin/perusahaan');
        }
    }
}
