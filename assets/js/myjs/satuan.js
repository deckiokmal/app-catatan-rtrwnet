$(function () {

	$('.tambahSatuan').on('click', function () {
		$('#satuanModalLabel').html('Tambah Data Satuan');
		$('.modal-footer button[type=submit').html('Tambah Data Satuan');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'produk/satuan');

	});


	$('#example').on('click', '.ubahSatuan', function () {

		$('#satuanModalLabel').html('Ubah Data Satuan');
		$('.modal-footer button[type=submit').html('Ubah Data Satuan');
		$('.modal-body form').attr('action', base_url + 'produk/ubahsat');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'produk/getubahsat',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#satuan').val(data.satuan);
				$('#qty').val(data.qty);
				$('#id').val(data.id);



			}
		});
	});
});
