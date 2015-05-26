<?php

class View {
	//public $template_view; //  Default view for all.
	/* $content_file - View file of content-page;
	$template_file - View included the same elements for all pages;
	$data - [array] Contain all data needed to fill $content_file; */
	function generate($content_view, $template_view, $data = null) {
		/* if(is_array($data)) {
			// Convert array's elements to variables
			extract($data);
		} */
		include 'views/'.$template_view;
	}
}
