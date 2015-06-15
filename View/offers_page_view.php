<?php
	$html = '';
	foreach($array as $obj) {
        $images = [];
        $casesClass = '';
        $linkClass='';
        if($obj->link == '') {
            $linkClass = 'hide';
        }
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
include("offers_modal_view.php");
?>
<?php $html.=<<<HTML
<div class="panel-group" id="accordion" role="tablist" data-title="{$obj->title}" aria-multiselectable="true">
    <div class="panel panel-default"><div class="panel-heading" role="tab" id="heading{$obj->title}">
        <h4 class="panel-title"><input type="checkbox" name="offer[]" value="{$obj->id}" class="glyphicon glyphicon-unchecked"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse{$obj->id}" aria-expanded="false" aria-controls="collapse{$obj->id}">
        $obj->title
            <form action="{$_SERVER['PHP_SELF']}?route=offers" method="post" >
	            <div class="btn-group text-right" id="offers" role="group">
		            <button type="button" class="btn btn-info btn-sm" id="btn-admin-edit" data-toggle="modal" data-load-remote="UI-Tests/offer_page.html" data-remote-target="#offerModal .modal-body"><span title="Edit Offer" class="fa fa-pencil"></span></button>
		            <button type="button" class="btn btn-default btn-sm" id="btn-admin-show"><span title="Generate Preview Link" class="fa fa-arrows-alt" data-toggle="modal" data-target="#offerModal"></span></button>
		            <button type="submit" name="deleteProjects" value="" title="Delete Offer"class="btn btn-danger btn-sm" id="btn-admin-delete" data-id="{$obj->id}"><span class="fa fa-trash delete-one"></span></button>
	            </div>
            </form>
        </h4>
        </div>
	    <div id="collapse{$obj->id}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{$obj->id}">
		    <div class="panel-body" data-description="{$obj->description}">
			    <section class='col-md-8 col-md-offset-1 offer-content'>
				    <h5 class='offer-title'>$obj->title<a href='#' class="{$linkClass}" data-value="{$obj->link}"><span class='fa fa-file-o'></span>$obj->link</a></h5><div><h5>Description:</h5><p>$obj->description</p></div>
				    <div class="{$casesClass}"><h5>Related Cases</h5>
				        <div class="img-list">
HTML;
$t = 0;
foreach ($images as $imgName) {
$html.=<<<HTML
			            <span class="li-imgs pull-left"><img src="uni_imgs/{$imgName}"></span>
HTML;
}
$html.=<<<HTML
				        </div>
				    </div>
				    <div class=""><h5>Estimation</h5>
				        <div class="offer-task-list"><ul>
HTML;
$t = 0;
foreach ($estimation as $key => $value) {
$n = $value['1'];$h = $value['2'];$c = $value['3'];$t += $h*$c;
$html.=<<<HTML
				            <li class="clearfix"><span class="o-task pull-left">$n</span><span class="pull-right text-left"><mark class="o-hrs o-num">$h</mark>&times;<mark class="o-cost o-num">$c \$</mark></span></li>
HTML;
}
$html.=<<<HTML
				            <li class="clearfix"><span class="o-task o-total pull-left">Total:</span><span class="o-hrs o-num"></span>  <mark class="o-cost o-total-cost o-num pull-right">$t \$</mark></li>
				        </ul>
				        </div>
				    </div>
			    </section>
		    </div>
	    </div>
    </div>
</div>

HTML;
}
echo $html;
?>