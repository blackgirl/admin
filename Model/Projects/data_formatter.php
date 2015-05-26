<?php
	class Data_Formatter {
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
				return "<li class='li-imgs'>\n<img src='".implode("'></li><li><img src='",$dataArray)."'></button></li>";
        	}
        }
	           
        function GetFormTable($dataArray) {
	        $formTable = '';
	        for ($i = 0; $i < count($dataArray); $i++) {
	            $obj = $dataArray[$i];
	            $sliderClass = '';
	            if(count($obj->images) == 0) $sliderClass = ' hide';
	            $view = "<section col-md-12><div class='col-md-4".$sliderClass."'>".
	                $this->GetImgsSlider($obj->images)."</div><h5 class='col-md-8'>".
	                $obj->title.' '.$this->GetLink($obj->link)."</h5><div class='col-md-8'><h5>Description:</h5><p>".$obj->description."</p></div><div class='col-md-8'><h5>Key Futures:</h5><blockquote>".$this->GetKeyFeatures(explode("|",$obj->keyftrs))."</blockquote></div><div class='col-md-8'>".
	                $this->GetTagList($obj->expertises, 'glyphicon-briefcase')."</div><div class='col-md-8'>".
	                $this->GetTagList($obj->technologies, 'glyphicon-wrench')."</div></section>";
	            $formTable .= $this->MadeCollapsedPanel($view,$obj->title,$obj->id);
	        }
            return $formTable;
	        // return $formTable.'</form>';
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
        			  '<h4 class="panel-title"><input type="checkbox" name="project[]" value="'.$id.'" class="glyphicon glyphicon-unchecked"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$id.'" aria-expanded="false" aria-controls="collapse'.$id.'">'.
        			  $title.'</a></h4></div><div id="collapse'.$id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$id.'">'.
      				  '<div class="panel-body">'.$panelContent.'</div></div></div></div>';
        }
        function GetButtonGroup($type = '') {
        	// switch($type)
        	return '<div class="btn-group" role="group" aria-label="...">'.
        			 '<button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus"></span></button>'.
        			 '<button type="button" class="btn btn-info btn-sm disabled"><span class="glyphicon glyphicon-pencil"></span></button>'.
        			 '<button type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-eye-close"></span></button>'.
        			 '<button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button></div>';
        }
	}
?>