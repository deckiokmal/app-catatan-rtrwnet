$(function () {

	$('.newPelangganTambah').on('click', function () {
		$('#newPelangganLabel').html('Tambah Data Pelanggan');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'pelanggan');

	});


	$('#example').on('click', '.newPelangganUbah', function () {

		$('#newPelangganLabel').html('Ubah Data Pelanggan');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'pelanggan/ubahPel');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'pelanggan/getubahPel',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#nama').val(data.nama);
				$('#no_hp').val(data.no_hp);
				$('#alamat').val(data.alamat);
				$('#id_grup').val(data.id_grup);
				$('#id').val(data.id);

			}
		});
	});
});
