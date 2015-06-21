<div class="pageheader">
	<h2><i class="fa fa-home"></i>CMS Pages<span><?php if($data): ?>Edit CMS Page<?php else: ?>Add New CMS Page<?php endif; ?></span></h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl("dashboard/index"); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl("cms/list"); ?>" title="">System Admin/Editor</a></li>
            <?php if($data): ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["cms/manage", "CMSID" => $data->CMSID]); ?>" title="">Edit Currency</a></li>
            <?php else: ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["cms/manage"]); ?>" title="">Add New Currency</a></li>
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
         	<h4 class="panel-title">Edit CMS Page</h4>
         <?php else: ?>
         	<h4 class="panel-title">Add New CMS Page</h4>
         <?php endif; ?>
      </div>
      <form class="form-horizontal form-bordered" method="post" action="<?php echo Yii::$app->urlManager->createUrl(["cms/savecms"]); ?>" >
          <div class="panel-body panel-body-nopadding">
              <?php if($data): ?>
                  <input type="hidden" name="CMSID" value="<?php echo $data->CMSID; ?>" />
              <?php endif; ?>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Page Name</label>
                  <div class="col-sm-6">
                      <input type="text" name="PageName" placeholder="Page Name" class="form-control" value="<?php if($data): echo $data->PageName; endif; ?>" />
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Page Content</label>
                  <div class="col-sm-9">
                  	<textarea name="Content" class="form-control ckeditor" rows="10"><?php if($data): echo $data->Content; endif; ?></textarea>
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
                      <button class="btn btn-default" type="button" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl(["cms/list"]); ?>'">Cancel</button>
                  </div>
              </div>
          </div><!-- panel-footer -->
      </form>
  </div>
</div>