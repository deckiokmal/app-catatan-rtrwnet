$(function () {

	$('.tombolTambahData').on('click', function () {
		$('#MenuModalLabel').html('Tambah Data Menu');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'menu');

	});


	$('#example').on('click', '.tampilModalUbah', function () {

		$('#MenuModalLabel').html('Ubah Data Menu');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'menu/ubah');

		const id = $(this).data('id');

		$.ajax({
			url: base_url + 'menu/getubah',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#menu').val(data.menu);
				$('#url_menu').val(data.url_menu);
				$('#icon').val(data.icon_menu);
				$('#id').val(data.id);

			}
		});
	});
});
