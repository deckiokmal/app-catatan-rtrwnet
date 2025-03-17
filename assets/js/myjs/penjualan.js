$(document).ready(function () {
	$(document).on('click', '#pilih_pel', function () {
		var nama = $(this).data('nama_pel');
		$('#nama_pel').val(nama);
		$('.nama_pel').val(nama);
		$('#pelanggan').modal('hide');
	})

})
