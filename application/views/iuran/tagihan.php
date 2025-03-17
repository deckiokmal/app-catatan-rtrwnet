<div class=" content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><?= $title; ?></h2>
                </div>
                <form action="<?= base_url('iuran/buat_tagihan'); ?>" method="post">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 col-xl-12 col-sm-12">

                                <div class="alert alert-info">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Harap dibaca !</strong>
                                    <hr class="message-inner-separator">
                                    <p>Ini merupakan menu generate tagihan untuk 12 bulan ke depan .</p>
                                    <p>Jika pada tanggal tempo di isi dengan 10 April 2020 maka tagihan akan di generate sampai 10 Mei 2021</p>
                                    <p>Jika ingin di generate untuk tahun ini saja maka pilih 10 januari 2020 pada tanggal tempo</p>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Pilih Pelanggan :</label>
                                    <select id="pelanggan_id" onChange="get_pelanggan(this.value)" class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Tempo :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                            </div>
                                        </div>
                                        <input class="form-control tanggalku" autocomplete="off" name="tgl_tempo" id="tgl_tempo" type="text">
                                    </div>

                                </div>
                                <?= form_error('tgl_tempo', '<small class="text-danger">', '</small>'); ?>
                                <!-- <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Bulan Awal Tagihan :</label>
                                <select name="bulan" id="bulan" class="form-control">

                                    <option value="">Select Grup</option>
                                    <?php foreach ($bulan as $b) : ?>
                                        <option class="form-control" value="<?= $b['id']; ?>"><?= $b['grup']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div> -->
                                <input type="hidden" name="id_create" value="<?= $user['name']; ?>">
                                <input type="hidden" name="nama">
                                <input type="hidden" name="id">
                                <input type="hidden" name="bandw">
                                <div class="form-group">
                                    <label class="form-label">Alamat :</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Nama Pelanggan">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Iuran Bulanan :</label>
                                    <input type="text" class="form-control" id="harga_b" name="harga_b" placeholder="Masukan Nama Pelanggan">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bandwidth :</label>
                                    <span name="grup" class="badge badge-success mt-2"></span>
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>

                    </div>
            </div>
            </form>
        </div>

    </div>
</div>

</div>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#pelanggan_id").select2({
            placeholder: "Pilih Pelanggan",
            allowClear: true,

            ajax: {
                url: "<?= base_url('iuran/pelanggan'); ?>",
                dataType: 'json',
                data: function(params) {

                    var queryParameters = {
                        text: params.term
                    }
                    return queryParameters;
                }
            },
            cache: true,
            formatResult: format,

            formatSelection: format,
            escapeMarkup: function(m) {
                return m;
            }
        });
    });

    function format(x) {
        return x.text;
    }



    function get_pelanggan(v_id) {
        $.ajax({
            url: "<?= base_url('iuran/get_pelanggan'); ?>",
            data: {
                id: v_id
            },
            success: function(data) {
                var dt = JSON.parse(data);
                $("input[name=nama]").val(dt.nama);
                $("span[name=grup]").html(dt.grup);
                $("input[name=alamat]").val(dt.alamat);
                $("input[name=id]").val(dt.id);
                $("input[name=harga_b]").val(dt.harga_b);
                $("input[name=bandw]").val(dt.grup);
                $("input[name=jml_iuran]").val(dt.jml_iuran);


            }
        });

    }
</script>