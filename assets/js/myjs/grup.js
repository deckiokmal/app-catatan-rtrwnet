$(function () {

	$('.tambahGrup').on('click', function () {
		$('#GrupModalLabel').html('Tambah Grup');
		$('.modal-footer button[type=submit').html('Tambah Grup');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'pelanggan/grup');

	});


	$('#example').on('click', '.ubahGrup', function () {

		$('#GrupModalLabel').html('Ubah Grup');
		$('.modal-footer button[type=submit').html('Ubah Grup');
		$('.modal-body form').attr('action', base_url + 'pelanggan/ubahgrup');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'pelanggan/getubahgrup',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#grup').val(data.grup);
				$('#harga_b').val(data.harga_b);
				$('#id').val(data.id);



			}
		});
	});
});
