<?php
    if(isset($_GET['route'])) { // Authorization
        $route = $_GET['route'];
        switch($route){
            case "auth": {
                // echo "Came into case:AUTH of index.php Router";
                if(isset($_POST['login']) && $_POST['login']!="" && $_POST['password']!="") { 
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
            case "www": {
                ($_SESSION['id']!="" && $_SESSION['name']!='')?include('site.php'):include('view/users/auth.php');
            } break;

            default: if(!isset($_SESSION['name'])) include('view/users/auth.php');
        }
    }
    elseif(!isset($_SESSION['name'])) include('view/users/auth.php');

    if(isset($_REQUEST['action'])) {
        $action_type = $_REQUEST['action'];

        if(isset($_GET['route'])) {
            $type = ucfirst($_GET['route']);
            $controller_name = "Controller_".$type;
        }
        $uc = new $controller_name;

        switch($action_type) {
            case "delete": {
                if(isset($_REQUEST['ids_array'])) {
                    $idsArray = $_REQUEST['ids_array'];
                    $action_name = "delete".$type;
                    $uc->$action_name($idsArray);
                }
            } break;
            // case "add": {
            //     if(isset($_REQUEST['ids_array'])) {
            //         $action_name = ($type == 'projects')?'addProject':'addOffer';
            //         if($action_name == 'projects')
            //             if(strlen($_POST['new-project-title']) && strlen($_POST['new-project-description']))
            //                 if ($uc->$action_name($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature']))
            //                     require_once('helpers/uploader.php');
            //         if($action_name == 'offers')
            //             if(strlen($_REQUEST['ids_array']['new-offer-title']) && strlen($_REQUEST['ids_array']['new-offer-description']))
            //                 $uc->$action_name($_REQUEST['ids_array']['new-offer-title'],$_REQUEST['ids_array']['new-offer-url'], trim($_REQUEST['ids_array']['new-offer-description']),$_REQUEST['ids_array']['estimation'], $_REQUEST['ids_array']['total']);
            //     }
            // } break;
            case "edit": {} break;
        }
    }
    if(isset($_POST['add-new-project'])) {
        $uc = new Controller_Projects();
        $expertises;
        $technologies;
        if(isset($_POST['expertises']) && is_array($_POST['expertises'])) $expertises = implode(',',$_POST['expertises']);
        if(isset($_POST['technologies']) && is_array($_POST['technologies'])) $technologies = implode(',',$_POST['technologies']);
        if($uc->addProject($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature'],$technologies,$expertises)) {
            require_once('helpers/uploader.php');
            include 'view/includes/reloader.php';
            }
    }
    if(isset($_POST['add-new-offer'])) {
        $postEstimation = $_POST['estim'];
        $estimation = ['task'=>'','hours'=>NULL,'cost'=>NULL];
        foreach($postEstimation as $k) {
            print_r( $k); echo '>>>' ; print_r($postEstimation[$k]);
            // array_push($estimation, ['task'=>$k,'hours'=>$k['esti-hrs'],'cost'=>$k['esti-cost']]);
        }
        $oc = new Controller_Offers();
        if($oc->addOffer($_POST['new-offer-title'], trim($_POST['new-offer-description']),$_POST['new-offer-url'],$estimation)) {
            require_once('helpers/uploader.php');
            // include 'view/includes/reloader.php';
        }
    }
?>