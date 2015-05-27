<?php
session_start();
ini_set('display_errors', 1);
require_once('controller/users/userController.php');
require_once('controller/projects/controller_projects.php');

require_once('model/projects/data_formatter.php');
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
    <script src="view/js/bootstrap-table.js"></script>
    <script src="view/js/jquery.flexslider-min.js"></script>
    <script src="view/js/admin_onload.js"></script>
    <script src="view/js/dropzone.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="view/css/bootstrap-table.css">
    <link rel="stylesheet" href="view/css/font-awesome.min.css">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/offer-page.css">
    <link rel="stylesheet" href="view/css/admin_page.css">
</head>
<body class="body-padding" id="AdminPage">
    <?php include 'view/includes/admin_header.php';
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
        			($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
                } else include('view/users/auth.php');
            }
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
        // case "offers": {
        //     ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/offerspage.php'):include('view/users/auth.php');
        // } break;
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
    if(isset($_REQUEST['ids_array'])) {
        $idsArray = $_REQUEST['ids_array'];
        $uc = new Controller_Projects();
        if($uc->deleteProjects($idsArray)) include 'view/includes/reloader.php';
    }

    if(isset($_POST['add-new-project'])) {
        $uc = new Controller_Projects();
       
        if($uc->addProject($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature'])) {
            require_once('helpers/uploader.php');
            include 'view/includes/reloader.php';
            }
    }

include 'view/includes/admin_footer.php'; ?>
</body>
</html>