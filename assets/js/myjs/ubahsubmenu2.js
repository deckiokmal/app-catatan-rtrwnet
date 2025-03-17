$(function () {

    $('.newSubmenuTambah').on('click', function () {
        $('#newSubmenuLabel').html('Tambah Data Submenu');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', '/a-pen/menu/submenu');

    });


    $('.newSubmenuUbah').on('click', function () {

        $('#newSubmenuLabel').html('Ubah Data Submenu');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', '/a-pen/menu/ubahSub');

        const id = $(this).data('id');

        $.ajax({

            url: '/a-pen/menu/getubahSub',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data)

            }
        });
    });
});