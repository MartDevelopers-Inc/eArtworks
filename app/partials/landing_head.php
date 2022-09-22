<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <title>eArtworks - The Ultimate Painting And Artworks Store.</title>
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="eArtstore - The Ultimate Artworks Online Store." />
    <meta name="author" content="MartDevelopers" />

    <!-- site Favicon -->
    <link rel="icon" href="../public/landing_assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="landing_assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="landing_assets/images/favicon/favicon.png" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="../public/landing_assets/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="../public/landing_assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="../public/landing_assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../public/landing_assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="../public/landing_assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="../public/landing_assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="../public/landing_assets/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="../public/landing_assets/css/demo1.css" />
    <link rel="stylesheet" href="../public/landing_assets/css/style.css" />
    <link rel="stylesheet" href="../public/landing_assets/css/responsive.css" />
    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="../public/landing_assets/css/backgrounds/bg-4.css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="../public/backoffice_assets/plugins/toastr/toastr.min.css">
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['err'])) {
        $err = $_SESSION['err'];
        unset($_SESSION['err']);
    }
    ?>
</head>