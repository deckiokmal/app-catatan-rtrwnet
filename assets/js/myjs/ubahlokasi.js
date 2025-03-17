$(function () {

	$('.tambahLokasi').on('click', function () {
		$('#lokasiModalLabel').html('Tambah Data Kampus');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'pendukung/lokasi');

	});


	$('#example-1').on('click', '.ubahLokasi', function () {

		$('#lokasiModalLabel').html('Ubah Data Kampus');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'pendukung/ubahlok');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'pendukung/getubahlok',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#nama_lok').val(data.nama_lok);
				$('#id').val(data.id_lok);
			}
		});

	});


});
