<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iuran extends CI_Controller
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
        $data['title'] = 'Data Pembayaran iuran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bulan'] = $this->db->get('tbl_iuran')->result_array();
        $this->load->model('admin_model', 'admin');
        $this->load->model('iuran_model', 'iuran');
        $this->load->model('Pelanggan_model', 'pelanggan');
        $data['pelanggan'] = $this->pelanggan->pelanggan();

        $role = $this->session->userdata('role_id');

        $data['user_akses'] = $this->admin->user_role($role);
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);

            $this->load->view('iuran/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'no_hp' => $this->input->post('no_hp'),
            ];

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png|gif|bmp';
                $config['max_size']      = '8000';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user', $data);

            $this->session->set_flashdata('message', 'Profile berhasil diubah!');
            redirect('user/edit');
        }
    }

    function penghuni()
    {
        $return_arr = array();
        $row_array = array();
        $text = $this->input->get('text');
        $barang =
            $this->db->select("*")
            ->from("pelanggan")
            ->like("nama", $text)
            ->get();
        if ($barang->num_rows() > 0) {

            foreach ($barang->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['text'] = utf8_encode("$row[nama]");
                array_push($return_arr, $row_array);
            }
        }

        echo json_encode(array("results" => $return_arr));
    }

    function get_penghuni()
    {
        $id = $this->input->get('id');

        $info = $this->db->select("a.*")
            ->from("penghuni as a")
            ->where("a.id", $id)
            ->get()
            ->row_array();
        echo json_encode($info);
    }

    function pelanggan()
    {
        $return_arr = array();
        $row_array = array();
        $text = $this->input->get('text');
        $barang =
            $this->db->select("*")
            ->from("pelanggan")
            ->like("nama", $text)
            ->get();
        if ($barang->num_rows() > 0) {

            foreach ($barang->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['text'] = utf8_encode("$row[nama]");
                array_push($return_arr, $row_array);
            }
        }

        echo json_encode(array("results" => $return_arr));
    }

    function get_pelanggan()
    {
        $id = $this->input->get('id');

        $info = $this->db->select("a.*, b.grup, b.harga_b")
            ->from("pelanggan as a")
            ->join("grup_pelanggan as b", "a.id_grup = b.id", "left")
            ->where("a.id", $id)
            ->get()
            ->row_array();
        echo json_encode($info);
    }


    public function bulan_ini()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Rekap Bulanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('admin_model', 'admin');

        $role = $this->session->userdata('role_id');
        $data['user_akses'] = $this->admin->user_role($role);
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);

            $this->load->view('iuran/bulan', $data);
        }
    }



    public function filter($id)
    {
        $data['title'] = 'Cetak Laporan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($id == 0) {

            $this->db->select('pelanggan.nama, 
            DATE_FORMAT(jatuhtempo, "%m") as bulan,
            tbl_iuran.id_iuran,
            tbl_iuran.bulan, 
            tbl_iuran.bandw,
            tbl_iuran.jumlah,
            tbl_iuran.status_bayar');
            //$this->db->from('data_aset');            
            $this->db->join('pelanggan', 'tbl_iuran.id_pel = pelanggan.id');
            $this->db->group_by('pelanggan.nama');
            $this->db->order_by('tbl_iuran.id_iuran', 'ASC');
            $data = $this->db->get('tbl_iuran')->result_array();
        } else {
            $this->db->select('pelanggan.nama, 
            DATE_FORMAT(jatuhtempo, "%m") as nobulan,
            tbl_iuran.id_iuran,
            tbl_iuran.bulan, 
            tbl_iuran.bandw,
            tbl_iuran.jumlah,
            tbl_iuran.status_bayar');
            //$this->db->from('data_aset');            
            $this->db->join('pelanggan', 'tbl_iuran.id_pel = pelanggan.id');
            $this->db->group_by('pelanggan.nama');
            $this->db->order_by('tbl_iuran.id_iuran', 'ASC');

            $data = $this->db->get_where('tbl_iuran', ['MONTH(jatuhtempo)' => $id])->result_array();
        }

        $dt['iuran'] = $data;
        $dt['penghuni'] = $id;
        $this->load->view('iuran/preview', $dt);
    }

    public function buat_tagihan()
    {
        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Generate Tagihan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->form_validation->set_rules('nama', 'Nama Pelanggan', 'required|trim');
        $this->form_validation->set_rules('tgl_tempo', 'Tanggal Tempo', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);

            $this->load->view('iuran/tagihan', $data);
        } else {
            //variabel untuk menampung inputan dari form
            $bulanIndo = array(
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember'
            );
            $awaltempo = $this->input->post('tgl_tempo');

            for ($i = 0; $i < 12; $i++) {
                //membuat tanggal jatuh tempo nya setiap tanggal 10
                $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));

                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))] . " " . date('Y', strtotime($jatuhtempo));
                $data = [
                    'id_pel' => $this->input->post('id'),
                    'bandw' => $this->input->post('bandw'),
                    'jatuhtempo' => $jatuhtempo,
                    'bulan' => $bulan,
                    'jumlah' => $this->input->post('harga_b'),
                    'id_create' => $this->input->post('id_create'),

                ];

                $this->db->insert('tbl_iuran', $data);
            }

            $this->session->set_flashdata('message', 'Tagihan berhasil dibuat');
            redirect('iuran');
        }
    }

    public function lihat_tagihan($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Detail Tagihan';
        $data['pelanggan'] = $this->db->get_where('pelanggan', ['id' => $id])->row_array();
        $this->db->select('*');
        $this->db->from('tbl_iuran as a');
        $this->db->join('pelanggan as b', 'a.id_pel = b.id');
        $this->db->where('id_pel', $id);
        $data['tagihan'] = $this->db->get();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);

            $this->load->view('iuran/detail_tag', $data);
        }
    }

    public function getBayar()
    {
        $this->load->model('iuran_model');

        echo json_encode($this->iuran_model->getBayar($_POST['id']));
    }

    public function bayar()
    {
        $jumlah = $this->input->post('jumlah');
        $bulan = $this->input->post('bulan');
        $nama = $this->input->post('nama');
        $id_iuran = $this->input->post('id_iuran');
        $data = [
            'status_bayar' => 1,
            'tglbayar' => date("Y-m-d")

        ];
        $data2 = [
            'jumlah_kas' => $jumlah,
            'nama_kas' => $nama,
            'jenis_kas' => 'masuk',
            'ket_kas' => "Bayar Iuran, $bulan",
            'date_input' => date("Y-m-d\TH:i:s")

        ];

        $this->db->where('id_iuran', $id_iuran);
        $this->db->update('tbl_iuran', $data);
        $this->db->insert('tbl_kas_masuk', $data2);



        $this->session->set_flashdata('message', 'Iuran berhasil di bayar!');
        redirect('iuran');
    }

    public function cetak($id)
    {
        $data['title'] = 'Cetak Nota';
        $this->db->select('tbl_iuran.*, pelanggan.nama');
        $this->db->from('tbl_iuran');
        $this->db->join('pelanggan', 'tbl_iuran.id_pel = pelanggan.id');
        $this->db->where('tbl_iuran.id_iuran', $id);
        $data['data'] = $this->db->get();
        $data['perus'] = $this->db->get('perusahaan')->row_array();
        $this->load->view('iuran/cetak_iuran', $data);

        // $data['data'] = $this->db->get_where('tbl_penjualan', ['id' => $id])->row_array();

        // $this->load->library('pdf');


        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "Struk-mini.pdf";
        // $this->pdf->load_view('transaksi/struk_mini', $data);
    }
}
