const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire({

		icon: 'success',
		title: '' + flashData,
		confirmButtonText: "OK",
		confirmButtonColor: '#3085d6'
	});
}

//tombol-hapus 

$('#example').on('click', '.tombol-hapus', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "data akan dihapus!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Hapus data!'
	}).then(function (result) {
		if (result.value) {
			document.location.href = href;
		}
	});
})
