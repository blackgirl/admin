<form action="index.php?route=projects" method="post" >
	<div class="btn-group" role="group" aria-label="...">
				<button type="submit" class="btn btn-success btn-sm" id="btn-admin-add" data-toggle="collapse" data-parent="#accordion" href="#collapseAdd" aria-expanded="false" aria-controls="collapseAdd">
			<span class="glyphicon glyphicon-plus"></span></button>
		
				<button type="submit" class="btn btn-info btn-sm disabled" id="btn-admin-edit">
			<span class="glyphicon glyphicon-pencil"></span></button>
		
				<button type="submit" class="btn btn-default btn-sm" id="btn-admin-hide">
			<span class="glyphicon glyphicon-eye-close"></span></button>
		
				<button type="submit" name="deleteProjects" value=" " class="btn btn-danger btn-sm" id="btn-admin-delete">
			<span class="glyphicon glyphicon-trash"></span></button>
		
	</div>
<div class="panel-group add-new-project" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default"><div class="panel-heading" role="tab" id="headingAdd">
  		</div>
  		<div id="collapseAdd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingAdd">
	      <div class="panel-body">
			<h4 class="panel-title">Add New Project</h4>
			<section class="">
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
					<!-- <input type="text" name="addFeature" placeholder="Add Feature"/> -->
				</div>
				<div class="form-group">
			    <label for="exampleInputFile">File input</label>
			    <input type="file" id="exampleInputFile">
			    <!-- <p class="help-block">Example block-level help text here.</p> -->
  </div>
			</section>
			<button name="add-new-project" class="btn btn-success pull-right" type="submit">Add New</button>
	      </div>
		</div>
	</div>
</div>