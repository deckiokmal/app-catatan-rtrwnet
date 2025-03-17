$(function () {

    $('.tambahSup').on('click', function () {
        $('#supplierModalLabel').html('Tambah Data supplier');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', '/a-pen/master/supplier');

    });


    $('.ubahSup').on('click', function () {

        $('#supplierModalLabel').html('Ubah Data Supplier');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', '/a-pen/master/ubahsup');

        const id = $(this).data('id');

        $.ajax({

            url: '/a-pen/master/getubahsup',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#supplier').val(data.supplier);
                $('#alamat').val(data.alamat);
                $('#no_hp').val(data.no_hp);
                $('#id').val(data.id);
            }
        });

    });


});

$(function () {

    $('.tambahSup').on('click', function () {
        $('#supplierModalLabel').html('Tambah Data supplier');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', '/a-pen/master/supplier');

    });


    $('.ubahSup').on('click', function () {

        $('#supplierModalLabel').html('Ubah Data Supplier');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', '/a-pen/master/ubahsup');

        const id = $(this).data('id');

        $.ajax({

            url: '/a-pen/master/getubahsup',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#manufaktur').val(data.manufaktur);
                $('#no_aset').val(data.no_aset);
                $('#model').val(data.model);
                $('#brand').val(data.brand);
                $('#no_serial').val(data.no_serial);
                $('#lokasi_id').val(data.lokasi_id);
                $('#kategori_id').val(data.kategori_id);
                $('#status').val(data.status);
                $('#kondisi').val(data.kondisi);
                $('#supplier_id').val(data.supplier_id);
                $('#tgl_beli').val(data.tgl_beli);
                $('#hbs_garansi').val(data.hbs_garansi);
                $('#harga_beli').val(data.harga_beli);
                $('#harga_pasar').val(data.harga_pasar);
                $('#harga_jual').val(data.harga_jual);
            }
        });

    });


});