$(function () {

	$('.newUserAksesTambah').on('click', function () {
		$('#newUserAksesLabel').html('Tambah Data User');
		$('.modal-footer button[type=submit').html('Tambah Data User');
		$('.modal-body form')[0].reset();
		$('.modal-body form').attr('action', base_url + 'admin/userakses');

	});


	$('#example').on('click', '.newUserAksesUbah', function () {

		$('#newUserAksesLabel').html('Ubah Data User');
		$('.modal-footer button[type=submit').html('Ubah Data User');
		$('.modal-body form').attr('action', base_url + 'admin/ubahUser');

		const id = $(this).data('id');

		$.ajax({

			url: base_url + 'admin/getubahUser',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#name').val(data.name);
				$('#email').val(data.email);
				$('#password1').val(data.password);
				$('#password2').val(data.password);
				$('#no_hp').val(data.no_hp);
				$('#role_id').val(data.role_id);
				$('#is_active').val(data.is_active);
				$('#id').val(data.id);



			}
		});
	});
});
