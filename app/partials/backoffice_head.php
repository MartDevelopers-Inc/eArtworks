<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="eArtstore - The Ultimate Artworks Online Store.">

    <title>eArtworks - The Ultimate Painting And Artworks Store.</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="../public/backoffice_assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../public/backoffice_assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- Theme CSS -->
    <link id="ekka-css" href="../public/backoffice_assets/css/ekka.css" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="../public/backoffice_assets/img/favicon.png" rel="shortcut icon" />

    <!-- Data Tables -->
    <link href='../public/backoffice_assets/plugins/data-tables/datatables.bootstrap5.min.css' rel='stylesheet'>
    <link href='../public/backoffice_assets/plugins/data-tables/responsive.datatables.min.css' rel='stylesheet'>
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Toastr -->
    <link rel="stylesheet" href="../public/backoffice_assets/plugins/toastr/toastr.min.css">
    <!-- Floara CDN -->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        $err = $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>
</head>