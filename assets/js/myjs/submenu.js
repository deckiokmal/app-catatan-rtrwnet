$(function () {

	$('.newSubmenuTambah').on('click', function () {
		$('#newSubmenuLabel').html('Tambah Data Submenu');
		$('.modal-footer button[type=submit').html('Tambah Data');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'menu/submenu');

	});


	$('#example').on('click', '.newSubmenuUbah', function () {

		$('#newSubmenuLabel').html('Ubah Data Submenu');
		$('.modal-footer button[type=submit').html('Ubah Data');
		$('.modal-body form').attr('action', base_url + 'menu/ubahSub');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'menu/getubahSub',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url);
				$('#is_active').val(data.is_active);
				$('#id').val(data.id);

			}
		});
	});
});
