$(document).ready( function() {
 
  // Add new project
  $('#btn-add-line').on('click', function() {
  	var input = $(".keyftrs").find("input:last");
  	var name = "new-project-feature[]";
  	var placeholder = "Add Feature";
  	addNewInputAfter(input, name,placeholder);
//   	$("<input/>", {
//   type:  "text",
//   name:   "new-project-feature[]",
//   class: "form-control",
//   placeholder: "Add Feature"
// }).insertAfter($(".keyftrs").find("input:last"));
  });

  $('.keyftrs input').keypress(function (e) {
  if (e.which == 13) {
  	e.preventDefault();
  	var input = $(".keyftrs").find("input:last");
  	var placeholder = "Add Feature";
    addNewInputAfter(input, name,placeholder);
  }
});
  function addNewInputAfter(element, name, placeholder,c) {
  	var className = c?"form-control"+c:"form-control";
  	$("<input/>", {
	  type:  "text",
	  name:  name?name:'',
	  class: className,
	  placeholder: placeholder?placeholder:''
	}).insertAfter(element?element:$('body'));
  }


  // FlexSlider
  $('.panel-title a').on('click', function() {
    //slider top navigation
	  $('.top-nav-content-slider-right').flexslider({
	    animation: "slide",
	    slideshow: false,
	    useCSS : false,
	    prevText: "",
	    nextText: "",
	    animationLoop: true 	
	  });


	  $('.top-nav-content-slider-right-no-text').flexslider({
	    animation: "slide",
	    slideshow: false,
	    useCSS : false,
	    prevText: "",
	    nextText: "",
	    animationLoop: true 	
	  }); 
	 

	  $('.top-nav-content-slider-left').flexslider({
	    animation: "slide",
	    slideshow: false,
	    useCSS : false,
	    prevText: "",
	    nextText: "",    
	    animationLoop: true 	
	  });
	 
	  
	 // center navig slider
	  $('.center-nav-content-slider').flexslider({
	    animation: "slide",
	    slideshow: true,
	    useCSS : false,
	    prevText: "",
	    nextText: "",    
	    animationLoop: true 	
	  });
	 
	 });
 });