<?php
	class Offers_Data_Formatter {
		public $id;
        public $title;
        public $link;

        function __construct() {
            
        }
        function GetLink($url) {
            return '<a href="'.urlencode($url).'">'.$url.'</a>';
        }
        function GetImagesList($dataArray) {
        	if(count($dataArray)) {
				return "<li class='li-imgs'>\n<img src='uni_imgs/".implode("'></li><li><img src='uni_imgs/",$dataArray)."'></button></li>";
        	}
        }
	    function getEstimationList() {
            return '<div class="offer-task-list"><ul>'.
            '<li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 $</span></li>'.
            '<li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 $</span></li>'.
            '<li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 $</span></li>'.
            '<li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 $</span></li>'.
            '<li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 $</span></li>'.
            '<li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 $</span></li>'.
            '<li><span class="o-task">Sample estimation task</span><span class="o-hrs o-num">8 hrs</span> x <span class="o-cost o-num">100 $</span></li>'.
            '</ul></div>';
        }
        function GetFormTable($dataArray) {
	        $formTable = '';
	        for ($i = 0; $i < count($dataArray); $i++) {
	            $obj = $dataArray[$i];
            	$images = '';
            	$sliderClass = '';
                $linkClass='';
                if($obj->link == '') {
                    $linkClass = 'hide';
                }
	            if(isset($obj->images) && count($obj->images) == 0) {
	            	$sliderClass = ' hide';
	            } else {
	                $images = $this->GetImgsPanel();
	            }
                // $this->GetLink($obj->link)
	            $view = "<section class='col-md-8 col-md-offset-2 offer-content'><h5 class=' offer-title'>Title:<label for='h5'".'class="'.$linkClass.'"><span class="fa fa-file-o"></span><a href="#" >'.$obj->link."</a></label><p>".$obj->title."</p></h5><div class=''><h5>Description:</h5><p>".$obj->description.'</p></div>'.
                    '<div class="'.$linkClass.'"><h5>Related Cases</h5>'. $this->GetImgsPanel().'</div>'.
                    '<div class=""><h5>Estimation</h5>'.$this->getEstimationList().
                    '</div></section>';
	            $formTable .= $this->MadeCollapsedPanel($view,$obj->title,$obj->id);
	        }
            return $formTable;
        }

        function GetImgsSlider($imgsArray) {
			return '<div class="center-nav-content-slider"><ul class="slides">'.$this->GetImagesList($imgsArray).'</ul></div>';
        }
        function GetImgsPanel() {
        // function GetImgsPanel($imgArray) {
            // return '<div class="img-list">'.$this->GetImagesList($imgsArray).'</div>';
            return '<div class="img-list">'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '<span class="li-imgs pull-left"><img src="holder.js/150x150"></span>'.
            '</div>';
        }
        function GetTagList($tagsArray, $class) {
        	$tagList = '<span class="glyphicon '.$class.'"></span>';
        		foreach($tagsArray as $tag) {
        			$tagList .= '<button type="button" class="btn btn-info btn-xs tag '.$tag['value'].'">'.$tag['text']."</button>";
        		}
        	return $tagList;
        }
        function GetKeyFeatures($featuresArray) {
        	return '<ul><li>'.implode('</li><li>', $featuresArray).'</li></ul>';
        }
        function MadeCollapsedPanel($panelContent,$title,$id) {
        	return '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">'.
        		      '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading'.$title.'">'.
        			    '<h4 class="panel-title"><input type="checkbox" name="offer[]" value="'.$id.'" class="glyphicon glyphicon-unchecked"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$id.'" aria-expanded="false" aria-controls="collapse'.$id.'">'.
        			    $title.'</a>'.
                            '<form action="index.php?route=projects" method="post" ><div class="btn-group text-right" id="offers" role="group">'.
                            '<button type="submit" class="btn btn-info btn-sm" id="btn-admin-edit"><span title="Edit Offer" class="fa fa-pencil"></span></button>'.
                            '<button type="submit" class="btn btn-default btn-sm" id="btn-admin-hide"><span title="Generate Preview Link" class="fa fa-slack"></span></button>'.
                            '<button type="submit" name="deleteProjects" value=" " title="Delete Offer"class="btn btn-danger btn-sm" id="btn-admin-delete" data-id="'.$id.'"><span class="fa fa-trash delete-one"></span></button>'.
                            '</div></form></h4>'.
                        '</div><div id="collapse'.$id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$id.'">'.
      				'<div class="panel-body">'.$panelContent.'</div></div></div></div>';
        }

    }
?>