$(function () {

    $('.tambahGedung').on('click', function () {
        $('#gedungModalLabel').html('Tambah Data Gedung');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'pendukung/gedung');

    });


    $('#example-1').on('click', '.ubahGedung', function () {

        $('#gedungModalLabel').html('Ubah Data Gedung');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'pendukung/ubahged');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'pendukung/getubahged',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama_ged').val(data.nama_ged);
                $('#id_lok').val(data.id_lok);
                $('#id').val(data.id_ged);
            }
        });

    });


});
