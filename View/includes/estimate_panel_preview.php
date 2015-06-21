<?php $html.=<<<HTML
<body id="OfferPage"><div class="wrapper"><header id="home"><nav class="navbar navbar-top" role="navigation"><div class="navbar-inner"><div class="container"><a href= "#" class="back-to-top"><img src="view/img/logo_big.png " alt="logo" class="logo"></a><ul class="nav"><li class="active"><div class="nav-download"><i class="fa fa-download"></i><a href="index.html" title="">Download as <span class="pdf">PDF</span></a></div></li></ul><section class="title"><div class="header-title"><span>OFFER TO </span><span class="fb">$obj->title</span></div></section><section class="content"><div class="offer-content"><div class="offer-project"><div class="preject-title"><span>$obj->title</span></div><div class="project-info"><article class="row overview"><div class="overview-content clearfix"><div class="overview-icon"><i class="fa fa-file-text-o animated rotateIn" data-type="rotateIn" style="visibility: visible;"></i></div><h4 class="overview-title">Overview</h4><p>$obj->description</p></div></article></div>
<article class="row overview cases"><div class="overview-content clearfix"><div class="overview-icon"><i class="fa fa-cog animated rotateIn" data-type="rotateIn" style="visibility: visible;"></i></div>
<h4 class="overview-title">Related cases</h4><div class="overview-imgs col-md-10"><section class="row" id="portfolio-items">
<ul class="portfolio" id="portfolio-slider">
HTML;
$t = 0;
foreach ($cases as $src) {
	// $projectPath = RemoveFileType($src);
$html.=<<<HTML
    <li><article class="col-md-4 project" data-tags="photography,technology"><div class="project-item-isotope"><div class="project-image">
    <a href="{}"><img class="project-case-image" src="{$src}" alt="sdf"></a></div></div></article></li>
HTML;
}
$html.=<<<HTML
</ul></section></div><h4 class="overview-title">Attachments</h4><div class="overview-imgs col-md-10"><section class="row" id="portfolio-items"><ul class="portfolio" id="portfolio-slider">
HTML;
$t = 0;
foreach ($attachments as $attached) {
	$attachedName = $attached['file_name'];
	$attachedType = strtoupper(GetFileType($attached['file_type']));
$html.=<<<HTML
    <li><article class="col-md-4 project" data-tags="photography,technology"><div class="project-item-isotope"><div class="project-image">
    <img src="view/img/file_types/{$attachedType}.png" data-url="uni_uploads/{$attachedName}" alt="sdf"></div></div></article></li>
HTML;
}
$html.=<<<HTML
</ul></section></div></div></article></div></div><div class="offer-estimate"><div class="estimation-title"><span>Estimation</span></div><div class="estimation-content"><div class="table-responsive"><table class="table table-bordered">
	<thead><tr><th>TASK</th><th>ESTIMATED HRS</th><th>$</th></tr></thead><tbody>
HTML;
$t = 0;
foreach ($estimation as $key => $value) {
$n = $value['1'];$h = $value['2'];$c = $value['3'];$t += $h*$c;
$html.=<<<HTML
    <tr><td class="task"><span>$n</span></td><td class="hrs"><span>$h</span></td><td class="price"><span>$c</span></td></tr>
HTML;
}
$html.=<<<HTML
</tbody><tfoot><tr class="total-row"><td>Total</td><td>&nbsp;</td><td class="total">$t</td></tr></tfoot></table></div></div></div></div></section><div class="offer-footer"></div></div></body></html>
HTML;
?>