$('#editor').wysiwyg();
$('.btn-show-value').on('click',function(){
  $('body').insertAfter($("#editor").html());
});