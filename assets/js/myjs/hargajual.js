
$(function () {

    $('.tambahharga').on('click', function () {
        $('#hargaModalLabel').html('Tambah Harga Jual');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'hargajual');

    });


    $('#myTable').on('click', '.ubahHarga', function () {

        $('#hargaModalLabel').html('Ubah Harga Jual');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'hargajual/ubahHar');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'hargajual/getubahHar',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#produk_id').val(data.produk_id);
                $('#bahan_id').val(data.bahan_id);
                $('#mesin_id').val(data.mesin_id);
                $('#finishing_id').val(data.finishing_id);
                $('#potong_id').val(data.potong_id);
                $('#display_id').val(data.display_id);
                $('#harga').val(data.harga);
                $('#id').val(data.id);

            }
        });

    });


});