<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Online Painting And Design Shopping System</title>
    <meta property="og:title" content="Sign In">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Online Painting And Design Shopping System">
    <meta property="og:description" content="Online Painting And Design Shopping System">
    <link rel="canonical" href="../">
    <meta property="og:url" content="../">
    <meta property="og:site_name" content="Online Painting And Design Shopping System">
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/upload/apple-touch-icon.png">
    <link rel="shortcut icon" href="../assets/upload/favicon.ico">
    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="../assets/plugins/%40fortawesome/fontawesome-free/css/all.min.css"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="../assets/app_css/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="../assets/app_css/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="../assets/app_css/custom.css">
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add loading class to html immediately
        document.querySelector('html').classList.add('loading');
    </script><!-- END THEME STYLES -->
    <!-- Sweet Alert css -->
    <!-- Data Tables CDN-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" />
    <link href="../assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
</head>
<?php
/* Alert Sesion Via Alerts */
if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']);
}
?>