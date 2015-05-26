<?php
require_once('controller/projects/controller_projects.php');
require_once('model/projects/data_formatter.php');
        $uc = new Controller_Projects();
        $df = new Data_Formatter();
        $array = $uc->allProjects();
        include ('view/includes/form_top_button_panel.php');
        if(isset($_GET['route'])) { // Authorization
    $route = $_GET['route'];
    switch($route){
        case "offers": {include ('view/offer_page.php');} break;
        default: {$view = $df->GetFormTable($array);echo $view;} break;
    }
}
        
    

// session_start();
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
// }}
 ?>