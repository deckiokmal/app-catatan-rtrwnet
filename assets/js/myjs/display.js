
$(function () {

    $('.tambahDisplay').on('click', function () {
        $('#displayModalLabel').html('Tambah Data Display');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'material/display');

    });


    $('#myTable').on('click', '.ubahDisplay', function () {

        $('#displayModalLabel').html('Ubah Data Display');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'material/ubahdis');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'material/getubahdis',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#display').val(data.display);
                $('#hpp_display').val(data.hpp_display);
                $('#id').val(data.id);

            }
        });

    });


});