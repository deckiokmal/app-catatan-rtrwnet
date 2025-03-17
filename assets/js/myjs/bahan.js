$(function () {

    $('.tambahBahan').on('click', function () {
        $('#bahanModalLabel').html('Tambah Data Bahan');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'material');

    });


    $('#myTable').on('click', '.ubahBahan', function () {

        $('#bahanModalLabel').html('Ubah Data Bahan');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'material/ubahbah');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'material/getubahbah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#bahan').val(data.bahan);
                $('#satuan_id').val(data.satuan_id);
                $('#hpp_bahan').val(data.hpp_bahan);
                $('#id').val(data.id);

            }
        });

    });


});