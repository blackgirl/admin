<?php include ('view/includes/offers_top_button_panel.php'); ?>
<div class="panel-group add-new-offer" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
    	<div class="panel-heading" role="tab" id="headingAdd"></div>
  		<div id="collapseAdd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAdd">
	        <div class="panel-body">
				<h4 class="panel-title">Add New Offer</h4>
				<form id="offers" action="index.php?route=offers" method="post" enctype="multipart/form-data" >
					<section class="col-md-8 col-md-offset-2">
						<div class="form-group">
						    <label for="new-offer-title" class="">Offer title</label>
						    <input type="text" class="form-control new-offer-title" name="new-offer-title"placeholder="Add Title"/>
						    <label for="new-offer-url" class="">PDF link</label>
						    <input type="text" class="form-control new-offer-url" name="new-offer-url"placeholder="http://"/>
						</div>
						                
					    <div class='form-group'>
					    	<label class="" for="new-offer-description">Description:</label>
							<textarea name="new-offer-description" class=" form-control new-offer-description"  rows="5" placeholder="Add Description"></textarea>
					    </div>
					    <div class='form-group'>
					    	<label class="control-label">Cases:</label>
							<div class=""></div>
					    </div>
					    <div class='form-group'>
					    	<label class="control-label">Attachments:</label>
							<div class=""></div>
					    </div>
				        <div class='form-group'>
				        	<div class="input-group col-md-12">
				        		<span class="btn btn-default btn-file">
			                        Browse images… 
							    	<input type="file" name="files[]" multiple class="form-control"/>
							    </span><div class="image_loaded"></div>
					    	</div>
				    	</div>
					    <?php include ('view/includes/estimate_table_form.php'); ?>
				<!-- Dropzone -->
				<!-- <form action="index.php?route=projects" class="col-md-4 dropzone" id="myDropzone"> -->
			   <!--  <div class="input-group">
	                <span class="input-group-btn">
	                    <span class="btn btn-default btn-file">
	                        Browse… <input type="file" multiple>
	                    </span>
	                </span>
	                <input type="text" class="form-control" readonly="">
	            </div> -->
						<button name="add-new-offer" id="submitForm" class="btn btn-success col-md-2 col-md-offset-10" type="submit">Add New</button>
					</section>
				</form>
				<!-- <form action="index.php?route=projects" method="post" class="col-md-4 dropzone" id="myDropzone"></form> -->
				<script src="view/js/dropzone_file.js"></script>		
		    </div>
		</div>
	</div>
</div>