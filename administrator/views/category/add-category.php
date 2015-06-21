<div class="pageheader">
	<h2><i class="fa fa-home"></i>Categories<span><?php if($data): ?>Edit Category<?php else: ?>Add New Category<?php endif; ?></span></h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl("dashboard/index"); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl("category/list"); ?>" title="">Categories</a></li>
            <?php if($data): ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["category/manage", "CategoryID" => $data->CategoryID]); ?>" title="">Edit Category</a></li>
            <?php else: ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["category/manage"]); ?>" title="">Add New Category</a></li>
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
         	<h4 class="panel-title">Edit Category</h4>
         <?php else: ?>
         	<h4 class="panel-title">Add New Category</h4>
         <?php endif; ?>
      </div>
      <form class="form-horizontal form-bordered" method="post" action="<?php echo Yii::$app->urlManager->createUrl(["category/savecategory"]); ?>" >
          <div class="panel-body panel-body-nopadding">
              <?php if($data): ?>
                  <input type="hidden" name="CategoryID" value="<?php echo $data->CategoryID; ?>" />
              <?php endif; ?>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Category Name</label>
                  <div class="col-sm-6">
                      <input type="text" name="Category" placeholder="Category Name" class="form-control" value="<?php if($data): echo $data->Category; endif; ?>" />
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Parent Category:</label>
                  <div class="col-sm-5">
                      <select class="form-control chosen-select" name="ParentCategoryID" data-placeholder="Choose a Parent Category...">
                      	<option value="">Select Parent Category</option>
                      	<?php foreach($Categories as $Cats): ?>
                          <option value="<?php echo $Cats->CategoryID; ?>" <?php if($data): if($Cats->CategoryID==$data->ParentCategoryID): ?> selected="selected" <?php endif; endif; ?>><?php echo $Cats->Category; ?></option>
                        <?php endforeach; ?> 
                      </select>
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