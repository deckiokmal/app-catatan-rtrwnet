$(function () {

    $('.tambahMesin').on('click', function () {
        $('#mesinModalLabel').html('Tambah Data Mesin');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'material/mesin');

    });


    $('#myTable').on('click', '.ubahMesin', function () {

        $('#mesinModalLabel').html('Ubah Data Mesin');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'material/ubahmes');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'material/getubahmes',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#mesin').val(data.mesin);
                $('#tipe').val(data.tipe);
                $('#satuan_mesin').val(data.satuan_mesin);
                $('#hpp_mesin').val(data.hpp_mesin);
                $('#id').val(data.id);

            }
        });

    });


});