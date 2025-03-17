<!-- <footer> -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
                Dibuat Oleh <a href=""> DOPNET INDONESIA</a>. Copyright © 2020 <a href="#">Admin</a>.All rights reserved.
            </div>
        </div>
    </div>

</footer>
<!-- End Footer-->
</div>

<!-- BAck to top -->
<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

<!-- Dashboard js -->
<script src="<?= base_url('assets/'); ?>js\vendors\jquery-3.2.1.min.js"></script>
<script src="<?= base_url('assets/'); ?>js\vendors\bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>js\vendors\jquery.sparkline.min.js"></script>
<script src="<?= base_url('assets/'); ?>js\vendors\selectize.min.js"></script>
<script src="<?= base_url('assets/'); ?>js\vendors\jquery.tablesorter.min.js"></script>
<script src="<?= base_url('assets/'); ?>js\vendors\circle-progress.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins\rating\jquery.rating-stars.js"></script>

<!-- Fullside-menu Js-->
<script src="<?= base_url('assets/'); ?>plugins\fullside-menu\jquery.slimscroll.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins\fullside-menu\waves.min.js"></script>

<!-- Dashboard Core -->
<script src="<?= base_url('assets/'); ?>js\index1.js"></script>

<!--Morris.js Charts Plugin -->
<script src="<?= base_url('assets/'); ?>plugins\morris\raphael-min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins\morris\morris.js"></script>

<!-- Custom scroll bar Js-->
<script src="<?= base_url('assets/'); ?>plugins\scroll-bar\jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Custom Js-->
<script src="<?= base_url('assets/'); ?>js\custom.js"></script>

<!-- Data tables -->
<script src="<?= base_url('assets/'); ?>plugins\datatable\jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>plugins\datatable\dataTables.bootstrap4.min.js"></script>

<!-- popover js -->
<script src="<?= base_url('assets/'); ?>js\popover.js"></script>

<!-- Select2 js -->
<script src="<?= base_url('assets/'); ?>plugins\select2\select2.full.min.js"></script>
<!-- select2 Plugin -->
<link href="assets\plugins\select2\select2.min.css" rel="stylesheet">

<!-- Popover js -->
<script src="<?= base_url('assets/'); ?>js\popover.js"></script>

<!-- Sweet alert Plugin -->
<script src="<?= base_url('assets/'); ?>plugins/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>

<!-- Datepicker js -->
<script src="<?= base_url('assets/'); ?>plugins\date-picker\spectrum.js"></script>
<script src="<?= base_url('assets/'); ?>plugins\date-picker\jquery-ui.js"></script>
<script src="<?= base_url('assets/'); ?>plugins\input-mask\jquery.maskedinput.js"></script>

<!-- WYSIWYG Editor js -->
<script src="<?= base_url('assets/'); ?>plugins\wysiwyag\jquery.richtext.js"></script>

<!-- My js -->
<script src="<?= base_url('assets/'); ?>js/myjs/ubahuser.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/menu.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/submenu.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/sweetalert2.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/role.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/pelanggan.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/satuan.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/ubahproduk.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/ubahkategori.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/grup.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/kas_masuk.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/kas_keluar.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/ubahsupplier.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/ubahgudang.js"></script>
<script src="<?= base_url('assets/'); ?>js/myjs/hutang.js"></script>




<!-- Data table js -->
<script>
    $(function() {
        document.getElementById("demo").innerHTML = "Paragraph changed!";

    })
    $(function() {
        $(".tanggalku").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,

        });
    });

    $(function() {
        $("#datepicker").datepicker();
    });

    $(function(e) {
        $('#example').DataTable();
    });


    $('.form-block-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
    $(function(e) {
        $('.content').richText();
        $('.content2').richText();
    });
</script>
</body>

</html>