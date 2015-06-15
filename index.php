<?php
session_start();
ini_set('display_errors', 1);
?><!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>| UniRoot |</title>
        <meta name="description" content="software development, software outsourcing, out-staffing, design">
        <meta name="keywords" content="software development, software outsourcing, out-staffing, design">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Favicon -->
        <link href="view/img/favicon.png" rel="icon" type="image/png">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="view/js/jquery.fancybox.js"></script>
        <script type="text/javascript" src="view/js/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="view/js/dropzone.js"></script>
        <script type="text/javascript" src="view/js/admin_onload.js"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="view/css/style.css">
        <link rel="stylesheet" href="view/css/offer-page.css">
        <link rel="stylesheet" href="view/css/jquery.fancybox.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="view/css/admin_page.css">
    </head>
    <body class="body-padding" id="AdminPage">
        <?php
            include 'view/includes/admin_header.php';
            require_once('helpers/startRouter.php');
            include 'view/includes/admin_footer.php';
        ?>
    </body>
</html>