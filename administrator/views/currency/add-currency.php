<div class="pageheader">
	<h2><i class="fa fa-home"></i>Currency<span><?php if($data): ?>Edit Currency<?php else: ?>Add New Currency<?php endif; ?></span></h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl("dashboard/index"); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl("currency/list"); ?>" title="">System Admin/Editor</a></li>
            <?php if($data): ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["currency/manage", "CurrencyID" => $data->CurrencyID]); ?>" title="">Edit Currency</a></li>
            <?php else: ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["currency/manage"]); ?>" title="">Add New Currency</a></li>
            <?php endif; ?>
        </ol>
	</div>
</div>
<div class="contentpanel">
  <div class="panel panel-default">
  	  <div class="panel-heading">
          <div class="panel-btns">
              <a href="#" class="minimize">&minus;</a>
          </div>
         <?php if($data): ?>
         	<h4 class="panel-title">Edit Currency</h4>
         <?php else: ?>
         	<h4 class="panel-title">Add New Currency</h4>
         <?php endif; ?>
      </div>
      <form class="form-horizontal form-bordered" method="post" action="<?php echo Yii::$app->urlManager->createUrl(["currency/savecurrency"]); ?>" >
          <div class="panel-body panel-body-nopadding">
              <?php if($data): ?>
                  <input type="hidden" name="CurrencyID" value="<?php echo $data->CurrencyID; ?>" />
              <?php endif; ?>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-6">
                      <input type="text" name="Currency" placeholder="Currency Name" class="form-control" value="<?php if($data): echo $data->Currency; endif; ?>" />
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Currency Prefix</label>
                  <div class="col-sm-6">
                      <input type="text" name="CurrencyPrefix" class="form-control" value="<?php if($data): echo $data->CurrencyPrefix; endif; ?>" />
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Status:</label>
                  <div class="col-sm-5">
                      <select class="form-control chosen-select" name="Status" data-placeholder="Choose a Status...">
                          <option value="1">Active</option>
                          <option value="0" <?php if($data): if($data->Status==0): ?> selected="selected" <?php endif; endif; ?>>Inactive</option>
                      </select>
                  </div>
              </div>
          </div><!-- panel-body -->
          <div class="panel-footer">
              <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                      <button class="btn btn-primary" type="submit">Submit</button>&nbsp;
                      <button class="btn btn-default" type="button" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl(["currency/list"]); ?>'">Cancel</button>
                  </div>
              </div>
          </div><!-- panel-footer -->
      </form>
  </div>
</div>