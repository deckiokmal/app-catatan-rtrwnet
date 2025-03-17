<div class=" content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
    <div class="row row-deck">

        <div class="col-lg-12 col-xl-12">
            <form action="" id="formCetak" class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Pilih Bulan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6 col-xl-6 col-sm-12">
                                <select name="bulan" id="bulan" class="form-control ">
                                    <option value="0">Lihat Semua</option>
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


        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header text-right">
                    <h3 class="card-title font-weight-bold">Rekap Bulanan</h3>
                    <div class="col text-right ml-4">
                        <!-- <button class="btn btn-primary btn-icon tambahGrup" data-toggle="modal" data-target="#GrupModal">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Grup Pelanggan</span>
                        </button> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="preview">

                    </div>
                </div>
                <!-- table-wrapper -->
            </div>

        </div>
    </div>

</div>
</div>
</div>



<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).ready(function() {
            $("#formCetak").submit(function(e) {
                e.preventDefault();
                var id = $("#bulan").val();

                var url = base_url + "iuran/filter/" + id;
                $('#preview').load(url);
            })
        });
    });
</script>