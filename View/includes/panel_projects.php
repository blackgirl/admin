	<form action="index.php" method="post">
<?php
        $this->GetButtonGroup('projects');
        				 
	        for ($i = 0; $i < count($dataArray); $i++) {
	            $obj = $dataArray[$i];
	           
	            // $sliderClass = '';
	            // if(count($obj->images) == 0) $sliderClass = ' hide';
	            <section class="col-md-12"><div class='col-md-2 <?php $sliderClass ?>'>
	                <?php $this->GetImgsSlider($obj->images) ?></div><p class='col-md-8'>
	                <?php $obj->title ?><small><?php $this->GetLink($obj->link) ?></small></p>
	                <p class='col-md-8'> <?php $obj->description ?></p>
	                <div class='col-md-8'>Key Futures:<blockquote> <?php $this->GetKeyFeatures(explode("|",$obj->keyftrs)); ?></blockquote></div>
	                <div class='col-md-8'>
	                	<?php $tagList = '';
			        	if(count($obj->technologies)) {
				        	$tagList = '<span class="glyphicon glyphicon-wrench"></span>';
			        		foreach($obj->technologies as $tag) {
			        			$tagList .= '<button type="button" class="btn btn-info btn-xs tag '.$tag['value'].'">'.$tag['text']."</button>";
			        		}
			        	}
			        	?>
			        </div>
	                <div class='col-md-8'>
	                	<?php $tagList = '';
			        	if(count($obj->expertises)) {
				        	$tagList = '<span class="glyphicon glyphicon-briefcase"></span>';
			        		foreach($obj->expertises as $tag) {
			        			$tagList .= '<button type="button" class="btn btn-info btn-xs tag '.$tag['value'].'">'.$tag['text']."</button>";
			        		}
			        	}
			        	?>
	                </div>
	                </section>;
	            $formTable .= $this->MadeCollapsedPanel($view,$obj->title);
	        }
?>