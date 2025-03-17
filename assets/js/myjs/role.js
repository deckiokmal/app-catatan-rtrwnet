$(function () {

    $('.tambahRole').on('click', function () {
        $('#NewRoleModalLabel').html('Tambah Data Role');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'admin/role');

    });


    $('.ubahRole').on('click', function () {

        $('#NewRoleModalLabel').html('Ubah Data Role');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'admin/ubah');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'admin/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#role').val(data.role);
                $('#id').val(data.id);
            }
        });

    });


});