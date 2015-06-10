$(document).ready( function() {

	/* Nav Active*/
	var pageName = $(document).find('form:first').prop('action');
	pageName = pageName.replace('http://localhost:8888/cmstest/index.php?route=','');
	$('nav li').removeClass('active');
	$('.to-'+pageName).addClass('active');
	
	/* Mark Item Checked */
	$('.glyphicon-unchecked').on('click',function(){
	  	$(this).toggleClass('checked');
	})

	/* Delete Item / Items */
	$('.fa-trash').on('click',function() {
	  	var a = [];
	  	var check = $('.glyphicon-unchecked.checked');
	  	var type = $(this).closest('.btn-group').prop("id");
	  	if( $(this).hasClass('delete-one')) {
	  		a.push($(this).closest('#btn-admin-delete').data('id'));
	  		check = $(this).closest('#btn-admin-delete');
	  	}
	  	else check.each(function() { a.push( $(this).val()); });
	  	$.ajax({
	        type: "POST",  
	        url: "index.php?route="+type,  
	        data: {'action':'delete','ids_array':a},
	        success: function(html){
	            check.each(function(){
	            	$(this).closest('.panel-group').fadeOut().remove();
	            });
	        }
	    });  
	    return false;
	});
	// $('#submitForm').on('click',function(){
	// 	var type = $(this).closest('form').prop("id");
	// 	$.ajax({
	//         type: "POST",  
	//         url: "index.php?route="+type+"&action=add",
	//         data: {'action':'add','add_item':type},
	//         success: function(html){
	// 			$('body').html(html);
	//         }
	//     });  
	//     return false;
	// });

	// $('.add-new-offer #submitForm').on('click',function() {
	//   	var total = 0;
	//   	var objData;
	  	
	//   	objData = {'new-offer-title': $("input.new-offer-title").val(),
	//   	'new-offer-url': $("input.new-offer-url").val(),
	//   	// objData['new-offer-url'] = objData['new-offer-url']?objData['new-offer-url']:'';
	//   	'new-offer-description': $("textarea.new-offer-description").val()
	//   };
	  	
	//   	var estimation = [];
	//   	$('.estimation  .estimation-table-row').each(function() {
	//   		var task = $('.estimation .estimation-table-row:last .esti-task').val();
	// 		var hrs = $('.estimation .estimation-table-row:last .esti-hrs').val();
	// 		var cost = $('.estimation .estimation-table-row:last .esti-cost').val();
	//   		estimation.push({
	// 			'task': task,
	// 			'hrs': hrs,
	// 			'cost': cost
	// 		});
	// 		total = parseInt(total+(cost*hrs));
	// 		console.log(total+'  '+cost+'   '+hrs);
	// 	});

 //  		objData.estimation = estimation;
 //  		objData.total = total;

	//   	$.ajax({
	//         type: "POST",  
	//         url: "index.php?route=offers",  
	//         data: {'action':'add','ids_array':objData},
	//         success: function(i){
	//             $('body').html(i);
	//         }
	//     });  
	//     return false;
	// });
	
	/* Image Upload */
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	});

    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
	        for(i=0;i<numFiles;i++){	
		        var loaded = $('.image_loaded').html();
		        $('.image_loaded').html(loaded + '<p>'+(i+1)+'. '+label+'</p>');
	        }
	    });
	});

    /* Key Futures */
	$('#btn-add-line').on('click', function() {
	  	autoAddInput(true);
	});
    $(document).on('keypress', '.keyftrs input:last', function (e) {
	    if (e.which == 13) {
	    	e.preventDefault();
	    	autoAddInput();
	    }
	});
	var _addInput = '<input type="text" name="new-project-feature[]" class="form-control" placeholder="Add Feature"/>';
	function autoAddInput(isBtn) {
	    if($('.keyftrs input:last').val() != "" || isBtn) {
	        $('.keyftrs input:last').after(_addInput);
	    }
	}

	/* Estimation */
	$('#btn-add-task').on('click', function() {
		autoAddRow(true);
	});
	$(document).on('keypress', '.estimation  .estimation-table-row:last  input:last',              function (e) {
	    if (e.which == 13) {
	    	e.preventDefault();
	    	autoAddRow();
	    }
	});

	var _addRow = '<div class="form-inline estimation-table-row table-row col-md-12"><div class="form-group col-md-8"><label class="sr-only" for="esti-task">Task</label><input type="text" class="form-control esti-task" placeholder="Task"></div><div class="form-group col-md-2"><label class="sr-only" for="esti-hrs">Estimated Hrs</label><input type="num" class="form-control esti-hrs" placeholder="Estimated Hrs"></div><div class="form-group col-md-2"><label class="sr-only" for="esti-cost">Estimated Cost</label><input type="num" class="form-control esti-cost" placeholder="Estimated Cost"></div></div>';
	function autoAddRow(isBtn){
	    var valH  = $('.estimation .estimation-table-row:last .esti-hrs').val();
	    var valT  = $('.estimation .estimation-table-row:last .esti-task').val();
	    var valC  = $('.estimation .estimation-table-row:last .esti-cost').val();
	    if((valH != "" && valT != 0 && valC != 0) || isBtn) {
	        $('.estimation .estimation-table-row:last').after(_addRow);
	    }
	}
	$('#calculate').on('click', function(){
		var estimated = [];
		var total = 0;
		$('.estimation-table-row').each(function(){
			var task = $(this).find('.esti-task').val();
			var hrs = parseFloat($(this).find('.esti-hrs').val());
			var cost = parseFloat($(this).find('.esti-cost').val());
			var row = {'task':task,'hrs':hrs,'cost':cost};
			estimated.push(row);
			total = total+(cost*hrs);
		});
		$('.total-placeholder').html(total);
		$('.total-placeholder').text('Total: '+total);
	});



    // FlexSlider
    $('.panel-title a').on('click', function() {
        //slider top navigation
	 //    $('.top-nav-content-slider-right').flexslider({
		//     animation: "slide",
		//     slideshow: false,
		//     useCSS : true,
		//     prevText: "",
		//     nextText: "",
		//     animationLoop: true	
	 //    });
		// $('.top-nav-content-slider-right-no-text').flexslider({
		//     animation: "slide",
		//     slideshow: false,
		//     useCSS : false,
		//     prevText: "",
		//     nextText: "",
		//     animationLoop: true 	
		// }); 
		// $('.top-nav-content-slider-left').flexslider({
		//     animation: "slide",
		//     slideshow: false,
		//     useCSS : false,
		//     prevText: "",
		//     nextText: "",    
		//     animationLoop: true 	
		// });
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