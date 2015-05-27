<div class="panel-group add-new-project" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default"><div class="panel-heading" role="tab" id="headingAdd">
  		</div>
  		<div id="collapseAdd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAdd">
	      <div class="panel-body">
			<h4 class="panel-title">Add New Project</h4>
			<form action="index.php?route=projects" method="post" enctype="multipart/form-data">
				<section class="col-md-8">
				<div class="form-group">
				    <label for="new-project-title" class="">Project title</label>
				    <input type="text" class="form-control" name="new-project-title"placeholder="Add Title"/>
				<!-- </div> -->
				<!-- <div class="form-group col-md-6"> -->
				    <label for="new-project-url"  class="">Site link</label>
				    <input type="text" class="form-control" name="new-project-url"placeholder="http://"/>
				</div>
				                
			    <div class='form-group'>
			    	<label class="" for="new-project-description">Description:</label>
					<textarea name="new-project-description" class=" form-control"  rows="5" placeholder="Add Description"></textarea>
			    </div>
			    <div class='form-group keyftrs'>
			    	<label for="new-project-feature[]" class="">Key Futures:</label>
					<input type="text" name="new-project-feature[]" class="form-control" placeholder="Add Feature"/>
					<a type="button" class="btn btn-default btn-sm" id="btn-add-line">
						<span class="glyphicon glyphicon-plus"></span>
					</a>
				</div>			  
			<button name="add-new-project" class="btn btn-success col-md-2 col-md-offset-10" type="submit">Add New</button>
			</section>
			<!-- Dropzone -->
    <input type="file" name="files[]" multiple/>
			</form>
			<!-- <form action="index.php?route=projects" method="post" class="col-md-4 dropzone" id="myDropzone">
			</form> -->
			<!-- <form action="index.php?route=projects" method="POST" enctype="multipart/form-data"> -->
    <!-- <input type="submit"/> -->
<!-- </form> -->
			<script>
			  // myDropzone is the configuration for the element that has an id attribute
			  // with the value my-dropzone (or myDropzone)
			  Dropzone.options.myDropzone = {
			    init: function() {
			      this.on("addedfile", function(file) {
			        // Create the remove button
			        var removeButton = Dropzone.createElement("<span class='glyphicon glyphicon-remove'></span>");
			        // Capture the Dropzone instance as closure.
			        var _this = this;
			        // Listen to the click event
			        removeButton.addEventListener("click", function(e) {
			          // Make sure the button click doesn't submit the form:
			          e.preventDefault();
			          e.stopPropagation();
			          // Remove the file preview.
			          _this.removeFile(file);
			          // If you want to the delete the file on the server as well,
			          // you can do the AJAX request here.
			        });
			        // var a = file.previewElement.find('img');
			        // console.log(file.previewTemplate.children[0].childNodes[0].attributes['src'].val());
			        console.log(file.previewTemplate.children[0].childNodes[0].src);
			        // console.log(a);
			        // Add the button to the file preview element.
			        file.previewElement.appendChild(removeButton);
			      });
			    }
			  };
		    </script>
	      </div>
		</div>
	</div>
</div>