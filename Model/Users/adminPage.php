<?php
require_once('controller/projects/controller_projects.php');
require_once('model/projects/data_formatter.php');
	class AdminPage {
		$uc = new Controller_Projects();
        $df = new Data_Formatter();
        $array = $uc->allProjects();
        include ('view/includes/form_top_button_panel.php');
        $view = $df->GetFormTable($array);
        echo $view;
	}
 ?>