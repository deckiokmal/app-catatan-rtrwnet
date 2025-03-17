<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- <form action="<?= base_url('transaksi') ?>" method="post"> -->



    <div class="row">

        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet" width="900px">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Input Pesanan
                        </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">

                    <!--begin::Section-->
                    <form action="<?php echo base_url() . 'transaksi/add_to_cart' ?>" method="post">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-4 col-form-label">No Pesanan</label>
                            <div class="col-8">
                                <input class="form-control" value="<?= $no_pesanan; ?>" type="text" id="no_pesanan" name="no_pesanan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-4 col-form-label">Jenis Pesanan</label>
                            <div class="col-6">
                                <input class="form-control" autocomplete="off" id="produk" placeholder="Jenis Pesanan" name="nama_produk" type="text">
                            </div>
                            <div class="col-2">
                                <input class="form-control" id="produk" name="id_produk" type="text" placeholder="Otomatis" readonly>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label class="col-4 col-form-label">Nama Pesanan</label>
                            <div class="col-8">
                                <input class="form-control" name="nama_pesanan" placeholder="Nama Pesanan" id="nama_pesanan" autocomplete="off" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Jumlah Pesanan</label>
                            <div class="col-8">
                                <input class="form-control" name="qty" id="qty" data-qty="qty" placeholder="Qty" autocomplete="off" type="number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Dimensi</label>
                            <div class="col">
                                <input class="form-control" name="d_panjang" data-qty="qty" id="d_panjang" placeholder="Panjang" autocomplete="off" type="text">
                            </div>

                            <div class="col">
                                <input class="form-control" name="d_lebar" id="d_lebar" autocomplete="off" placeholder="Lebar" type="text">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Harga</label>
                            <div class="col-8">
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Rp</span></div>
                                    <input type="text" placeholder="Otomatis" id="harga_jual" name="harga_jual" class="form-control" type="text" readonly>

                                </div>
                            </div>
                        </div>
                        <input type="hidden" placeholder="Otomatis" id="harga_modal" name="harga_modal" class="form-control" type="text">
                        <input type="hidden" placeholder="Otomatis" id="k_prod" name="k_prod" class="form-control" type="text">
                        <br>
                        <div class="row justify-content-center mx-auto">

                            <button type="submit" class="btn btn-success btn-large">Masukan Keranjang</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

    </form>

    <div class="col-lg-12">

        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Daftar Pesanan
                    </h3>
                </div>
                <div class="kt-portlet__head-label float-right">
                    <h3 class="kt-portlet__head-title">
                        No Pesanan : <?= $no_pesanan; ?>
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__content table-responsive">
                        <div class="alert alert-primary fade show" role="alert">
                            <div class="alert-icon"><i class="flaticon-warning"></i></div>
                            <div class="alert-text">1 ID/Jenis Produk untuk 1 dimensi, tidak bisa melakukan input 1 ID/Jenis Produk dengan dimensi yang berbeda . </div>

                            <div class="alert-close">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="la la-close"></i></span>
                                </button>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">No</th>
                                    <th rowspan="2" class="text-center">Jenis Pesanan</th>
                                    <th rowspan="2" class="text-center">Nama Pesanan</th>
                                    <th colspan="2" class="text-center">Dimensi</th>
                                    <th rowspan="2" class="text-center">Qty</th>
                                    <th rowspan="2" class="text-center">Harga</th>
                                    <th rowspan="2" class="text-center">Subtotal</th>
                                    <th rowspan="2" class="text-center">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center">panjang</th>
                                    <th class="text-center">lebar</th>
                                </tr>
                            </thead>
                            <tbody id="">
                                <?php $no = 1; ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php echo form_hidden($no . '[rowid]', $items['rowid']); ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $items['name']; ?></td>
                                        <td class="text-center"><?= $items['nama_pesanan']; ?></td>
                                        <td class="text-center"><?= $items['d_lebar']; ?></td>
                                        <td class="text-center"><?= $items['d_panjang']; ?></td>
                                        <td class="text-center"><?= $items['qty']; ?></td>
                                        <td class="text-center">Rp. <?= number_format($items['price_1']); ?></td>
                                        <td class="text-center">Rp. <?php echo number_format($items['subtotal']); ?></td>
                                        <td style="text-align:center;"><a href="<?php echo base_url() . 'transaksi/remove/' . $items['rowid']; ?>" class="btn btn-danger btn-xs"><span class="fa fa-close"></span>Hapus</a></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="7" class="text-center font-weight-bold">Total</td>

                                    <td class="text-center font-weight-bold">Rp. <?php echo number_format($this->cart->total()); ?></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="row justify-content-center mx-auto">

                            <a href="<?php echo base_url() . 'transaksi/destroy' ?>" class="btn btn-warning     btn-large">Bersihkan Keranjang</a>

                        </div>
                    </div>
                </div>

                <!--end::Section-->
            </div>

            <!--end::Form-->
        </div>

    </div>




    <div class="col-lg-12">

        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Pilih Pelanggan
                    </h3>
                </div>
            </div>


            <div class="kt-portlet__body">
                <form action="<?= base_url('transaksi/simpan_penjualan'); ?>" method="post">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Tanggal Pesan :</label>
                            <input name="tgl_pesan" id="kt_datepicker_1" type="text" autocomplete="off" placeholder="Tanggal Pesan" class="form-control datepicker">
                        </div>
                        <div class="col-lg-6">
                            <label>No Handphone :</label>
                            <div class="kt-input-icon">
                                <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="Terisi Otomatis" disabled>
                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-mobile-phone"></i></span></span>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="">Tanggal Ambil :</label>
                            <input name="tgl_ambil" id="mydate" type="text" autocomplete="off" placeholder="Tanggal Ambil" class="form-control datepicker">
                        </div>


                        <div class="col-lg-6">
                            <label class="">Alamat:</label>
                            <div class="kt-input-icon">

                                <input type="text" class="form-control" type="text" id="alamat" placeholder="Terisi Otomatis" name="alamat" disabled>
                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-lg-6">

                            <label>Pelanggan :</label>
                            <div class="kt-input-icon">
                                <input class="form-control" id="pelanggan" name="nama" type="text" autocomplete="off" placeholder="cari nama pelanggan ..">
                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="">Grup Pelanggan :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button class="btn btn-brand" type="button" data-toggle="modal" data-target="#newPelanggan">Tambah</button>
                                </div>
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Grup</span></div>
                                <input type="hidden" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="Terisi Otomatis" readonly>
                                <input type="text" class="form-control" id="grup" name="grup" placeholder="Terisi Otomatis" readonly>

                            </div>


                        </div>
                    </div>
            </div>
        </div>


    </div>


    <div class="row">
        <div class="col-lg-8">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--bordered">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label for="example-text-input" class="col-4 col-form-label">Deskripsi</label>
                        <div class="col-8">
                            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="Deskripsi" rows="9"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-form-label">Diskon</label>
                        <div class="col-8">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text kt_font_boldest" id="basic-addon1">%</span></div>
                                <input type="text" id="diskon_grup" autocomplete="off" placeholder="%" name="diskon_grup" onchange="hitung();" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--bordered">
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <div class="col-lg-12">
                            <label>Total Biaya :</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Rp</span></div>
                                <input type="text" name="s_total" placeholder="Otomatis" value="<?php echo $this->cart->total(); ?>" id="s_total" onkeyup="hitung();" class="form-control form-control-lg kt-font-boldest" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Potongan :</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Rp</span></div>
                                <input type="text" name="potongan" id="potongan" placeholder="Otomatis" onkeyup="hitung();" class="form-control form-control-lg kt-font-boldest" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Uang Muka :</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Rp</span></div>
                                <input type="text" name="uang_muka" placeholder="Masukan DP" id="uang_muka" onkeyup="hitung();" class="form-control form-control-lg kt-font-boldest" type="text">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label>Sisa Bayar :</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Rp</span></div>
                                <input type="text" name="sisa_bayar" placeholder="Otomatis" id="sisa_bayar" onkeyup="hitung();" class="form-control form-control-lg kt-font-boldest" type="text" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet">



                <div class="kt-portlet__body">
                    <div class="row justify-content-center mx-auto">

                        <button type="submit" class="btn btn-success btn-large">Checkout</button>
                    </div>

                </div>

                </form>
            </div>
        </div>



    </div>



    <!--begin:Pelanggan:Modal-->
    <div class="modal fade" id="newPelanggan" tabindex="-1" role="dialog" aria-labelledby="newPelangganLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPelangganLabel">Tambah Pelanggan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pelanggan/tambahpel'); ?>" method="post">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Nama Pelanggan :</label>
                            <input type="text" class="form-control" id="nama_m" name="nama_m" placeholder="Masukan Nama Pelanggan" autofokus="on">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">No Handphone :</label>
                            <input type="text" class="form-control" id="no_hp_m" name="no_hp_m" placeholder="Masukan No Handphone Pelanggan">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Alamat :</label>
                            <input type="text" class="form-control" id="alamat_m" name="alamat_m" placeholder="Masukan Almaat Pelanggan">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Grup Pelanggan :</label>

                            <select name="id_grup_m" id="id_grup_m" class="form-control">

                                <option value="">Select Grup</option>
                                <?php foreach ($grup as $g) : ?>
                                    <option class="form-control" value="<?= $g['id']; ?>"><?= $g['grup']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!--end:Pelanggan:Modal-->

    <?php $this->load->view('templates/footer'); ?>


    <script type="text/javascript">
        $(document).ready(function() {

            $('#produk').autocomplete({
                source: "<?php echo site_url('transaksi/get_cariprod'); ?>",

                select: function(event, ui) {
                    $('[name="nama_produk"]').val(ui.item.label);
                    $('[name="id_produk"]').val(ui.item.id_produk);
                    $('[name="harga_modal"]').val(ui.item.harga_modal);
                    $('[name="harga_jual"]').val(ui.item.harga_jual);
                    $('[name="k_prod"]').val(ui.item.k_prod);
                }
            });

        });

        $(document).ready(function() {

            $('#pelanggan').autocomplete({
                source: "<?php echo site_url('transaksi/get_autocomplete'); ?>",

                select: function(event, ui) {
                    $('[name="nama"]').val(ui.item.label);
                    $('[name="id_pelanggan"]').val(ui.item.id_pelanggan);
                    $('[name="alamat"]').val(ui.item.alamat);
                    $('[name="no_hp"]').val(ui.item.no_hp);
                    $('[name="diskon_grup"]').val(ui.item.diskon_grup);
                    $('[name="grup"]').val(ui.item.grup);
                }
            });

        });

        function hitung() {

            var diskon = document.getElementById('diskon_grup').value;

            var uang_muka = document.getElementById('uang_muka').value;
            var s_total = document.getElementById('s_total').value;

            var diskon_pot = parseInt(s_total) * parseInt(diskon) / parseInt(100);
            if (!isNaN(diskon_pot)) {
                var potongan1 = document.getElementById('potongan').value = diskon_pot;
            }

            var sisa1 = parseInt(s_total) - parseInt(potongan1) - parseInt(uang_muka);
            if (!isNaN(sisa1)) {
                var sisa2 = document.getElementById('sisa_bayar').value = sisa1;
            }


        }
    </script>