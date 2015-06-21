<div class="pageheader">
	<h2><i class="fa fa-home"></i>Edit Settings</span></h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl("dashboard/index"); ?>">Dashboard</a></li>
            <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl("settings/list"); ?>" title="">Edit Settings</a></li> 
        </ol>
	</div>
</div>
<div class="contentpanel">
  <div class="panel panel-default">
  	  <div class="panel-heading">
          <div class="panel-btns">
              <a href="#" class="minimize">&minus;</a>
          </div>
         <?php if($Settings): ?>
         	<h4 class="panel-title">Edit Settings</h4>
         <?php else: ?>
         	<h4 class="panel-title">Add New Setting</h4>
         <?php endif; ?>
      </div>
      <form class="form-horizontal form-bordered" method="post" action="<?php echo Yii::$app->urlManager->createUrl(["settings/savesettings"]); ?>" >
          <div class="panel-body panel-body-nopadding">
              <?php foreach($Settings as $Sett): ?>
              <div class="form-group">
                  <label class="col-sm-3 control-label"><?php echo $Sett->SettingName; ?></label>
                  <div class="col-sm-6">
                  	<textarea name="MySetting[<?php echo $Sett->SettingID; ?>]" class="form-control"><?php echo $Sett->SettingValue; ?></textarea>
                  </div>
              </div>
              <?php endforeach; ?>
          </div><!-- panel-body -->
          <div class="panel-footer">
              <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                      <button class="btn btn-primary" type="submit">Submit</button>&nbsp;
                      <button class="btn btn-default" type="button" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl(["dashboard/index"]); ?>'">Cancel</button>
                  </div>
              </div>
          </div><!-- panel-footer -->
      </form>
  </div>
</div>