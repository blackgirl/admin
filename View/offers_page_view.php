<?php
require_once('helpers/offerAdapter.php');
$ad = new offerAdapter();
	$html = '';
	foreach($array as $obj) {
        $images = [];
        $casesClass = '';
        $linkClass='';
        $u = strlen(dirname(dirname(__FILE__)));
        $obj->link = 'http://'.html_entity_decode($_SERVER['HTTP_HOST'].'/cmstest/offer_personal.html?'.$obj->id);
        // if($obj->link == '') {
        //     $linkClass = 'hide';
        // }
        if(isset($obj->images) && count($obj->images) == 0) {
            $casesClass = ' hide';
        } else {
            $images = $obj->images;
        }
        if(isset($obj->estimation)) {
        	$estim = $obj->estimation;
        	$estimation = [];
        	$task=[];$hrs=[];$cost=[];$total = 0;
        	if(is_array($estim))
        	foreach($estim as $key=>$value) {
        		array_push($estimation,$value);
			}
		}
include($ad->offerSwitcher('root'));
}
include 'view/includes/admin_header.php';
echo $html;
include 'view/includes/admin_footer.php';
?>