<?php
    require_once('controller/users/userController.php');
    require_once('general_helper.php');
    if(isset($_GET['route'])) {
        $route = $_GET['route'];
        switch($route){
            case "auth": {
                if(isset($_POST['login']) && $_POST['login']!="" && $_POST['password']!="") { 
                    $uc = new userController();
                    if($array = $uc->auth($_POST['login'], $_POST['password'])) {
            			$user_id = $array['id'];
            			$_SESSION['id'] = $user_id;
            			$_SESSION['name'] = $array['username'];
            			$_SESSION['password'] = $array['password'];
                        ($_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
                    } else include('view/users/auth.php');
                } else if(isset($_SESSION['id'],$_SESSION['name'],$_SESSION['password'])){
                    include('view/users/adminpage.php');
                }
            } break;
            case "projects": 
            case "offers": {
                (isset($_SESSION['id']) && $_SESSION['id']!="" && $_SESSION['name']!='')?include('view/users/adminpage.php'):include('view/users/auth.php');
            } break;
            case "offer_to": {include('view/users/guestpage.php');} break;
            case "exit": {
                if(isset($_SESSION['id'],$_SESSION['name'],$_SESSION['password']))
                    unset($_SESSION['name'],$_SESSION['id'],$_SESSION['password']);
                include('view/users/auth.php');
            } break;
            // case "www": {
            //     ($_SESSION['id']!="" && $_SESSION['name']!='')?include('site.php'):include('view/users/auth.php');
            // } break;
            case "mail_to": {
                if(isset($_REQUEST['mail_text'])) {
                    // @mail('a.chornaya@gmail.com', 'Offer Page Visit', $_REQUEST['mail_text'],'From: la_nube@mail.ru');
                    $mailto = 'a.chornaya@gmail.com';$header = "From: Alyona <la_nube@mail.ru>\r\n";
                    $header .= "Reply-To: ".$replyto."\r\n";$subject='Offer Page Visit';
                    $header .= "MIME-Version: 1.0\r\n";$is_sent = @mail($mailto, $subject, $_REQUEST['mail_text'], $header);
                }
            }
            case "404": {
                include('view/404.html');
            } break;
            default: if(!isset($_SESSION['name'])) include('view/users/auth.php');
        }
    } elseif(!isset($_SESSION['name'])) include('view/users/auth.php');
    else include('view/404.html');

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
            case "hide": {
                if(isset($_REQUEST['nda_id'])) {
                    $id = $_REQUEST['nda_id'];
                    $uc->hideProject($id);
                }
            } break;
            case "publish": {
                if(isset($_REQUEST['offer_id'])) {
                    $id = $_REQUEST['offer_id'];
                    $uc->publishLink($id);
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
        $expertises=''; $technologies='';
        if(isset($_POST['expertises']) && is_array($_POST['expertises'])) $expertises = implode(',',$_POST['expertises']);
        if(isset($_POST['technologies']) && is_array($_POST['technologies'])) $technologies = implode(',',$_POST['technologies']);
        if($uc->addProject($_POST['new-project-title'],$_POST['new-project-url'], trim($_POST['new-project-description']),$_POST['new-project-feature'],$technologies,$expertises)) {
            require_once('helpers/uploader.php');
            include('view/includes/reloader.php');
        }
    }
    if(isset($_POST['add-new-offer'])) {
        $oc = new Controller_Offers();
        $arr = isset($_POST['estim'])?$_POST['estim']:false;
        while (list($k,$v)=each($arr)) {
            if (is_array($v)) {
                array_splice($arr,$k,1,$v);
                next($arr);
            }
        }
        if(trim($_POST['new-offer-title']) && trim($_POST['new-offer-description']))
            if($oc->addOffer($_POST['new-offer-title'],$_POST['new-offer-url'],trim($_POST['new-offer-description']),$arr,false,false,$_POST['new-offer-cases'])) {
                require_once('helpers/uploader.php');
                include('view/includes/reloader.php');
            }
    }
    
?>