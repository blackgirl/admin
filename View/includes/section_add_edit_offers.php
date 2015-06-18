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
						    <input type="text" class="form-control new-offer-title" name="new-offer-title" data-minlength="3" placeholder="Add Title" required/>
						    
						    <label for="new-offer-url" class="hide" >PDF link</label>
						    <input type="url" class="form-control new-offer-url hide" name="new-offer-url" placeholder="http://" readonly/>
						</div>
						                
					    <div class='form-group'>
					    	<label class="" for="new-offer-description">Description:</label>
							<textarea name="new-offer-description" class=" form-control new-offer-description" data-minlength="10" rows="5" placeholder="Add Description" required></textarea>
					    </div>
					    <div class='form-group'>
					    	<label class="control-label hide">Cases:</label>
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
							    	<input type="file" name="files[]" multiple class="form-control"accept="image/*"/>
							    </span><div class="image_loaded"></div>
					    	</div>
				    	</div>
					    <?php include ('view/includes/estimate_table_form.php'); ?>
						<button name="add-new-offer" id="submitForm" class="btn btn-success col-md-2 col-md-offset-10" type="submit">Add New <span class="fa fa-long-arrow-right"></span></button>
					</section>
				</form>
				<!-- <script src="view/js/dropzone_file.js"></script>		 -->
				<script>
				// $('#offers').validator();
				// $('#form').validator().on('submit', function (e) {
				//   if (e.isDefaultPrevented()) {
				//   } else {
				//   }
				// })
				</script>		
		    </div>
		</div>
	</div>
</div>