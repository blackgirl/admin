$(document).ready(function() {
/* ---------------------- */
/* ALL PAGES */

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
	  	} else check.each(function() { a.push( $(this).val()); });
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
	/* Image Preview */
	$(".li-imgs").fancybox();
	/* Image Upload */
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	    input.trigger('fileselect', [numFiles, label]);
	});

    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        for(i=0;i<numFiles;i++){	
	        var loaded = $('.image_loaded').html();
	        $('.image_loaded').html(loaded + '<p>'+(i+1)+'. '+label+'</p>');
        }
    });

/* END OF ALL PAGES */
/* --------------- */
/* «PROJECTS» PAGE */

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

/* END OF «PROJECTS» PAGE */
/* ---------------------- */
/* «OFFERS» PAGE */

	$(function() {
	    var overPopup = false;
	    $('[rel=popover]').popover({
	        trigger: 'manual',
	        placement: 'left'
	    }).mouseenter(function (e) {
	        $('[rel=popover]').not('#' + $(this).attr('id')).popover('hide');
	        var $popover = $(this);
	        $popover.popover('show');
	        $('.popover.fade.in').mouseenter(function () {
	            overPopup = true;
	        }).mouseleave(function () {
	            overPopup = false;
	            $popover.popover('hide');
	        });
	    }).mouseout(function (e) {
	        var $popover = $(this);
	        setTimeout(function () {
	            if (!overPopup) {
	                $popover.popover('hide');
	            }
	        }, 1000);
	    });
	});

	/* «ADD NEW OFFER» BLOCK */

	/* Add new data row after current element */
	var _addInput = '<input type="text" name="new-project-feature[]" class="form-control" placeholder="Add Feature"/>';
	var _addUrlInput = '<input type="text" name="new-offer-cases[]" class="form-control new-offer-case" placeholder="http://"/>';
	var _addRow = '<div class="form-inline estimation-table-row table-row col-md-12"><div class="form-group col-md-8"><label class="sr-only" for="esti-task">Task</label><input type="text" pattern=".{4,}" name="estim[][task]" class="form-control esti-task" placeholder="Task" autocomplete="off" required></div><div class="form-group col-md-2"><label class="sr-only" for="esti-hrs">Estimated Hrs</label><input type="text" name="estim[][hrs]" pattern="[0-9]{3,}"  class="form-control esti-hrs" placeholder="Estimated Hrs" autocomplete="off" required></div><div class="form-group col-md-2"><label class="sr-only" for="esti-cost">Estimated Cost</label><input type="text" pattern="[0-9]{3,}" name="estim[][cost]" class="form-control esti-cost" placeholder="Estimated Cost" autocomplete="off" required></div></div>';
	$('#btn-add-task').on('click', function() {
		autoAddRow(true);
	});
	$('#btn-add-line').on('click', function() {
	  	autoAddInput(true,false);
	});
	$('#btn-attach').on('click', function() {
	  	autoAddInput(true,true);
	});
	/* Key Futures List new row adding function */
	function autoAddInput(isBtn,isUrl) {
		var el = isUrl?_addUrlInput:_addInput;
	    if($('.keyftrs input:last').val() != "" || isBtn) {
	        $('.keyftrs input:last').after(el);
	    }
	};
	/* Estimation Table new row adding function */
	function autoAddRow(isBtn){
	    var valH  = $('.estimation .estimation-table-row:last .esti-hrs').val();
	    var valT  = $('.estimation .estimation-table-row:last .esti-task').val();
	    var valC  = $('.estimation .estimation-table-row:last .esti-cost').val();
	    if((valH && valT.length && valC) || isBtn) {
	        $('.estimation .estimation-table-row:last').removeClass('need-to-fill').after(_addRow);
	    } else {
	    	$('.estimation .estimation-table-row:last').addClass('need-to-fill');
	    }
	};
    /* Key Futures list Events */
    $(document).on('keypress', '.keyftrs input:last', function (e) {
	    if (e.which == 13) {
	    	e.preventDefault();
	    	autoAddInput(false,$(this).hasClass('new-offer-case')?true:false);
	    	// autoAddInput(false,false);
	    }
	});
	/* Estimation table Events */
	$(document).on('keypress', '.estimation  .estimation-table-row:last  input:last', function (e) {
	    if (e.which == 13) {
	    	e.preventDefault();
	    	autoAddRow(false);
	    }
	});
	// Do not submit form on enter press
	$(document).on('keypress', '.estimation  .estimation-table-row input', function (e) {
	    if (e.which == 13) {
	    	e.preventDefault();
	    }
	});
	/* Calculate Total Estimate Cost */
	$('.fa-calculator').on('click', function(){
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
	/* END OF «ADD NEW OFFER» BLOCK */

/* END OF «OFFERS PAGE */
/* ------------------- */
/* «FEATURED BEHAVIOUR» TEMPLATES */

	/* Initialize fancybox modal previewer on element */
	$("Button_Selector").fancybox({
		// maxWidth	: 100%,
		// maxHeight	: 100$,
		fitToView	: false,
		width		: '90%',
		height		: '98%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});

	/* Send page's PDF Version to emeil */
	$("Button_Selector").on('click',function() {
		// $('Where_Selector').load('What_FileName.html');
		var id = $(this).prop('value');
		var email_to = '';
		var email_from = '';
		var content = $(this).closest('.panel-default').find('.offer-content').html();
		$.ajax({
	        type: "POST",
	        url: "UI-Tests/test_mPDF.php",  
	        data: {'pdf_data':content,'email_to':email_to,'email_from':email_from},
	        success: function(html){
	            console.log('SUCCESS');
	        }
	    });  
	    return false;
	});

	/* Helpers */
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
/* END OF «FEATURED BEHAVIOUR» TEMPLATES */

});
/* Submit form by AJAX */
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

/* Preview offer modal */
// $(".fancybox").click(function() {
//     $.fancybox.showLoading();  
//     var wrap = $('<div id="dummy"></div>').appendTo('body');
//     var el   = $(this).clone().appendTo(wrap);
//     el.oembed(null, {
//         embedMethod : 'replace',
//         afterEmbed  : function(rez) {
//             var what = $(rez.code);
//             var type = 'html';
//             var scrolling = 'no';
//             if (rez.type == 'photo') {
//                 what = what.find('img:first').attr('src');
//                 type = 'image';
//             } else if (rez.type === 'rich') {
//                 scrolling = 'auto';
//             }
//             $.fancybox.open({
//                 href      : what,
//                 type      : type,
//                 scrolling : scrolling,
//                 title     : rez.title || $(this).attr('title'),
//                 width     : 640,
//                 height    : 384,
//                 autoSize  : false
//             });
//             wrap.remove();
//         },
//         onError : function() {
//            $.fancybox.open(this);
//         }
//     });
//     return false;
// });