<?php
session_start();
ini_set('display_errors', 1);
require_once('controller/users/userController.php');
require_once('controller/projects/controller_projects.php');
require_once('model/projects/data_formatter.php');
?>
<!-- <!DOCTYPE html>  -->
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Offer page</title> 
<meta name="description" content="software development, software outsourcing, out-staffing, design">
  <meta name="keywords" content="software development, software outsourcing, out-staffing, design">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="view/img/favicon.png" rel="icon" type="image/png">
    <!-- Bootstrap style -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <!-- slick slider style -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <!-- Font Awesome Style -->
    <link rel="stylesheet" href="view/css/font-awesome.min.css">
    <!-- Animate -->
    <link href="view/css/animate.css" rel="stylesheet">
    <!-- Theme style -->
    <link href="view/css/offer-page.css" rel="stylesheet">
    <link href="view/css/style.css" rel="stylesheet"> 
    <!-- Bootstrap override style -->                 
  <link href="view/css/bootstrap-override.css" rel="stylesheet">
        <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Fauna+One&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese' rel='stylesheet' type='text/css'>
    
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

      <script src="view/js/jquery.easing.js"></script>   
  <script src="view/js/jquery.flexslider-min.js"></script>
  <!-- // <script src="view/js/jquery.isotope.min.js"></script>    -->
  <script src="view/js/jquery.fitvids.js"></script>
  <script src="view/js/jquery.appear.js"></script>  
  <script src="view/js/retina.js"></script>
  <script src="view/js/admin_onload.js"></script>   
  <script src="view/js/respond.min.js"></script>  
  <script src="view/js/jquery.parallax-1.1.3.js"></script>
  <script src="view/js/owl.carousel.min.js"></script>
  <script src="view/js/jquery.meanmenu.2.0.min.js"></script>
  <script src="view/js/jquery.nicescroll.min.js"></script>
  <script src="view/js/jquery.refineslide.js"></script>      
  <script src="view/js/sly.js"></script>
  <script src="view/js/jquery.magnific-popup.min.js"></script>
  <script src="view/js/jquery.zoom.js"></script>
  <!-- // <script type="text/javascript" src="slick/slick.min.js"></script> -->
<!-- <script type="text/javascript" src="slick/slick.min.js"></script> -->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="view/js/modernizr.js"></script>
</head>
<body class="body-padding"  id="OfferPage" >
    <?php include 'view/includes/admin_header.php';?>

<!-- Header -->
    <?php include 'view/offer_page.php';
if(isset($_GET['route'])) { // Authorization
    $route = $_GET['route'];
    switch($route){
        case "auth": {
            // echo "Came into case:AUTH of index.php Router";
            if($_POST['login']!="" && $_POST['password']!="") { 
                $uc = new userController();
                if($array = $uc->auth($_POST['login'], $_POST['password'])) {
        			$user_id = $array['id'];
        			$_SESSION['id'] = $user_id;
        			$_SESSION['name'] = $array['username'];
        			$_SESSION['password'] = $array['password'];
                    // ($_SESSION['id']!="" && $_SESSION['name']!='')?include('View/index.html'):include('view/users/auth.php');
        			($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
                } else include('view/users/auth.php');
            }
            // else include('view/users/auth.php');
        } break;
        case "projects": 
        case "offers": {
            ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
        } break;
        case "exit": {
            if(isset($_SESSION['id'],$_SESSION['name'],$_SESSION['password']))
                unset($_SESSION['name'],$_SESSION['id'],$_SESSION['password']);
            include('view/users/auth.php');
        } break;
        // case "site": {
        //     ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/unicreo_com.php'):include('view/users/auth.php');
        // } break;
        default: if(!isset($_SESSION['name'])) include('view/users/auth.php');
    }
}
elseif(!isset($_SESSION['name'])) include('view/users/auth.php');
    
    if(isset($_POST['btn-all-projects'])) {
        $uc = new Controller_Projects();
        $df = new Data_Formatter();
        $array = $uc->allProjects();
        include ('view/includes/form_top_button_panel.php');
        $view = $df->GetFormTable($array);
        echo $view;
    }
    // TODO !!!! delete-offers
    if(isset($_POST['deleteProjects']) && (isset($_POST['project']))) {
        $idsArray = $_POST['project'];
        $uc = new Controller_Projects();
        if($uc->deleteProjects($idsArray)) include 'view/includes/reloader.php';
    }

    if(isset($_POST['add-new-project'])) {
        $uc = new Controller_Projects();
       
       
        if($uc->addProject($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature'],$_FILES)) {
            var_dump($_FILES);
            $ds          = DIRECTORY_SEPARATOR;
            $storeFolder = 'uploads';
            if (!empty($_FILES)) {
                $tempFile = $_FILES['file']['tmp_name'];
                $fileName = $_FILES['file']['name'];
                $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;
                $targetFile =  $targetPath. $_FILES['file']['name'];
                move_uploaded_file($tempFile,$targetFile);
                insert('file_table',array('file_name' => $fileName));
            }

            include 'view/includes/reloader.php';
        }
    }
    
    include 'view/includes/admin_footer.php'; ?>
<!-- Javascript -->
<!-- Placed at the end of the document so the pages load faster -->
  <!-- // <script src="view/js/jquery.js"></script>  -->
  <!-- // <script src="view/js/bootstrap.min.js"></script>   -->
  <script>
//     $(function () {
//         $('input').on('change', function() {
//             var y = parseInt(0);
//               $('input').each(function(index){
//                     var x = parseInt($(this).val());
//                     if(isFinite(x)) y += x;
//                 })
//               $('.total').text(y);
//                // .filter().show();
//             })
//         // Portfolio slider & filter
//         $("#portfolio-slider").slick({
//           dots: true,
//           infinite: true,
//           slidesToShow: 4,
//           slidesToScroll: 4
//           });

//         var filtered = false;

//         $('.show-and-hide-content select').on('change', function() {
//             var x = $(this).find('option:selected').attr('data-type');
//             if(!(x)) {
//               $(".content").show();
//               $('#portfolio-slider').slick('slickUnfilter');
//               filtered = false;
//             } else {
//               $('#portfolio-slider').slick('slickFilter','.content-' + x);
//               filtered = true;
//             }
//         });

//     });

//     + function($) {
//     'use strict';
//     // UPLOAD CLASS DEFINITION
//     // ======================
//     var dropZone = $('#drop-zone');
//     // var uploadForm = $('js-upload-form');

//     var startUpload = function(files) {
//         console.log(files)
//     }

//     // dropZone.on('click', function(e) {
//     //     var uploadFiles = $('#js-upload-files').files;
//     //     e.preventDefault()
//     //     startUpload(uploadFiles)
//     // })

//     dropZone.ondrop = function(e) {
//         e.preventDefault();
//         this.className = 'upload-drop-zone';
//         startUpload(e.dataTransfer.files)
//     }

//     dropZone.ondragover = function() {
//         this.className = 'upload-drop-zone drop';
//         return false;
//     }

//     dropZone.ondragleave = function() {
//         this.className = 'upload-drop-zone';
//         return false;
//     }

// }(jQuery);
</script>

</body>
</html>