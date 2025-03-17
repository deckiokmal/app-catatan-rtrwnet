<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('nama_kas_keluar', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>

    <div class="row row-deck">

        <div class="col-lg-12 col-xl-12">
            <form action="" id="filterKas" class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Pilih Bulan Laporan Kas</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6 col-xl-6 col-sm-12">
                                <select name="bulan" id="bulan" class="form-control ">
                                    <option value="0">Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-xl-6 col-sm-12">
                                <button class="btn btn-success" type="submit" aria-haspopup="true" aria-expanded="false">
                                    Lihat Rekapan
                                </button>
                            </div>


                        </div>
                    </div>

                </div>
            </form>



        </div>

    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header text-right">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="col text-right ml-4">
                        <!-- <button class="btn btn-primary btn-icon kasKelTambah" data-toggle="modal" data-target="#KasKel">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Kas Keluar</span>
                        </button> -->
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive" id="preview_bln">

                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
        </div>


    </div>
</div>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).ready(function() {
            $("#filterKas").submit(function(e) {
                e.preventDefault();
                var id = $("#bulan").val();

                var url = base_url + "laporan/filter_kas/" + id;
                $('#preview_bln').load(url);
            })
        });
    });
</script>