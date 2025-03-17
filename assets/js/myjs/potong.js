
$(function () {

    $('.tambahPotong').on('click', function () {
        $('#potongModalLabel').html('Tambah Jenis Potong');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'material/potong');

    });


    $('#myTable').on('click', '.ubahPotong', function () {

        $('#potongModalLabel').html('Ubah Jenis Potong');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'material/ubahpot');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'material/getubahpot',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#potong').val(data.potong);
                $('#satuan_potong').val(data.satuan_potong);
                $('#hpp_potong').val(data.hpp_potong);
                $('#id').val(data.id);

            }
        });

    });


});