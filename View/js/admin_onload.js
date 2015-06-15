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

	/* Hide Item / Mark as NDA */
	$('.fa-eye-slash').on('click',function() {
		var ndaId = $(this).data("id");
		$.ajax({
	        type: "POST",
	        url: "index.php?route=projects",  
	        data: {'action':'hide','nda_id':ndaId},
	        success: function(html){
	            $(".glyphicon-unchecked[value="+ndaId+"]").closest('#accordion').find('.panel.panel-default').toggleClass('nda');
	        }
	    });  
	    return false;
	});

	// image previewer
	$(".li-imgs").fancybox();


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
	$(document).on('keypress', '.estimation  .estimation-table-row:last  input:last', function (e) {
	    if (e.which == 13) {
	    	e.preventDefault();
	    	autoAddRow();
	    }
	});
	$(document).on('keypress', '.estimation  .estimation-table-row input', function (e) {
	    if (e.which == 13) {
	    	e.preventDefault();
	    }
	});

	var _addRow = '<div class="form-inline estimation-table-row table-row col-md-12"><div class="form-group col-md-8"><label class="sr-only" for="esti-task">Task</label><input type="text" pattern=".{4,}" name="estim[][task]" class="form-control esti-task" placeholder="Task" autocomplete="off" required></div><div class="form-group col-md-2"><label class="sr-only" for="esti-hrs">Estimated Hrs</label><input type="text" name="estim[][hrs]" pattern="[0-9]{3,}"  class="form-control esti-hrs" placeholder="Estimated Hrs" autocomplete="off" required></div><div class="form-group col-md-2"><label class="sr-only" for="esti-cost">Estimated Cost</label><input type="text" pattern="[0-9]{3,}" name="estim[][cost]" class="form-control esti-cost" placeholder="Estimated Cost" autocomplete="off" required></div></div>';
	function autoAddRow(isBtn){
	    var valH  = $('.estimation .estimation-table-row:last .esti-hrs').val();
	    var valT  = $('.estimation .estimation-table-row:last .esti-task').val();
	    var valC  = $('.estimation .estimation-table-row:last .esti-cost').val();
	    if((valH && valT.length && valC) || isBtn) {
	        $('.estimation .estimation-table-row:last').removeClass('need-to-fill').after(_addRow);
	    } else {
	    	$('.estimation .estimation-table-row:last').addClass('need-to-fill');
	    }
	}
	$('#calculate').on('click', function(){
		var estimated = [];
		var total = 0;
		$('.estimation-table-row').each(function() {
			var isEmpty = true;
			var taskEl = $(this).find('.esti-task');
			var hrsEl = $(this).find('.esti-hrs');
			var costEl = $(this).find('.esti-cost');
			var task = taskEl.val();
			var hrs = parseFloat(hrsEl.val());
			var cost = parseFloat(costEl.val());
			task.length?(hrs?(cost?(isEmpty = false):markEmptyFields(costEl)):markEmptyFields(hrsEl)):markEmptyFields(taskEl);
			
			if(!isEmpty) {
				var row = {'task':task,'hrs':hrs,'cost':cost};
				estimated.push(row);
				total = total+(cost*hrs);
			}
		});
		$('.total-placeholder').html(total);
		$('.total-placeholder').text('Total: '+total);
	});


	// Preview offer modal
	$('#offerModal').on('show.bs.modal', function (event) {
	  // var button = $(event.relatedTarget);
	  // var offer = button.closest('#accordion').data('title');
	  // var offer_d = button.closest('#accordion').find('.panel-body').data('description');
	  // var offer_url = button.closest('#accordion').find('.offer-title a').data('value');
	 
	  // var modal = $(this);
	  // modal.find('.modal-title, .modal-body .offer-title').html('Offer to ' + offer);
	  // modal.find('.offer-description').text(offer_d);
	  // modal.find('.modal-offer-link').val();
	  $('.modal-body .container-fluid').load('UI-Tests/offer_page.html',function(result){
		    $('#offerModal').modal({show:true});
		});
	});
	$('[data-load-remote]').on('click',function(e) {
    e.preventDefault();
    var $this = $(this);
    var remote = $this.data('load-remote');
    if(remote) {
        $($this.data('remote-target')).load(remote);
    }
});


      
	// });
    // FlexSlider
	//  $('.panel-title a').on('click', function() {
	// 	$('.center-nav-content-slider').flexslider({
	// 	    animation: "slide",
	// 	    slideshow: true,
	// 	    useCSS : false,
	// 	    prevText: "",
	// 	    nextText: "",    
	// 	    animationLoop: true 	
	// 	});
	// });


	// Helpers
	function getTarget(evt) {
        evt = evt || window.event;
        return evt.target || evt.srcElement;
    };
    function markEmptyFields(element) {
		$('.need-to-fill').removeClass('need-to-fill');
		if(element) element.addClass('need-to-fill');
	}
	function isNum(num) {
		return $.isNumeric(num);
	}
});