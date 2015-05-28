$(document).ready( function() {
 
  // Add new project
  $('#btn-add-line').on('click', function() {
  	var input = $(".keyftrs").find("input:last");
  	var name = "new-project-feature[]";
  	var placeholder = "Add Feature";
  	addNewInputAfter(input, name,placeholder);
  });

  $('.glyphicon-unchecked').on('click',function(){
  	$(this).toggleClass('checked');
  })
  
  $('.glyphicon-trash').on('click',function(){
  	var a = [];
  	var type = $(this).closest('form').prop("action").indexOf('projects') > 0?'projects':'offers';
    
	  $('.glyphicon-unchecked.checked').each(function(){
	  	a.push( $(this).val());
	  });

	  	$.ajax({
	        type: "POST",  
	        url: "index.php?route="+type+"&type="+type,  
	        data: {'ids_array':a},
	        success: function(html){  
	            $("body").html(html);  
	        }
	    });  
        return false;
  });

  $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});
  $(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        var loaded = $('.image_loaded').html();
        $('.image_loaded').html(loaded + '<p>'+label+'</p>');
    });
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