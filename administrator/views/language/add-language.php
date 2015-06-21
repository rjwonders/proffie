<div class="pageheader">
	<h2><i class="fa fa-home"></i>Languages<span><?php if($data): ?>Edit Language<?php else: ?>Add New Language<?php endif; ?></span></h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl("dashboard/index"); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl("language/list"); ?>" title="">Languages</a></li>
            <?php if($data): ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["language/manage", "LanguageID" => $data->LanguageID]); ?>" title="">Edit Language</a></li>
            <?php else: ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["language/manage"]); ?>" title="">Add New Language</a></li>
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
         	<h4 class="panel-title">Edit Language</h4>
         <?php else: ?>
         	<h4 class="panel-title">Add New Language</h4>
         <?php endif; ?>
      </div>
      <form class="form-horizontal form-bordered" method="post" action="<?php echo Yii::$app->urlManager->createUrl(["language/savelanguage"]); ?>" >
          <div class="panel-body panel-body-nopadding">
              <?php if($data): ?>
                  <input type="hidden" name="LanguageID" value="<?php echo $data->LanguageID; ?>" />
              <?php endif; ?>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Language Name</label>
                  <div class="col-sm-6">
                      <input type="text" name="Language" placeholder="Language Name" class="form-control" value="<?php if($data): echo $data->Language; endif; ?>" />
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
                      <button class="btn btn-default" type="button" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl(["language/list"]); ?>'">Cancel</button>
                  </div>
              </div>
          </div><!-- panel-footer -->
      </form>
  </div>
</div>