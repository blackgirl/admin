<li class="hide content">
  <?php
    echo '<article class="span3 project" data-tags="'.$tagsList.'">'.
        '<div class="project-item-isotope">'.
        '<div class="project-image">'.
        '<img src="'.$img.'" alt="sdf"><span class="divider"></span>'.
        '<a href="'.$img.'" data-group="'.$id.'" class="media-link-1 galleryItem test">SHOW</a>'.
        '<a class="media-link-2" href="portfolio/route='.$title.'">DETAIL</a>'.
        '<a href="'.implode('" data-group="'.$id.'" class="galleryItem test"></a><a href="',$imgsArray).'" data-group="1" class="galleryItem test"></a>'.
        '</div><div class="project-text"><h5><a href="portfolio/route='.$title.'">'.$title.'</a></h5>'.
        $description;
  // foreach($content as $content_item) echo $content_item;
  ?>
        </div>             
    </div>
  </article>
</li> 