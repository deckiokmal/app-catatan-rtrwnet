<!-- begin:: Content -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="row">

        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--bordered">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Daftar Pesanan
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body table-responsive">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover" id="myTable">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>No Pesanan</th>
                                <th>Pelanggan</th>
                                <th>Tanggal Pesan</th>
                                <th>tanggal ambil</th>
                                <th>Total</th>
                                <th>Keterangan</th>
                                <th class="text-center">Cetak Struk</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($penjualan as $penj) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $penj['no_pesanan']; ?></td>
                                    <td><?= $penj['nama']; ?></td>
                                    <td><?= date('d F Y', strtotime($penj['tgl_pesan'])); ?></td>
                                    <td><?= date('d F Y', strtotime($penj['tgl_ambil'])); ?></td>
                                    <td>Rp. <?= number_format($penj['s_total'], 2, ',', '.'); ?></td>
                                    <td><?= $penj['keterangan']; ?></td>
                                    <td>
                                        <div class="kt-section__content kt-section__content--solid" id="detail">
                                            <a href="<?= base_url(''); ?>transaksi/udahprint/<?= $penj['no_pesanan']; ?>" target="_blank" class="btn btn-brand btn-sm"><span class="tags" data-toggle="kt-tooltip" data-placement="center" title="print struk mini">Mini</span></a>
                                            <a href="<?= base_url(''); ?>transaksi/udahprint_normal/<?= $penj['no_pesanan']; ?>" target="_blank" class="btn btn-danger btn-sm"><span class="tags" data-toggle="kt-tooltip" data-placement="center" title="print struk normal">Normal</span></a>

                                        </div>
                                    </td>
                                    <?php if ($penj['status_print'] == 'print!') : ?>
                                        <td class="text-center"><span class="kt-badge kt-badge--inline kt-badge--warning"><?= $penj['status_print']; ?></span></td>
                                    <?php else : ?>
                                        <td class="text-center"><span class="kt-badge kt-badge--inline kt-badge--success"><?= $penj['status_print']; ?></span></td>
                                    <?php endif; ?>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>


    </div>

</div>

<!--begin::Modal-->
<div class="modal fade" id="newProses" tabindex="-1" role="dialog" aria-labelledby="newProsesLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProsesLabel">Detail Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body table-reponsive">
                <form action="<?= base_url(''); ?>transaksi/cetak/<?= $penj['id']; ?>" method="post" target="_blank">
                    <input type="hidden" name="id" id="id" value="<?= $penj['id']; ?>">
                    <div class="justify-content-center table-responsive">
                        <table style="border: 1px solid black;" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left align-top table-success" width="150px">No Pesanan</th>
                                    <td width="300px"><span id="nopesanan"></span> </td>
                                    <th class="text-left align-top table-success" width="175px">Nama Pesanan</th>
                                    <td width="350px"><span id="nama_pesanan"></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left align-top table-success">Pelanggan</th>
                                    <td><span id="nama_pel"></span></td>
                                    <th class="text-left align-top table-success">No. Handphone</th>
                                    <td><span id="no_hp"></span></td>
                                </tr>
                                <tr>
                                    <th class="text-left align-top table-success">Alamat</th>
                                    <td colspan="3"><span id="alamat"></span></td>

                                </tr>
                                <tr>
                                    <th class="text-left align-top table-success">Tanggal Pesan</th>
                                    <td><span id="tgl_pesan"></span></td>
                                    <th class="text-left align-top table-success">Tangga Ambil</th>
                                    <td><span id="tgl_ambil"></span></td>
                                </tr>
                                <tr>
                                    <th height="80px" class="text-left align-top table-success">Uraian Pesanan</th>
                                    <td colspan="3"><span id="uraian"></span></td>
                                </tr>
                                <tr>
                                    <th height="80px" class="text-left align-top table-success">Keterangan</th>
                                    <td colspan="3"><span id="ket"></span></td>
                                </tr>
                            </thead>

                            <tbody>


                            </tbody>

                        </table>
                        <br>
                        <table style="border: 1px solid black;" class="table table-bordered responsive">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center align-middle table-success">Qty</th>
                                    <th colspan="2" class="text-center align-middle table-success">Dimensi</th>
                                    <th rowspan="2" class="text-center align-middle table-success">@Harga</th>
                                    <th rowspan="2" class="text-center align-middle table-success">Jasa Desain</th>
                                    <th rowspan="2" class="text-center align-middle table-success">Biaya Lain</th>
                                    <th rowspan="2" class="text-center align-middle table-success">Total</th>
                                </tr>
                                <tr>
                                    <th class="text-center align-middle table-success">Panjang</th>
                                    <th class="text-center align-middle table-success">Lebar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle"><span id="qty"></span></td>
                                    <td class="text-center align-middle"><span id="p"></span></td>
                                    <td class="text-center align-middle"><span id="l"></span></td>
                                    <td class="text-center align-middle"><span id="harga"></span></td>
                                    <td class="text-center align-middle"><span id="js_desain"></span></td>
                                    <td class="text-center align-middle"><span id="biaya_lain"></span></td>
                                    <td class="text-center align-middle"><span id="s_total"></span></td>
                                </tr>
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="6" class="text-center align-middle table-success">Diskon</th>
                                    <td><span id="diskon"></span>%</td>
                                </tr>
                                <tr>
                                    <th colspan="6" class="text-center align-middle table-success">Potongan</th>
                                    <td><span id="potongan"></span></td>
                                </tr>
                                <tr>
                                    <th colspan="6" class="text-center align-middle table-success">Uang Muka</th>
                                    <td><span id="uang_muka"></span></td>
                                </tr>
                                <tr>
                                    <th colspan="6" class="text-center align-middle table-success">Sisa</th>
                                    <td><span id="sisa_bayar"></span></td>
                                </tr>
                            </thead>
                        </table>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>

            </div>
        </div>
        </form>
    </div>
</div>

<!--end::Modal-->