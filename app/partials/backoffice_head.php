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

    <!-- Ekka CSS -->
    <link id="ekka-css" href="../public/backoffice_assets/css/ekka.css" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="../public/backoffice_assets/img/favicon.png" rel="shortcut icon" />
    <!-- Toastr -->
    <link rel="stylesheet" href="../public/backoffice_assets/plugins/toastr/toastr.min.css">
    <?php
    /* Alert Sesion Via Alerts */
    if (isset($_SESSION['success'])) {
        $success = $_SESSION['success'];
        unset($_SESSION['success']);
    }
    ?>
</head>