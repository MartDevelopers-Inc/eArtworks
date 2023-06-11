<script src="../public/landing_assets/js/vendor/jquery-3.5.1.min.js"></script>

<script src="../public/landing_assets/js/vendor/popper.min.js"></script>
<script src="../public/landing_assets/js/vendor/bootstrap.min.js"></script>
<script src="../public/landing_assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="../public/landing_assets/js/vendor/modernizr-3.11.2.min.js"></script>

<!--Plugins JS-->
<script src="../public/landing_assets/js/plugins/swiper-bundle.min.js"></script>
<script src="../public/landing_assets/js/plugins/countdownTimer.min.js"></script>
<script src="../public/landing_assets/js/plugins/scrollup.js"></script>
<script src="../public/landing_assets/js/plugins/jquery.zoom.min.js"></script>
<script src="../public/landing_assets/js/plugins/slick.min.js"></script>
<script src="../public/landing_assets/js/plugins/infiniteslidev2.js"></script>
<script src="../public/landing_assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script src="../public/landing_assets/js/plugins/jquery.sticky-sidebar.js"></script>
<!-- Google translate Js -->
<script src="../public/landing_assets/js/vendor/google-translate.js"></script>
<!-- Custom File Upload Scripts -->
<script src="../public/backoffice_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    /* Google Translate */
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
                pageLanguage: "en"
            },
            "google_translate_element"
        );
    }
    /* Prevent Double Submissions */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    /* Load Ajax */
    function GetPaymentMeansName(val) {
        $.ajax({
            type: "POST",
            url: "ajax.php",
            data: 'PaymentMeansID=' + val,
            success: function(data) {
                //alert(data);
                $('#PaymentMethodName').val(data);
            }
        });

    }
</script>
<script>
    /* Init Custom File Select */
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
    /* Show Selected File Name */
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("myInput").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
<!-- Main Js -->
<script src="../public/landing_assets/js/vendor/index.js"></script>
<script src="../public/landing_assets/js/main.js"></script>
<!-- Toastr -->
<script src="../public/backoffice_assets/plugins/toastr/toastr.min.js"></script>
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