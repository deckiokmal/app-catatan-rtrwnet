$(function () {

	$('.tambahProduk').on('click', function () {
		$('#produkModalLabel').html('Tambah Data Produk');
		$('.modal-footer button[type=submit').html('Tambah Data Produk');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'produk');

	});


	$('#example').on('click', '.ubahProduk', function () {

		$('#produkModalLabel').html('Ubah Data Produk');
		$('.modal-footer button[type=submit').html('Ubah Data Produk');
		$('.modal-body form').attr('action', base_url + 'produk/ubahprod');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'produk/getubahprod',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#nama_produk').val(data.nama_produk);
				$('#s_prod').val(data.s_prod);
				$('#k_prod').val(data.k_prod);
				$('#harga_modal').val(data.harga_modal);
				$('#harga_jual').val(data.harga_jual);
				$('#id').val(data.id);



			}
		});
	});
});
