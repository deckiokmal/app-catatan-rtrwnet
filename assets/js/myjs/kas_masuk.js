$(function () {

	$('.kasTambah').on('click', function () {
		$('#kasModalLabel').html('Tambah Data Kas');
		$('.modal-footer button[type=submit').html('Tambah Data Kas');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'kas');

	});


	$('#example').on('click', '.ubahKas', function () {

		$('#kasModalLabel').html('Ubah Data Kas');
		$('.modal-footer button[type=submit').html('Ubah Data Kas');
		$('.modal-body form').attr('action', base_url + 'kas/ubahKas');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'kas/getubahKas',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#nama_kas_masuk').val(data.nama_kas);
				$('#jumlah_kas_masuk').val(data.jumlah_kas);
				$('#ket_kas_masuk').val(data.ket_kas);
				$('#id').val(data.id);
			}
		});
	});
});
