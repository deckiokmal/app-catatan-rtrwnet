<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Forms</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>


    <div class="row row-deck">
        <div class="col-lg-12 col-xl-12">
            <form action="<?php echo base_url() . 'transaksi/add_to_cart' ?>" method="post" class="card">
                <div class="card-header">
                    <h3 class="card-title">Pilih Produk</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <input class="form-control" value="<?= $no_faktur; ?>" id="no_pesanan" name="no_pesanan" type="hidden">
                        <input class="form-control" id="produk" name="nama_produk" placeholder="Otomatis" type="hidden" readonly>
                        <div class="form-group col-md-3 col-xl-3" data-text="Contoh Select2">
                            <label class="form-label">Pilih Produk</label>
                            <select id="barang_id" name="id_produk" onChange="get_data(this.value)" class="form-control">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-xl-2" data-text="Autocomplete Select2">
                            <label class="form-label">Satuan</label>
                            <input type="text" class="form-control" placeholder="Satuan" name="s_prod" readonly>
                        </div>
                        <div class="form-group col-md-2 col-xl-2">
                            <label class="form-label">Stok</label>
                            <input type="text" class="form-control" name="stok" placeholder="Stok" readonly>
                        </div>
                        <div class="form-group col-md-1 col-xl-1">
                            <label class="form-label">Konversi</label>
                            <input type="text" class="form-control" onkeyup="hitung();" name="konversi" id="konversi" readonly>
                        </div>
                        <div class="form-group col-md-1 col-xl-1">
                            <label class="form-label">Qty</label>
                            <input type="text" class="form-control" onkeyup="hitung();" name="qty" id="qty" placeholder="Qty">
                        </div>
                        <div class="form-group col-md-1 col-xl-1">
                            <label class="form-label">Pcs</label>
                            <input type="text" class="form-control" onkeyup="hitung();" name="total_qty" id="total_qty" placeholder="Pcs" readonly>
                        </div>

                        <div class="form-group col-md-2 col-xl-2">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga_jual" placeholder="Harga" readonly>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="d-flex ">

                            <button type="submit" class="btn btn-primary ml-auto">Masukan ke Keranjang</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>

    </div>



    <div class="row">
        <div class="col-lg-12 col-xl-4">
            <div class="card">

                <div class="card-body" style="height:110px;">
                    <div class="clock">
                        <div class="text-center">
                            <h3 id="Date"></h3>
                        </div>
                        <div class="text-center">
                            <h3><span id="hours"></span>
                                <span id="point">:</span>
                                <span id="min"></span>
                                <span id="point">:</span>
                                <span id="sec"></span></h3>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-4">
            <div class="card">

                <div class="card-body" style="height:110px;">


                    <div class="text-center align-middle display-3">
                        <span class="text-center align-middle display-3" id="hours" value="">Rp. <?php echo number_format($this->cart->total()); ?></span>

                    </div>


                </div>
            </div>
        </div>

        <div class="col-lg-12 col-xl-4">
            <div class="card">
                <div class="card-body align-middle" style="height:110px;">
                    <div class="text-center">
                        <h3>Kasir :</h3>
                    </div>
                    <div class="text-center align-middle">

                        <h3 class="text-center align-middle"><?= $user['name']; ?></h3>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="alert alert-info" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-exclamation mr-2" aria-hidden="true"></i> Baca! input terlebih dahulu semua barang yang akan dibeli konsumen ke keranjang, setelah semua terinput pilih pelanggan</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xl-8">
            <div class="card m-b-20">
                <div class="card-header ">
                    <div class="card-title">Keranjang Belanja</div>
                    <div class="col text-right ml-4">
                        No Faktur : <span class="badge badge-info"><?= $no_faktur; ?></span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Produk</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php echo form_hidden($no . '[rowid]', $items['rowid']); ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td class="text-center"><?= $items['name']; ?></td>
                                        <td class="text-center"><?= $items['qty']; ?></td>
                                        <td class="text-center">Rp. <?= number_format($items['price']); ?></td>
                                        <td class="text-center">Rp. <?php echo number_format($items['subtotal']); ?></td>
                                        <td style="text-align:center;"><a href="<?php echo base_url() . 'transaksi/remove/' . $items['rowid']; ?>" class="btn btn-danger btn-sm text-white" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="4" class="text-center font-weight-bold">Total</td>

                                    <td class="text-center font-weight-bold">Rp. <?php echo number_format($this->cart->total()); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-4">
            <form method="post" class="card">

                <div class="card-header">
                    <h3 class="card-title">Pilih Pelanggan</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label class="form-label">Pilih Pelanggan</label>
                        <select id="pelanggan_id" onChange="get_pelanggan(this.value)" class="form-control">
                            <option></option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label class="form-label">No Hp</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Name">
                    </div> -->
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Grup Pelanggan</label>
                        <span name="grup" class="badge badge-success mt-2"></span>

                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex">

                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <div class="card ">
                <div class="card-header ">
                    <div class="card-title">Jumlah Total</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <td>Cart Subtotal</td>
                                    <td class="text-right"><input class=" price form-control text-right" value="<?php echo $this->cart->total(); ?>" name="s_total" id="s_total" onkeyup="hitung();"></input></td>
                                </tr>
                                <tr>
                                    <td><span>Diskon</span></td>
                                    <td class="text-right text-muted"><input class=" price form-control text-right" name="diskon_grup" onchange="hitung();" id="diskon_grup"></input></td>
                                </tr>
                                <tr>
                                    <td><span>Bayar</span></td>
                                    <td id="bayar" id="bayar" onkeyup="hitung();" class="text-right text-muted"><input class=" price form-control text-right" value=""></input></td>
                                </tr>
                                <tr>
                                    <td><span>Kembalian</span></td>
                                    <td>
                                        <input id="kembalian" name="kembalian" onkeyup="hitung();" class="form-control text-right"></input>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <form class="text-center mt-3">
                        <input class="btn btn-secondary btn-block btn-lg mt-2 m-b-20 " type="submit" value="Proceed To Checkout">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php $this->load->view('templates/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#barang_id").select2({
            placeholder: "Nama Produk",
            allowClear: true,

            ajax: {
                url: "<?= base_url('transaksi/barang'); ?>",
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

    function get_data(v_id) {
        $.ajax({
            url: "<?= base_url('transaksi/get_info'); ?>",
            data: {
                id: v_id
            },
            success: function(data) {
                var dt = JSON.parse(data);
                $("input[name=id_produk]").val(dt.id);
                $("input[name=nama_produk]").val(dt.nama_produk);
                $("input[name=s_prod]").val(dt.satuan);
                $("input[name=qty]").val(dt.qty);
                $("input[name=total_qty]").val(dt.konversi);
                $("input[name=konversi]").val(dt.konversi);
                $("input[name=stok]").val(dt.jml_stok);
                $("input[name=harga_jual]").val(dt.harga_jual);


            }
        });

    }

    $(document).ready(function() {
        $("#pelanggan_id").select2({
            placeholder: "Pilih Pelanggan",
            allowClear: true,

            ajax: {
                url: "<?= base_url('transaksi/pelanggan'); ?>",
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
            url: "<?= base_url('transaksi/get_pelanggan'); ?>",
            data: {
                id: v_id
            },
            success: function(data) {
                var dt = JSON.parse(data);
                $("input[name=alamat]").val(dt.alamat);
                $("input[name=diskon_grup]").val(dt.diskon_grup);
                $("span[name=grup]").html(dt.grup);


            }
        });

    }

    function hitung() {

        var diskon = document.getElementById('diskon_grup').value;
        var bayar = document.getElementById('bayar').value;
        var qty = document.getElementById('qty').value;
        var konversi = document.getElementById('konversi').value;


        var kembalian = document.getElementById('kembalian').value;
        var s_total = document.getElementById('s_total').value;

        // var diskon_pot = parseInt(s_total) * parseInt(diskon) / parseInt(100);
        // if (!isNaN(diskon_pot)) {
        //     var potongan1 = document.getElementById('potongan').value = diskon_pot;
        // }


        var pulangan = parseInt(s_total) - parseInt(diskon) - parseInt(bayar);
        if (!isNaN(pulangan)) {
            document.getElementById('kembalian').value = pulangan;
        }
        var total_qty = parseInt(qty) * parseInt(konversi);
        if (!isNaN(total_qty)) {
            document.getElementById('total_qty').value = total_qty;
        }
    }
    $(document).ready(function() {
        // Create two variable with the names of the months and days in an array
        var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        var dayNames = ["Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jumat,", "Sabtu,"]

        // Create a newDate() object
        var newDate = new Date();
        // Extract the current date from Date object
        newDate.setDate(newDate.getDate());
        // Output the day, date, month and year   
        $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

        setInterval(function() {
            // Create a newDate() object and extract the seconds of the current time on the visitor's
            var seconds = new Date().getSeconds();
            // Add a leading zero to seconds value
            $("#sec").html((seconds < 10 ? "0" : "") + seconds);
        }, 1000);

        setInterval(function() {
            // Create a newDate() object and extract the minutes of the current time on the visitor's
            var minutes = new Date().getMinutes();
            // Add a leading zero to the minutes value
            $("#min").html((minutes < 10 ? "0" : "") + minutes);
        }, 1000);

        setInterval(function() {
            // Create a newDate() object and extract the hours of the current time on the visitor's
            var hours = new Date().getHours();
            // Add a leading zero to the hours value
            $("#hours").html((hours < 10 ? "0" : "") + hours);
        }, 1000);
    });
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $("#pelanggan_id").select2({
            placeholder: "Pilih Pelanggan",
            allowClear: true,
            dropdownAutoWidth: true
        })

        // Set option selected onchange
        $('#user_selected').change(function() {
            var value = $(this).val();

            // Set selected 
            $('#sel_users').val(value);
            $('#sel_users').select2().trigger('change');
        });
    });
    $(document).ready(function() {
        $("#produk_id").select2({
            placeholder: "Pilih Produk"

        })
    });
</script> -->