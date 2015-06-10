<?php
	class Projects_Data_Formatter {
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
                $sliderClass = '';
                $obj = $dataArray[$i];
                $images = array_filter($obj->images);
                if(count($images) == 0) $sliderClass = ' hide';
	            $view = "<section class='col-md-12'><div class='col-md-8'><h5 class='col-md-8 col-lg-11 project-title'>".
	                $obj->title.' '.$this->GetLink($obj->link)."</h5><div class='col-md-8 col-lg-11'><h5>Description:</h5><p>".$obj->description."</p></div><div class='col-md-8 col-lg-11'><h5>Key Futures:</h5><blockquote>".$this->GetKeyFeatures(explode("|",$obj->keyftrs))."</blockquote></div><div class='col-md-12 col-lg-12'>".
	                $this->GetTagList($obj->expertises, 'glyphicon-briefcase')."</div><div class='col-md-12 col-lg-12'>".
	                $this->GetTagList($obj->technologies, 'glyphicon-wrench')."</div></div><div class='col-md-4 col-lg-4".$sliderClass."'>".
                    $this->GetImgsSlider($images)."</div></section>";
	            $formTable .= $this->MadeCollapsedPanel($view,$obj);
	        }
            return $formTable;
        }

        function GetImgsSlider($imgsArray) {
			return '<div class="center-nav-content-slider"><ul class="slides">'.$this->GetImagesList($imgsArray).'</ul></div>';
        }
        function GetTagList($tagsArray, $class) {
            $tagList = '';
            if(count(array_filter($tagsArray)) == 0) return;
            else {
            	$tagList = '<span class="glyphicon '.$class.'"></span>';
            		for($i=0;$i<count($tagsArray);$i++) {
            			$tagList .= '<button type="button" class="btn btn-info btn-xs tag '.$tagsArray[$i].'">'.$tagsArray[$i]."</button>";
            		}
            	return $tagList;
            }
        }
        function GetKeyFeatures($featuresArray) {
        	return '<ul><li>'.implode('</li><li>', $featuresArray).'</li></ul>';
        }
        function MadeCollapsedPanel($panelContent,$obj) {
            $title = $obj->title;
            $id = $obj->id;
            $ndaClass = $obj->nda?'nda':'';
        	return '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">'.
        		        '<div class="panel panel-default '.$ndaClass.'"><div class="panel-heading" role="tab" id="heading'.$title.'">'.
        			    '<h4 class="panel-title"><input type="checkbox" name="project[]" value="'.$id.'" class="glyphicon glyphicon-unchecked"/><a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$id.'" aria-expanded="false" aria-controls="collapse'.$id.'">'.
        			    $title.'<strong title="NDA">*</strong></a>'.
                            '<form action="index.php?route=projects" method="post" ><div class="btn-group text-right" id="projects" role="group">'.
                            '<button type="submit" class="btn btn-info btn-sm" id="btn-admin-edit"><span class="fa fa-pencil"></span></button>'.
                            '<button type="submit" class="btn btn-default btn-sm" id="btn-admin-hide"><span class="fa fa-eye-slash"></span></button>'.
                            '<button type="submit" name="deleteProjects" value=" " class="btn btn-danger btn-sm" id="btn-admin-delete" data-id="'.$id.'"><span class="fa fa-trash delete-one"></span></button>'.
                            '</div></form></h4>'.
                        '</div>'.
                        '<div id="collapse'.$id.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading'.$id.'">'.
      				    '<div class="panel-body">'.$panelContent.'</div>'.
                    '</div></div></div>';
        }
	}
?>