$(function () {

	$('.tambahHutang').on('click', function () {
		$('#hutangModalLabel').html('Tambah Data Hutang');
		$('.modal-footer button[type=submit').html('Tambah Data Hutang');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'hutang');

	});


	$('#example').on('click', '.ubahHutang', function () {

		$('#hutangModalLabel').html('Ubah Data Hutang');
		$('.modal-footer button[type=submit').html('Ubah Data Hutang');
		$('.modal-body form').attr('action', base_url + 'hutang/ubahhut');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'hutang/getubahhut',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#bayar').val(data.terbayar_hut);

				$('#id').val(data.id_hut);

			}
		});

	});
});
