<?php
session_start();
ini_set('display_errors', 1);
require_once('controller/users/userController.php');
require_once('controller/projects/controller_projects.php');
require_once('controller/offers/controller_offers.php');
require_once('helpers/validator.php');
?>
<!-- <!DOCTYPE html> -->
<html>
<head>
    <meta charset="utf-8">
    <title>| UniRoot |</title>
    <!-- Favicon -->
    <link href="view/img/favicon.png" rel="icon" type="image/png">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <!-- <script src="view/js/bootstrap-table.js"></script> -->
    <script src="view/js/jquery.flexslider-min.js"></script>
    <script src="view/js/admin_onload.js"></script>
    <script src="view/js/dropzone.js"></script>
    <script src="view/js/holder.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="view/css/bootstrap-table.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/offer-page.css">
    <link rel="stylesheet" href="view/css/admin_page.css">
  <!-- SITE STUFF
  <script src="view/js/owl.carousel.min.js"></script>
  <script src="view/js/jquery.isotope.min.js"></script> -->   
    <!-- Javascript -->
    <!-- Placed at the end of the document so the pages load faster -->
  <!--<script src="view/js/jquery.js"></script> 
  <script src="view/js/bootstrap2.min.js"></script>  
  <script src="view/js/jquery.easing.js"></script>   
  <script src="view/js/jquery.flexslider-min.js"></script>
  <script src="view/js/sly.js"></script>
  <script src="view/js/jquery.refineslide.js"></script>      
  <script src="view/js/jquery.fitvids.js"></script>
  <script src="view/js/jquery.appear.js"></script>  
  <script src="view/js/retina.js"></script>
  <script src="view/js/functions.js"></script>   
  <script src="view/js/respond.min.js"></script>  
  <script src="view/js/jquery.parallax-1.1.3.js"></script>
  <script src="view/js/jquery.meanmenu.2.0.min.js"></script>
  <script src="view/js/jquery.nicescroll.min.js"></script>
  <script src="view/js/jquery.magnific-popup.min.js"></script>
  <script src="view/js/jquery.zoom.js"></script>
  <script type="text/javascript" src="view/js/slick.js"></script>
  <script src="view/js/filter.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap.css">
    <link rel="stylesheet" href="view/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/style_new.css"> -->


</head>
<body class="body-padding" id="AdminPage">
<?php include 'view/includes/admin_header.php';
      include 'helpers/startRouter.php';

    // if(isset($_GET['route'])) { // Authorization
    //     $route = $_GET['route'];
    //     switch($route){
    //         case "auth": {
    //             // echo "Came into case:AUTH of index.php Router";
    //             if(isset($_POST['login']) && $_POST['login']!="" && $_POST['password']!="") { 
    //                 $uc = new userController();
    //                 if($array = $uc->auth($_POST['login'], $_POST['password'])) {
    //         			$user_id = $array['id'];
    //         			$_SESSION['id'] = $user_id;
    //         			$_SESSION['name'] = $array['username'];
    //         			$_SESSION['password'] = $array['password'];
    //                     ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
    //                 } else include('view/users/auth.php');
    //             }
    //         } break;

    //         case "projects": 
    //         case "offers": {
    //             ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
    //         } break;

    //         case "exit": {
    //             if(isset($_SESSION['id'],$_SESSION['name'],$_SESSION['password']))
    //                 unset($_SESSION['name'],$_SESSION['id'],$_SESSION['password']);
    //             include('view/users/auth.php');
    //         } break;
    //         case "www": {
    //             ($_SESSION['id']!="" && $_SESSION['name']!='')?include('site.php'):include('view/users/auth.php');
    //         } break;

    //         default: if(!isset($_SESSION['name'])) include('view/users/auth.php');
    //     }
    // }
    // elseif(!isset($_SESSION['name'])) include('view/users/auth.php');

    // if(isset($_REQUEST['action'])) {
    //     $action_type = $_REQUEST['action'];

    //     if(isset($_GET['route'])) {
    //         $type = ucfirst($_GET['route']);
    //         $controller_name = "Controller_".$type;
    //     }
    //     $uc = new $controller_name;

    //     switch($action_type) {
    //         case "delete": {
    //             if(isset($_REQUEST['ids_array'])) {
    //                 $idsArray = $_REQUEST['ids_array'];
    //                 $action_name = "delete".$type;
    //                 $uc->$action_name($idsArray);
    //             }
    //         } break;
    //         // case "add": {
    //         //     if(isset($_REQUEST['ids_array'])) {
    //         //         $action_name = ($type == 'projects')?'addProject':'addOffer';
    //         //         if($action_name == 'projects')
    //         //             if(strlen($_POST['new-project-title']) && strlen($_POST['new-project-description']))
    //         //                 if ($uc->$action_name($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature']))
    //         //                     require_once('helpers/uploader.php');
    //         //         if($action_name == 'offers')
    //         //             if(strlen($_REQUEST['ids_array']['new-offer-title']) && strlen($_REQUEST['ids_array']['new-offer-description']))
    //         //                 $uc->$action_name($_REQUEST['ids_array']['new-offer-title'],$_REQUEST['ids_array']['new-offer-url'], trim($_REQUEST['ids_array']['new-offer-description']),$_REQUEST['ids_array']['estimation'], $_REQUEST['ids_array']['total']);
    //         //     }
    //         // } break;
    //         case "edit": {} break;
    //     }
    // }
    // if(isset($_POST['add-new-project'])) {
    //     $uc = new Controller_Projects();
    //     $expertises;
    //     $technologies;
    //     if(isset($_POST['expertises']) && is_array($_POST['expertises'])) $expertises = implode(',',$_POST['expertises']);
    //     if(isset($_POST['technologies']) && is_array($_POST['technologies'])) $technologies = implode(',',$_POST['technologies']);
    //     if($uc->addProject($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature'],$technologies,$expertises)) {
    //         require_once('helpers/uploader.php');
    //         include 'view/includes/reloader.php';
    //         }
    // }
    // if(isset($_POST['add-new-offer'])) {
    //     $postEstimation = $_POST['estim'];
    //     $estimation = ['task'=>'','hours'=>NULL,'cost'=>NULL];
    //     foreach($postEstimation as $k) {
    //         print_r( $k); echo '>>>' ; print_r($postEstimation[$k]);
    //         // array_push($estimation, ['task'=>$k,'hours'=>$k['esti-hrs'],'cost'=>$k['esti-cost']]);
    //     }
    //     $oc = new Controller_Offers();
    //     if($oc->addOffer($_POST['new-offer-title'], trim($_POST['new-offer-description']),$_POST['new-offer-url'],$estimation)) {
    //         require_once('helpers/uploader.php');
    //         // include 'view/includes/reloader.php';
    //     }
    // }

    include 'view/includes/admin_footer.php'; ?>
</body>
</html>