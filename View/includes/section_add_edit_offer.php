<form action="index.php?route=offers" method="post" >
	<?php include ('view/includes/offers_top_button_panel.php'); ?>
</form>
<div class="panel-group add-new-offer" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default"><div class="panel-heading" role="tab" id="headingAdd">
  		</div>
  		<div id="collapseAdd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAdd">
	      <div class="panel-body">
			<h4 class="panel-title">Add New Offer</h4>
			<form action="index.php?route=offers" method="post" enctype="multipart/form-data" >
			<!-- <form action="index.php?route=projects" method="post" enctype="multipart/form-data" class="dropzone" id="myDropzone"> -->
				<section class="col-md-8 col-md-offset-2">
				<div class="form-group">
				    <label for="new-offer-title" class="">Offer title</label>
				    <input type="text" class="form-control" name="new-offer-title"placeholder="Add Title"/>
				<!-- </div> -->
				<!-- <div class="form-group col-md-6"> -->
				    <label for="new-offer-url"  class="">PDF link</label>
				    <input type="text" class="form-control" name="new-offer-url"placeholder="http://"/>
				</div>
				                
			    <div class='form-group'>
			    	<label class="" for="new-offer-description">Description:</label>
					<textarea name="new-offer-description" class=" form-control"  rows="5" placeholder="Add Description"></textarea>
			    </div>
			   <!--  <div class='form-group keyftrs clearfix'>
			    	<label for="new-project-feature[]" class="">Key Futures:</label>
					<input type="text" name="new-project-feature[]" class="form-control" placeholder="Add Feature"/>
					<a type="button" class="btn btn-default btn-sm pull-right" id="btn-add-line">
						<span class="glyphicon glyphicon-plus"></span>
					</a>
				</div>	 -->  



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
        <div class='form-group'>
        	<div class="input-group col-md-12">
        		<span class="btn btn-default btn-file">
                        Browse images… 
	    	<input type="file" name="files[]" multiple class="form-control"/>
	    </span><div class="image_loaded"></div>

    	</div>
    	</div>
			<button name="add-new-offer" class="btn btn-success col-md-2 col-md-offset-10" type="submit">Add New</button>
			</section>
			<!-- </form> -->
			</form>
			<!-- <form action="index.php?route=projects" method="post" class="col-md-4 dropzone" id="myDropzone"> -->
			<!-- </form> -->
			
			<script src="view/js/dropzone_file.js"></script>
	      </div>
		</div>
	</div>
</div>