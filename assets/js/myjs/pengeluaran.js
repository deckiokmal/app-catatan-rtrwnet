$(function () {

    $('.newPengeluaranTambah').on('click', function () {
        $('#newPengeluaranLabel').html('Tambah Data Pengeluaran');
        $('.modal-footer button[type=submit').html('Tambah Data');
        $('.modal-body form')[0].reset();
        $('.modal-body form').attr('action', base_url + 'pengeluaran');

    });


    $('#myTable').on('click', '.newPengeluaranUbah', function () {

        $('#newPengeluaranLabel').html('Ubah Data Pengeluaran');
        $('.modal-footer button[type=submit').html('Ubah Data');
        $('.modal-body form').attr('action', base_url + 'pengeluaran/ubahPeng');

        const id = $(this).data('id');

        $.ajax({

            url: base_url + 'pengeluaran/getubahPeng',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama_pengeluaran').val(data.nama_pengeluaran);
                $('#tgl_pengeluaran').val(data.tgl_pengeluaran);
                $('#jml_pengeluaran').val(data.jml_pengeluaran);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);

            }
        });
    });
});
