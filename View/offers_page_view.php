<?php
	$html = '';
    for ($i = 0; $i < count($array); $i++) {
        $obj = $array[$i];
        $images = '';
        $sliderClass = '';
        $linkClass='';
        if($obj->link == '') {
            $linkClass = 'hide';
        }
        if(isset($obj->images) && count($obj->images) == 0) {
            $sliderClass = ' hide';
        } else {
            // $images = $this->GetImgsPanel();
        }
?>
<?php $html.=<<<HTML

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default"><div class="panel-heading" role="tab" id="heading{$obj->title}">
        <h4 class="panel-title"><input type="checkbox" name="offer[]" value="{$obj->id}" class="glyphicon glyphicon-unchecked"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse{$obj->id}" aria-expanded="false" aria-controls="collapse{$obj->id}">
        $obj->title</a>
            <form action="{$_SERVER['PHP_SELF']}?route=projects" method="post" >
	            <div class="btn-group text-right" id="offers" role="group">
		            <button type="submit" class="btn btn-info btn-sm" id="btn-admin-edit"><span title="Edit Offer" class="fa fa-pencil"></span></button>
		            <button type="submit" class="btn btn-default btn-sm" id="btn-admin-hide"><span title="Generate Preview Link" class="fa fa-slack"></span></button>
		            <button type="submit" name="deleteProjects" value="" title="Delete Offer"class="btn btn-danger btn-sm" id="btn-admin-delete" data-id="{$obj->id}"><span class="fa fa-trash delete-one"></span></button>
	            </div>
            </form>
        </h4>
        </div>
	    <div id="collapse{$obj->id}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{$obj->id}">
		    <div class="panel-body">
			    <section class='col-md-8 col-md-offset-2 offer-content'>
				    <h5 class='offer-title'>Title:<label for="h5" class="{$linkClass}"><span class='fa fa-file-o'></span><a href='#' >$obj->link</a></label><p>$obj->title</p></h5><div><h5>Description:</h5><p>$obj->description</p></div>
				    <div class="{$linkClass}"><h5>Related Cases</h5>
				        <div class="img-list">
				            <span class="li-imgs pull-left"><img src="holder.js/150x150"></span>
				            <span class="li-imgs pull-left"><img src="holder.js/150x150"></span>
				            <span class="li-imgs pull-left"><img src="holder.js/150x150"></span>
				        </div>
				    </div>
				    <div class=""><h5>Estimation</h5>
				        <div class="offer-task-list"><ul>
				            <li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 \$</span></li>
				            <li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 \$</span></li>
				            <li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 \$</span></li>
				        </ul></div>
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