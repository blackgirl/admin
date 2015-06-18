<?php $html.=<<<HTML
<div class="panel-group" id="accordion" role="tablist" data-title="{$obj->title}" aria-multiselectable="true">
    <div class="panel panel-default"><div class="panel-heading" role="tab" id="heading{$obj->title}">
        <h4 class="panel-title"><input type="checkbox" name="offer[]" value="{$obj->id}" class="glyphicon glyphicon-unchecked"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse{$obj->id}" aria-expanded="false" aria-controls="collapse{$obj->id}">
        $obj->title
            <form action="{$_SERVER['PHP_SELF']}?route=offers" method="post" >
	            <div class="btn-group text-right" id="offers" role="group">
		            <button type="submit" name="deleteProjects" value="" title="Delete Offer"class="btn btn-danger btn-sm" id="btn-admin-delete" data-id="{$obj->id}"><span class="fa fa-trash delete-one"></span></button>
		            <a role="button"tabindex="1" data-container="form" data-toggle="popover"rel="popover" data-placement="left"title="<span>Offer page link</span><span class='kbd-text pull-right'><kbd><kbd>Ctrl</kbd>+<kbd>C</kbd></kbd></span>" data-html="true" data-content="<a href='{$obj->link}'>{$obj->link}</a>" id="btn-admin-link" class="btn btn-sm fa fa-link"></a>
	            </div>
            </form>
        </h4>
        </div>
	    <div id="collapse{$obj->id}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{$obj->id}">
		    <div class="panel-body" data-description="{$obj->description}">
			    <section class='col-md-8 col-md-offset-1 offer-content'>
				    <h5 class='offer-title'>Offer to «{$obj->title}»<span class='fa fa-file-o'></span><a href="{$obj->link}" class="offer-title-link {$linkClass}" data-value="{$obj->link}">Preview offer <span class="fa fa-long-arrow-right"></span></a></h5><div><h5>Description:</h5><p>$obj->description</p></div>
				    <div class="{$casesClass}"><h5>Related Cases</h5>
				        <div class="img-list">
HTML;
$t = 0;
foreach ($images as $imgName) {
$html.=<<<HTML
			            <a class="li-imgs pull-left col-md-6" href="uni_imgs/{$imgName}"><img src="uni_imgs/{$imgName}"></a>
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
?>