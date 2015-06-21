<?php
require_once('helpers/offerAdapter.php');
$ad = new offerAdapter();
	$html = '';
	foreach($array as $obj) {
        $attachments = []; $cases = [];
        $casesClass = ''; $attachmentsClass = ''; $linkClass='';
        
        $u = strlen(dirname(dirname(__FILE__)));
        $obj->link = 'http://'.html_entity_decode($_SERVER['HTTP_HOST'].'/cmstest/offer_personal.html?'.$obj->id);
        
        if(isset($obj->attachments) && count($obj->attachments) == 0) $attachmentsClass = ' hide';
        else $attachments = $obj->attachments;

        if(isset($obj->cases) && count($obj->cases) == 0) $casesClass = 'hide';
        else $cases = $obj->cases;

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