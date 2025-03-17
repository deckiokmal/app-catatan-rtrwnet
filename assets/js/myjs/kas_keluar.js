$(function () {

	$('.kasKelTambah').on('click', function () {
		$('#kasKelModalLabel').html('Tambah Data Kas');
		$('.modal-footer button[type=submit').html('Tambah Data Kas');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'kas/kas_keluar');

	});


	$('#example').on('click', '.ubahKasKel', function () {

		$('#kasKelModalLabel').html('Ubah Data Kas');
		$('.modal-footer button[type=submit').html('Ubah Data Kas');
		$('.modal-body form').attr('action', base_url + 'kas/ubahKasKel');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'kas/getubahKasKel',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#nama_kas_keluar').val(data.nama_kas);
				$('#jumlah_kas_keluar').val(data.jumlah_kas);
				$('#ket_kas_keluar').val(data.ket_kas);
				$('#id').val(data.id);
			}
		});
	});
});
