<?php 
if(isset($_GET['route']) && $_GET['route'] == 'auth') echo "<script>window.location = 'http://localhost:8888/cmstest/index.php?route=projects'</script>";
require_once('controller/projects/controller_projects.php');
require_once('controller/offers/controller_offers.php');

    $df; $array = [];
    
    if(isset($_GET['route'])) {
        $type = ucfirst($_GET['route']);

        include ('view/includes/section_add_edit_'.lcfirst($type).'.php');
        $controller_name = 'Controller_'.$type;
        $action_name = 'all'.$type;
        $array = new $controller_name;
        $array = $array->$action_name();
        include ('view/'.lcfirst($type).'_page_view.php');
    }
?>
<!-- '".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]."?route=projects'</script>";
// echo<<<_END
// <html><head><title>adminPage</title>
// </head><body></body></html>
// _END; -->