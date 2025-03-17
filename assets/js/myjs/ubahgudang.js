$(function () {

	$('.tambahGudang').on('click', function () {
		$('#gudangModalLabel').html('Tambah Data Gudang');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'transaksi/gudang');

	});


	$('#example').on('click', '.ubahGudang', function () {

		$('#gudangModalLabel').html('Ubah Data Gudang');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'transaksi/ubahGud');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'transaksi/getubahgud',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#gudang').val(data.gudang);
				$('#alamat').val(data.alamat);
				$('#id').val(data.id_supp);

			}
		});

	});


});
