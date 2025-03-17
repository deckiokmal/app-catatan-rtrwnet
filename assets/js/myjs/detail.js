$(function () {

    $('.detailAset').on('click', function () {

        const id = $(this).data('id');

        $.ajax({

            url: "/a-pen/aset/detail",
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {

                $('#nama').text(data.nama);
                $('#manufaktur').text(data.manufaktur);
                $('#no_aset').text(data.no_aset);
                $('#model').text(data.model);
                $('#brand').text(data.brand);
                $('#no_serial').text(data.no_serial);
                $('#lokasi').text(data.lokasi);
                $('#kategori').text(data.kategori);
                $('#status').text(data.status);
                $('#kondisi').text(data.kondisi);
                $('#nm').text(data.nm);
                $('#tgl_beli').text(data.tgl_beli);
                $('#hbs_garansi').text(data.hbs_garansi);
                $('#harga_beli').text(data.harga_beli);
                $('#harga_pasar').text(data.harga_pasar);
                $('#harga_jual').text(data.harga_jual);
                $('#id').val(data.id);
            }
        });


    });


});