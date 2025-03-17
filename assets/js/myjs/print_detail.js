$(document).ready(function () {
    $(document).on('click', '#prosesdetail', function () {
        var id = $(this).data('id');
        var nopesanan = $(this).data('nopesanan');
        var nama_pel = $(this).data('nama_pel');
        var nama_produk = $(this).data('nama_produk');
        var nama_pesanan = $(this).data('nama_pesanan');
        var tgl_ambil = $(this).data('tgl_ambil');
        var tgl_pesan = $(this).data('tgl_pesan');
        var no_hp = $(this).data('no_hp');
        var alamat = $(this).data('alamat');
        var uraian = $(this).data('uraian');
        var ket = $(this).data('ket');
        var qty = $(this).data('qty');
        var p = $(this).data('p');
        var l = $(this).data('l');
        var harga = $(this).data('harga');
        var js_desain = $(this).data('js_desain');
        var biaya_lain = $(this).data('biaya_lain');
        var s_total = $(this).data('s_total');
        var uang_muka = $(this).data('uang_muka');
        var sisa_bayar = $(this).data('sisa_bayar');
        var diskon = $(this).data('diskon');
        var potongan = $(this).data('potongan');

        $('#id').val(id);
        $('#nopesanan').text(nopesanan);
        $('#nama_pel').text(nama_pel);
        $('#nama_produk').text(nama_produk);
        $('#nama_pesanan').text(nama_pesanan);
        $('#tgl_ambil').text(tgl_ambil);
        $('#tgl_pesan').text(tgl_pesan);
        $('#no_hp').text(no_hp);
        $('#alamat').text(alamat);
        $('#uraian').text(uraian);
        $('#ket').text(ket);
        $('#qty').text(qty);
        $('#p').text(p);
        $('#l').text(l);
        $('#harga').text(harga);
        $('#js_desain').text(js_desain);
        $('#biaya_lain').text(biaya_lain);
        $('#uang_muka').text(uang_muka);
        $('#sisa_bayar').text(sisa_bayar);
        $('#diskon').text(diskon);
        $('#potongan').text(potongan);
        $('#s_total').text(s_total);
    })
})