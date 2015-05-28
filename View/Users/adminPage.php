<?php
require_once('controller/projects/controller_projects.php');
require_once('controller/offers/controller_offers.php');
require_once('model/projects/data_formatter.php');
require_once('model/offers/offer_data_formatter.php');

        
        $df; $array = [];
        
        if(isset($_GET['route'])) {
            $route = $_GET['route'];

            switch($route){
                case "offers": {
                    // include ('view/includes/offers_top_button_panel.php');
                    include ('view/includes/section_add_edit_offer.php');
                    $oc = new Controller_Offers();
                    $df = new Offer_Data_Formatter();
                    $array = $oc->allOffers();
                    $view = $df->GetFormTable($array);
                    echo $view;
                } break;
                default: {
                    // include ('view/includes/form_top_button_panel.php');
                    include ('view/includes/section_add_edit_project.php');
                    $uc = new Controller_Projects();
                    $df = new Data_Formatter();
                    $array = $uc->allProjects();
                    $view = $df->GetFormTable($array);
                    echo $view;
                } break;
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