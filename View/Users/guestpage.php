<?php
require_once('controller/offers/controller_offers.php');
require_once('helpers/offerAdapter.php');
if(isset($_GET['route']) && isset($_REQUEST['offer_id']) && $_GET['route'] == 'offer_to') {
    $id = $_REQUEST['offer_id'];
	$oc = new Controller_Offers();
	$obj = $oc->getOfferData($id);
	$html = '';
    $attachments = []; $cases = [];
    $casesClass = ''; $attachmentsClass = ''; $linkClass='';
    if($obj->link == ''){
        $linkClass = 'hide';
    }
    if(isset($obj->attachments) && !$obj->attachments) {
        $AttachmentsClass = ' hide';
    } else $attachments = $obj->attachments;
    if(isset($obj->cases) && !$obj->cases) {
        $casesClass = ' hide';
    } else $cases = $obj->cases;
    if(isset($obj->estimation)) {
    	$estim = $obj->estimation;
    	$estimation = [];
    	$task=[];$hrs=[];$cost=[];$total = 0;
    	if(is_array($estim))
    	foreach($estim as $key=>$value) {
    		array_push($estimation,$value);
		}
	}
	$ad = new offerAdapter();
	include($ad->offerSwitcher('preview'));
}
echo $html;
?>