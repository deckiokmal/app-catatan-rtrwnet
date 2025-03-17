$(function () {

	$('.tambahKategori').on('click', function () {
		$('#kategoriModalLabel').html('Tambah Data kategori');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'produk/kategori');

	});


	$('#example').on('click', '.ubahKategori', function () {

		$('#kategoriModalLabel').html('Ubah Data Kategori');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'produk/ubahkat');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'produk/getubahkat',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#kategori').val(data.kategori);
				$('#id').val(data.id_kat);

			}
		});

	});


});
