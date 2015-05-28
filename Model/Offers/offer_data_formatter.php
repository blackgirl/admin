<?php
	class Offer_Data_Formatter {
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
	           
        function GetFormTable($dataArray) {
	        $formTable = '';
	        for ($i = 0; $i < count($dataArray); $i++) {
	            $obj = $dataArray[$i];
            	$images = '';
            	$sliderClass = '';
	            if(count($obj->images) == 0) {
	            	$sliderClass = ' hide';
	            } else {
	                $images = $this->GetImgsSlider($obj->images);
	            }
	            $view = "<section col-md-12><div class='col-md-4".$sliderClass."'>".$images.
	                "</div><h5 class='col-md-8'>".$obj->title.' '.$this->GetLink($obj->link)."</h5><div class='col-md-8'><h5>Description:</h5><p>".$obj->description."</p></div><div class='col-md-8'></div></section>";
	            $formTable .= $this->MadeCollapsedPanel($view,$obj->title,$obj->id);
	        }
            return $formTable;
        }

        function GetImgsSlider($imgsArray) {
			return '<div class="center-nav-content-slider"><ul class="slides">'.$this->GetImagesList($imgsArray).'</ul></div>';
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
        			  $title.'</a></h4></div><div id="collapse'.$id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$id.'">'.
      				  '<div class="panel-body">'.$panelContent.'</div></div></div></div>';
        }

    }
?>