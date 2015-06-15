<?php
	$html = '';
    foreach($array as $obj) {
        $images = []; $sliderClass = '';
        if(isset($obj->images) && !$obj->images) {
            $images[] = "placeholder.png";
        } else {
            $images = $obj->images;
        }
        $ndaClass = '';
        if(isset($obj->nda) && $obj->nda) $ndaClass = 'nda';
        $url = '';
        if(isset($obj->link) && $obj->link) $url = $obj->link;
        $futures = []; $futureClass = '';
        if(isset($obj->keyftrs) && !count($obj->keyftrs)) $futureClass = 'hide';
        else $futures = $obj->keyftrs;
        $tag = [];$expertisesClass='';
        if(isset($obj->expertises) && count($obj->expertises)) $tag = $obj->expertises;
        else $expertisesClass = 'hide';
        $tags = []; $technologiesClass = '';
        if(isset($obj->technologies) && count($obj->technologies)) $tags = $obj->technologies;
        else $technologiesClass = 'hide';
?>
<?php $html.=<<<HTML
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><div class="panel panel-default {$ndaClass}"><div class="panel-heading" role="tab" id="heading{$obj->title}"><h4 class="panel-title"><input type="checkbox" name="project[]" value="{$obj->id}" class="glyphicon glyphicon-unchecked"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse{$obj->id}" aria-expanded="false" aria-controls="collapse{$obj->id}">$obj->title<strong title="NDA">*</strong></a><form action="{$_SERVER['PHP_SELF']}?route=projects" method="post" ><div class="btn-group text-right" id="projects" role="group"><button type="submit" class="btn btn-info btn-sm" id="btn-admin-edit"><span class="fa fa-pencil"></span></button><button type="submit" class="btn btn-default btn-sm" id="btn-admin-hide"><span class="fa fa-eye-slash" data-id="{$obj->id}"></span></button><button type="submit" name="deleteProjects" value=" " class="btn btn-danger btn-sm" id="btn-admin-delete" data-id="{$obj->id}"><span class="fa fa-trash delete-one"></span></button></div></form></h4></div><div id="collapse{$obj->id}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{$obj->id}"><div class="panel-body"><section class='col-md-12'><div class='col-md-8'><h5 class='col-md-8 col-lg-11 project-title'>$obj->title<a href="{$url}">$url</a></h5><div class='col-md-8 col-lg-11'><h5>Description:</h5><p>$obj->description</p></div><div class="col-md-8 col-lg-11 {$futureClass}"><h5>Key Futures:</h5><blockquote><ul>
HTML;
?>
<?php
for($i=0;$i<count($futures);$i++) {
$html.=<<<HTML
<li>$futures[$i]</li>
HTML;
}
$html.=<<<HTML
</ul></blockquote>
</div>
<div class="col-md-12 col-lg-12 {$expertisesClass}"><span class="glyphicon glyphicon-briefcase"></span>
HTML;
foreach($tag as $key=>$value) {
$html.=<<<HTML
<span class="btn btn-info btn-xs tag {$value}">$value</span>
HTML;
}
$html.=<<<HTML
</div><div class='col-md-12 col-lg-12 {$technologiesClass}'><span class="glyphicon glyphicon-wrench"></span>
HTML;
foreach($tags as $key=>$value) {
$html.=<<<HTML
<span class="btn btn-info btn-xs tag {$value}">$value</span>
HTML;
}
$html.=<<<HTML
</div></div><div class="col-lg-4 {$sliderClass}"><h5>Project Images</h5><div class="img-list">
HTML;
$t = 0;
foreach ($images as $imgName) {
$html.=<<<HTML
<a class="col-md-6 li-imgs " href="uni_imgs/{$imgName}"><img src="uni_imgs/{$imgName}"></a>
HTML;
}
$html.=<<<HTML
</div></div></section>
</div></div></div></div>
HTML;
}
echo $html;
?>