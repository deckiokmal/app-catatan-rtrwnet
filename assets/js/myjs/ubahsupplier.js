$(function () {

	$('.tambahSupplier').on('click', function () {
		$('#supplierModalLabel').html('Tambah Data Supplier');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'transaksi/supplier');

	});


	$('#example').on('click', '.ubahSupplier', function () {

		$('#supplierModalLabel').html('Ubah Data Supplier');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'transaksi/ubahsup');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'transaksi/getubahsup',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#supplier').val(data.supplier);
				$('#alamat').val(data.alamat);
				$('#no_hp').val(data.no_hp);
				$('#id').val(data.id_supp);

			}
		});

	});


});
