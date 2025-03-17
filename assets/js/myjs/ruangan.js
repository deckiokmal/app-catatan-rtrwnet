$(function () {

	$('.tambahRuangan').on('click', function () {
		$('#RuanganModalLabel').html('Tambah Data Ruangan');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'pendukung/ruangan');

	});


	$('#example-1').on('click', '.ubahRuangan', function () {

		$('#RuanganModalLabel').html('Ubah Data Ruangan');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'pendukung/ubahruang');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'pendukung/getubahruang',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#nama_ruang').val(data.nama_ruang);
				$('#id_lan').val(data.id_lan);
				$('#id').val(data.id_ruang);
			}
		});

	});


});
