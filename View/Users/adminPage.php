<?php 
if(isset($_GET['route']) && $_GET['route'] == 'auth') echo "<script>window.location = 'http://localhost:8888/cmstest/index.php?route=projects'</script>";
require_once('controller/projects/controller_projects.php');
require_once('controller/offers/controller_offers.php');

require_once('model/projects/data_formatter.php');
// require_once('model/offers/offers_data_formatter.php');

    $df; $array = [];
    
    if(isset($_GET['route'])) {
        $type = ucfirst($_GET['route']);

        include ('view/includes/section_add_edit_'.lcfirst($type).'.php');
        $controller_name = 'Controller_'.$type;
        $form_data_name = $type.'_Data_Formatter';
        $action_name = 'all'.$type;
        $array = new $controller_name;
        $array = $array->$action_name();
        if(lcfirst($type) == 'projects') {
            $fd = new $form_data_name;
            echo $fd->GetFormTable($array);
        } else 
            include ('view/'.lcfirst($type).'_page_view.php');



}
?>
<!-- '".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]."?route=projects'</script>"; -->
<!-- // session_start();
// if (isset($_SESSION['name']) and isset($_SESSION['id'])){
// 	if($_SESSION['name'] == 'admin'){
//         echo "<h1 style='text-align: center;'>HELLO, ".$_SESSION['name']."!!!!</h1>";
//         include 'view/users/showProposal.php';
//         include 'view/users/showUsers.php';
//         include 'view/words/showWords.php';
//         include 'view/words/newBook.php';
//         include 'view/words/allAuthors.php';
//         include 'view/users/exit.php';
// echo<<<_END
// <html>
// <head>
// <title>adminPage</title>
// <style>
// body{
//     background-color: #FFFFE0;
//    }
// </style>
// </head>
// <body>
// </body>
// </html>
// _END;
// }} -->