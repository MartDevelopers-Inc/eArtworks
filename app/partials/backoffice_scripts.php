<!-- Common Javascript -->
<script src="../public/backoffice_assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="../public/backoffice_assets/plugins/jquery/jquery.notify.min.js"></script>
<script src="../public/backoffice_assets/plugins/jquery/jquery.bundle.notify.min.js"></script>
<script src="../public/backoffice_assets/js/bootstrap.bundle.min.js"></script>
<script src="../public/backoffice_assets/plugins/simplebar/simplebar.min.js"></script>
<script src="../public/backoffice_assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="../public/backoffice_assets/plugins/slick/slick.min.js"></script>

<!-- Select 2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Data Tables -->
<script src='../public/backoffice_assets/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='../public/backoffice_assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='../public/backoffice_assets/plugins/data-tables/datatables.responsive.min.js'></script>
<!-- Option Switcher -->
<script src="../public/backoffice_assets/plugins/options-sidebar/optionswitcher.js"></script>

<!-- Toastr -->
<script src="../public/backoffice_assets/plugins/toastr/toastr.min.js"></script>

<!-- Custom File Upload Scripts -->
<script src="../public/backoffice_assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Floara Scripts CDN -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>
<script>
    /* Initialize Floara WYSIWYG Editor */
    new FroalaEditor('#editor', {
        height: 300
    })
</script>
<!-- Inline Scripts -->
<script>
    /* Prevent Double Submissions */
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
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


    /* Initialize Select 2 Plugin */
    $(document).ready(function() {
        $('.basic_select').select2();
    });
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
<!-- Ekka Custom -->
<script src="../public/backoffice_assets/js/ekka.js"></script>