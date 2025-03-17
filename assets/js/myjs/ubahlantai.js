$(function () {

    $('.tambahLantai').on('click', function () {
        $('#lantaiModalLabel').html('Tambah Data Lantai');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'pendukung/lantai');

    });


    $('#example-1').on('click', '.ubahLantai', function () {

        $('#lantaiModalLabel').html('Ubah Data Lantai');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'pendukung/ubahlan');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'pendukung/getubahlan',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama_lan').val(data.nama_lan);
                $('#id_ged').val(data.id_ged);
                $('#id').val(data.id_lan);
            }
        });

    });


});
