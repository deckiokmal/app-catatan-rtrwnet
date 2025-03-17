
$(function () {

    $('.tambahFinishing').on('click', function () {
        $('#finishingModalLabel').html('Tambah Data Finishing');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'material/finishing');

    });


    $('#myTable').on('click', '.ubahFinishing', function () {

        $('#finishingModalLabel').html('Ubah Data Finishing');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'material/ubahfin');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'material/getubahfin',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#finishing').val(data.finishing);
                $('#satuan_finishing').val(data.satuan_finishing);
                $('#hpp_finishing').val(data.hpp_finishing);
                $('#id').val(data.id);

            }
        });

    });


});