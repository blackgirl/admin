<div class="form-group estimation clearfix">
  <label class="control-label col-md-12">Estimation:</label>
  <div class="form-inline estimation-table-row table-row col-md-12">
    <div class="form-group col-md-8">
      <label class="sr-only" for="esti-task">Task</label>
      <input type="text" name="estim[][esti-task]" class="form-control esti-task" id="esti-task" placeholder="Task">
    </div>
    <div class="form-group col-md-2">
      <label class="sr-only" for="esti-hrs">Estimated Hrs</label>
      <input type="num" name="estim[][esti-hrs]" class="form-control esti-hrs" id="esti-hrs" placeholder="Estimated Hrs">
    </div>
    <div class="form-group col-md-2">
      <label class="sr-only" for="esti-cost">Estimated Cost</label>
      <input type="num" name="estim[][esti-cost]" class="form-control esti-cost" id="esti-cost" placeholder="Estimated Cost">
    </div>
  </div>
  <div class="estimation-actions col-md-12 clearfix">
    <a type="button" class="btn btn-default btn-sm pull-right" id="btn-add-task">
      <span class="fa fa-plus"></span>
    </a>
    <div class="input-group col-md-12 text-right">
      <span class="form-control-static total-placeholder" name="new-offer-total"></span>
      <button class="btn btn-default" type="button" id="calculate"><span class="fa fa-calculator"></span></button>
    </div>
  </div>
  <hr>
</div>