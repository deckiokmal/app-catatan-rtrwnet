
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('cart');
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Produk_model', 'produk');
    }

    public function index()
    {

        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'Input Penjualan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->db->get('pelanggan')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();
        $this->load->model('Transaksi_model', 'transaksi');
        $data['no_faktur'] = $this->transaksi->get_no_invoice();


        $this->form_validation->set_rules('tgl_pesan', 'Tanggal Pesan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi/index', $data);
        } else {
            $data = [

                'tgl_pesan' => $this->input->post('tgl_pesan'),
                'tgl_ambil' => $this->input->post('tgl_ambil'),
                'no_pesanan' => $this->input->post('no_pesanan'),
                'id_pelanggan' => $this->input->post('id_pelanggan'),
                'id_produk' => $this->input->post('id_produk'),
                'qty' => $this->input->post('qty'),
                's_total' => $this->input->post('s_total'),
                'nama_pesanan' => $this->input->post('nama_pesanan'),
                'harga' => $this->input->post('harga_jual'),
                'd_panjang' => $this->input->post('d_panjang'),
                'd_lebar' => $this->input->post('d_lebar'),
                'js_desain' => $this->input->post('js_desain'),
                'biaya_lain' => $this->input->post('biaya_lain'),
                'diskon' => $this->input->post('diskon'),
                'potongan' => $this->input->post('potongan'),
                'keterangan' => $this->input->post('keterangan'),
                'uraian' => $this->input->post('uraian'),
                'uang_muka' => $this->input->post('uang_muka'),
                'sisa_bayar' => $this->input->post('sisa_bayar'),
                'tgl_penjualan' => time()


            ];
            $this->db->insert('tbl_penjualan', $data);

            $this->session->set_flashdata('message', 'Data berhasil Ditambah!');
            redirect('transaksi/proses');
        }
    }


    function barang()
    {
        $return_arr = array();
        $row_array = array();
        $text = $this->input->get('text');
        $barang = $this->db->select("*")
            ->from("produk")

            ->like("nama_produk", $text)

            ->get();
        if ($barang->num_rows() > 0) {

            foreach ($barang->result_array() as $row) {
                $row_array['id'] = $row['id'];
                $row_array['text'] = utf8_encode("$row[nama_produk]");
                array_push($return_arr, $row_array);
            }
        }

        echo json_encode(array("results" => $return_arr));
    }

    function get_info()
    {
        $id = $this->input->get('id');

        $info = $this->db->select("a.*, b.satuan, b.qty, b.konversi, c.jml_stok")
            ->from("produk as a")
            ->join("satuan_ukur as b", "a.s_prod = b.id")
            ->join("stok as c", "a.kode_produk = c.kode_produk")
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
        $barang = $this->db->select("*")
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

        $info = $this->db->select("a.*, b.grup, b.diskon_grup")
            ->from("pelanggan as a")
            ->join("grup_pelanggan as b", "a.id_grup = b.id")
            ->where("a.id", $id)
            ->get()
            ->row_array();
        echo json_encode($info);
    }

    public function proses()
    {

        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'data pesanan masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->db->get('pelanggan')->result_array();
        $this->load->model('Transaksi_model', 'transaksi');
        $data['penjualan'] = $this->transaksi->ambilData();


        $data['produk'] = $this->db->get('produk')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/proses', $data);
        $this->load->view('templates/footer');
    }

    public function ci()
    {
        // $items = $this->cart->contents();
        // echo '<pre>';
        // print_r($items);
        // echo '<pre>';

        $data['title'] = 'data pesanan masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/ci', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_detail($id)
    {
        $data['title'] = 'Laporan Cetak Detail';
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->join('pelanggan', 'tbl_penjualan.id_pelanggan = pelanggan.id');
        $this->db->where('tbl_penjualan.id', $id);

        $query = $this->db->get();
        $data = $query->row_array();
        $data['data'] = $data;
        // $data['data'] = $this->db->get_where('tbl_penjualan', ['id' => $id])->row_array();

        $this->load->library('pdf');
        $data['perus'] = $this->db->get('perusahaan')->row_array();

        $this->pdf->setPaper('legal', 'potrait');
        $this->pdf->filename = "laporan-cetak-detail.pdf";
        $this->pdf->load_view('transaksi/cetak', $data);
    }

    public function udahprint_normal($id)
    {
        $print = 'printed';

        $this->db->set('status_print', $print);
        $this->db->where('no_pesanan', $id);
        $this->db->update('penjualan');

        redirect('transaksi/struk_normal/' . $id);
    }

    public function struk_normal($id)
    {
        $data['title'] = 'Cetak Struk Normal';
        $this->db->select('penjualan.*, detail_penjualan.*, pelanggan.nama, produk.nama_produk');
        $this->db->from('penjualan');
        $this->db->join('detail_penjualan', 'penjualan.no_pesanan = detail_penjualan.no_pesanan');
        $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id');
        $this->db->where('penjualan.no_pesanan', $id);
        $data['data'] = $this->db->get();
        // $data['data'] = $this->db->get_where('tbl_penjualan', ['id' => $id])->row_array();
        $data['perus'] = $this->db->get('perusahaan')->row_array();
        $this->load->view('transaksi/struk_normal', $data);

        // $this->load->library('pdf');


        // $this->pdf->setPaper('A4', 'potrait');
        // $this->pdf->filename = "Struk-Normal.pdf";
        // $this->pdf->load_view('transaksi/struk_normal', $data);
    }

    public function udahprint($id)
    {
        $print = 'printed';

        $this->db->set('status_print', $print);
        $this->db->where('no_pesanan', $id);
        $this->db->update('penjualan');

        redirect('transaksi/struk_mini/' . $id);
    }

    public function struk_mini($id)
    {

        $data['title'] = 'Cetak Struk Mini';
        $this->db->select('penjualan.*, detail_penjualan.*, pelanggan.nama, produk.nama_produk');
        $this->db->from('penjualan');
        $this->db->join('detail_penjualan', 'penjualan.no_pesanan = detail_penjualan.no_pesanan');
        $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id');
        $this->db->join('produk', 'detail_penjualan.id_produk = produk.id');
        $this->db->where('penjualan.no_pesanan', $id);
        $data['data'] = $this->db->get();

        // $data['data'] = $this->db->get_where('tbl_penjualan', ['id' => $id])->row_array();

        $this->load->library('pdf');
        $data['perus'] = $this->db->get('perusahaan')->row_array();

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Struk-mini.pdf";
        $this->pdf->load_view('transaksi/struk_mini', $data);
    }

    public function keranjang()
    {

        $data['uri'] = $this->uri->segment(1);
        $data['title'] = 'data pesanan masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pelanggan'] = $this->db->get('pelanggan')->result_array();
        $data['keranjang'] = $this->db->get('tbl_keranjang')->result_array();

        $this->load->model('Transaksi_model', 'transaksi');
        $data['no_faktur'] = $this->transaksi->get_no_invoice();
        $data['produk'] = $this->transaksi->ambilProduk();
        $data['grup'] = $this->db->get('grup_pelanggan')->result_array();

        $this->form_validation->set_rules('nama_pesanan', 'Nama Pesanan', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/cart2', $data);
        } else {


            $data = [


                'no_pesanan' => $this->input->post('no_pesanan'),
                'id_produk' => $this->input->post('nama_produk'),
                'qty' => $this->input->post('qty'),

                'nama_pesanan' => $this->input->post('nama_pesanan'),
                'harga' => $this->input->post('harga_jual'),
                'd_panjang' => $this->input->post('d_panjang'),
                'd_lebar' => $this->input->post('d_lebar'),



            ];
            var_dump($data);
            $this->db->insert('tbl_keranjang', $data);

            $this->session->set_flashdata('message', 'Keranjang berhasil Ditambah!');
            redirect('transaksi/keranjang');
        }
    }

    public function udahbaca()
    {
        $baca = 1;

        $this->db->set('status', $baca);
        $this->db->update('notif');


        redirect('transaksi/proses');
    }

    function destroy()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('message', 'Keranjang berhasil di bersihkan!');
        redirect('transaksi');
    }

    function add_to_cart()
    {
        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '2') {

            $data['produk'] = $this->db->get('produk')->result();
            $data = array(
                'id'       => $this->input->post('id_produk'),
                'name'     => $this->input->post('nama_produk'),
                'qty'      => $this->input->post('qty'),
                'k_prod'      => $this->input->post('k_prod'),
                'price'    => str_replace(",", "", $this->input->post('harga_jual')),
                'harga_modal'    => str_replace(",", "", $this->input->post('harga_modal')),


            );

            $this->cart->insert($data);


            redirect('transaksi');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }
    function remove()
    {
        if ($this->session->userdata('role_id') == '1' || $this->session->userdata('role_id') == '2') {
            $row_id = $this->uri->segment(3);
            $this->cart->update(array(
                'rowid'      => $row_id,
                'qty'     => 0
            ));
            redirect('transaksi');
        } else {
            echo "Halaman tidak ditemukan";
        }
    }

    public function simpan_penjualan()
    {

        $pelanggan = $this->input->post('id_pelanggan');
        $tgl_pesan = $this->input->post('tgl_pesan');
        $tgl_ambil = $this->input->post('tgl_ambil');
        $keterangan = $this->input->post('keterangan');
        $diskon_grup = $this->input->post('diskon_grup');
        $s_total = str_replace(",", "", $this->input->post('s_total'));
        $potongan = str_replace(",", "", $this->input->post('potongan'));
        $sisa_bayar = str_replace(",", "", $this->input->post('sisa_bayar'));
        $uang_muka = str_replace(",", "", $this->input->post('uang_muka'));

        $no_pesanan = $this->transaksi->get_no_invoice();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row();
        $kasir = $data['user']->name;

        if ($cart = $this->cart->contents()) :
            foreach ($cart as $item) :
                $data = array(

                    'no_pesanan'             =>    $no_pesanan,
                    'id_produk'    =>    $item['id'],
                    'tgl_pesan1'        =>    $tgl_pesan,
                    'nama_pesanan'    =>    $item['nama_pesanan'],
                    'qty'    =>    $item['qty'],
                    'd_panjang'    =>    $item['d_panjang'],
                    'k_prod'    =>    $item['k_prod'],
                    'd_lebar'            =>    $item['d_lebar'],
                    'harga'            =>    $item['price_1'],
                    'harga_modal'            =>    $item['harga_modal'],
                    'sub_total' =>           $item['subtotal'],
                    's_total'            =>    $s_total,

                );


                $this->db->insert('detail_penjualan', $data);

            endforeach;
        endif;
        $data2 = array(
            'no_pesanan'             =>    $no_pesanan,
            'tgl_pesan'        =>    $tgl_pesan,
            'tgl_ambil'    =>    $tgl_ambil,
            'diskon'            =>    $diskon_grup,
            'potongan'            =>    $potongan,
            's_total'            =>    $s_total,
            'id_pelanggan'        =>    $pelanggan,
            'keterangan'            =>    $keterangan,
            'uang_muka'            =>    $uang_muka,
            'sisa_bayar'            =>    $sisa_bayar,
            'create_by'            =>    $kasir,
        );

        $data3 = array(
            'no_pesanan' => $no_pesanan,
            'notif_by' => $kasir,
            'create_at' => time(),
            'status' => 0,
        );

        $this->db->insert('penjualan', $data2);
        $this->db->insert('notif', $data3);
        $this->cart->destroy();
        $this->session->set_flashdata('message', 'Checkout Berhasil!');
        redirect('transaksi/proses');
    }

    ////SUPPLIER

    public function supplier()
    {
        $data['title'] = 'Data Supplier';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['supplier'] = $this->db->get('master_supplier')->result_array();

        $this->form_validation->set_rules('supplier', 'Supplier', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi/supplier', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'supplier' => $this->input->post('supplier'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),

            ];
            $this->db->insert('master_supplier', $data);

            $this->session->set_flashdata('message', 'Supplier berhasil ditambah');
            redirect('transaksi/supplier');
        }
    }


    public function hapussup($id)
    {
        $this->transaksi->hapusSup($id);


        $this->session->set_flashdata('message', 'Supplier berhasil dihapus!');
        redirect('transaksi/supplier');
    }


    public function getubahsup()
    {
        echo json_encode($this->transaksi->getSupById($_POST['id']));
    }

    public function ubahsup()
    {
        $data = [

            'supplier' => $this->input->post('supplier'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),

        ];
        $this->db->where('id_supp', ($_POST['id']));
        $this->db->update('master_supplier', $data);

        $this->session->set_flashdata('message', 'Supplier berhasil diubah!');
        redirect('transaksi/supplier');
    }

    ////GUDANG

    public function gudang()
    {
        $data['title'] = 'Data Gudang';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['gudang'] = $this->db->get('gudang')->result_array();

        $this->form_validation->set_rules('gudang', 'Gudang', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi/gudang', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'gudang' => $this->input->post('gudang'),
                'alamat' => $this->input->post('alamat'),


            ];
            $this->db->insert('gudang', $data);

            $this->session->set_flashdata('message', 'Gudang berhasil ditambah');
            redirect('transaksi/gudang');
        }
    }

    ////STOK MASUK

    public function stok_masuk()
    {
        $data['title'] = 'Stok Masuk';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['stok'] = $this->db->get('stok_in')->result_array();
        $data['stok_in'] = $this->transaksi->getstok_in();
        $data['gudang'] = $this->db->get('gudang')->result_array();
        $data['supplier'] = $this->db->get('master_supplier')->result_array();
        $data['produk'] = $this->db->get('produk')->result_array();

        $this->form_validation->set_rules('stok', 'Stok', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi/stok_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

                'kode_produk' => $this->input->post('kode_produk'),
                'id_gud' => $this->input->post('id_gud'),
                'id_supp' => $this->input->post('id_supp'),
                'stok_in' => $this->input->post('stok'),
                'date' => date("Y-m-d\TH:i:s"),

            ];
            $stok_in = $this->input->post('stok');
            $id = $this->input->post('kode_produk');
            $id_gud = $this->input->post('id_gud');

            $this->db->insert('stok_in', $data);
            $sql = "UPDATE stok SET jml_stok = jml_stok + '$stok_in' WHERE kode_produk ='$id' AND id_gud = '$id_gud'";
            $this->db->query($sql);


            $this->session->set_flashdata('message', 'Stok Masuk berhasil ditambah');
            redirect('transaksi/stok_masuk');
        }
    }

    public function hapusStok_in()
    {
        $stokin_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);
        $stok = $this->transaksi->getStokinById($stokin_id);

        $this->transaksi->hapusStokin($stokin_id);
        $sql = "UPDATE stok SET jml_stok = jml_stok - '$stok->stok_in' WHERE kode_produk ='$id' AND id_gud = '$stok->id_gud'";
        $this->db->query($sql);



        $this->session->set_flashdata('message', 'Stok in berhasil dihapus!');
        redirect('transaksi/stok_masuk');
    }


    public function getubahstokin()
    {
        echo json_encode($this->transaksi->getStokinById($_POST['id']));
    }

    public function ubahStokin()
    {
        $data = [

            'gudang' => $this->input->post('gudang'),
            'alamat' => $this->input->post('alamat'),

        ];
        $this->db->where('id_gud', ($_POST['id']));
        $this->db->update('gudang', $data);

        $this->session->set_flashdata('message', 'Gudang berhasil diubah!');
        redirect('transaksi/gudang');
    }


    public function hapusGud($id)
    {
        $this->transaksi->hapusGud($id);


        $this->session->set_flashdata('message', 'Gudang berhasil dihapus!');
        redirect('transaksi/gudang');
    }


    public function getubahgud()
    {
        echo json_encode($this->transaksi->getGudById($_POST['id']));
    }

    public function ubahgud()
    {
        $data = [

            'gudang' => $this->input->post('gudang'),
            'alamat' => $this->input->post('alamat'),

        ];
        $this->db->where('id_gud', ($_POST['id']));
        $this->db->update('gudang', $data);

        $this->session->set_flashdata('message', 'Gudang berhasil diubah!');
        redirect('transaksi/gudang');
    }
}
