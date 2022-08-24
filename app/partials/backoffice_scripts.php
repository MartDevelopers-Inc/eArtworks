<!-- Common Javascript -->
<script src="../public/backoffice_assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="../public/backoffice_assets/plugins/jquery/jquery.notify.min.js"></script>
<script src="../public/backoffice_assets/plugins/jquery/jquery.bundle.notify.min.js"></script>
<script src="../public/backoffice_assets/js/bootstrap.bundle.min.js"></script>
<script src="../public/backoffice_assets/plugins/simplebar/simplebar.min.js"></script>
<script src="../public/backoffice_assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="../public/backoffice_assets/plugins/slick/slick.min.js"></script>

<!-- Chart -->
<script src="../public/backoffice_assets/plugins/charts/Chart.min.js"></script>
<script src="../public/backoffice_assets/js/chart.js"></script>

<!-- Google map chart -->
<script src="../public/backoffice_assets/plugins/charts/google-map-loader.js"></script>
<script src="../public/backoffice_assets/plugins/charts/google-map.js"></script>

<!-- Date Range Picker -->
<script src="../public/backoffice_assets/plugins/daterangepicker/moment.min.js"></script>
<script src="../public/backoffice_assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../public/backoffice_assets/js/date-range.js"></script>

<!-- Option Switcher -->
<script src="../public/backoffice_assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Ekka Custom -->
<script src="../public/backoffice_assets/js/ekka.js"></script>
<!-- Toastr -->
<script src="../public/backoffice_assets/plugins/toastr/toastr.min.js"></script>
<!-- Inline Scripts -->
<script>
    /* Only Add Active To Active Class */
    jQuery(function($) {
        var path = window.location.href;
        $('ul li').each(function() {
            if (this.href === path) {
                $(this).addClass('active');
            }
        });
    });

    /* Prevent Double Submissions */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<!-- Init  Alerts -->
<?php if (isset($success)) { ?>
    <!-- Pop Success Alert -->
    <script>
        toastr.success("<?php echo $success; ?>", "", {
            positionClass: "toast-bottom-right",
            timeOut: 5e3,
            newestOnTop: !0,
            progressBar: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        })
    </script>

<?php }
if (isset($err)) { ?>
    <script>
        toastr.error("<?php echo $err; ?>", "", {
            positionClass: "toast-bottom-right",
            timeOut: 5e3,
            newestOnTop: !0,
            progressBar: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        })
    </script>
<?php }
if (isset($info)) { ?>
    <script>
        toastr.warning("<?php echo $info; ?>", "", {
            positionClass: "toast-bottom-right",
            timeOut: 5e3,
            newestOnTop: !0,
            progressBar: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        })
    </script>
<?php }
?>