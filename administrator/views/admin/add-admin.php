<div class="pageheader">
	<h2><i class="fa fa-home"></i><?php if(Yii::$app->session['UserTypeID']==1): ?>System Admin/Editor<?php else: ?>Editor<?php endif; ?><span><?php if(Yii::$app->session['UserTypeID']==1): ?><?php if($data): ?>Edit System Admin<?php else: ?>Add New System Admin<?php endif; ?><?php else: ?>Edit Profile<?php endif; ?></span></h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl("dashboard/index"); ?>">Dashboard</a></li>
            <?php if(Yii::$app->session['UserTypeID']==1): ?>
            	<li><a href="<?php echo Yii::$app->urlManager->createUrl("admin/list"); ?>" title="">System Admin/Editor</a></li>
                <?php if($data): ?>
                    <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["admin/manage", "AdminID" => $data->AdminID]); ?>" title="">Edit System Admin</a></li>
                <?php else: ?>
                    <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["admin/manage"]); ?>" title="">Add New System Admin</a></li>
                <?php endif; ?>
            <?php else: ?>
            	<li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["admin/manage", "AdminID" => $data->AdminID]); ?>" title="">Edit Profile</a></li>
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
          <?php if(Yii::$app->session['UserTypeID']==1): ?>
			  <?php if($data): ?>
                <h4 class="panel-title">Edit System Admin</h4>
              <?php else: ?>
                <h4 class="panel-title">Add New System Admin</h4>
              <?php endif; ?>
          <?php else: ?>
            	<h4 class="panel-title">Edit Profile</h4>
          <?php endif; ?>
      </div>
      <form class="form-horizontal form-bordered" method="post" action="<?php echo Yii::$app->urlManager->createUrl(["admin/saveadmin"]); ?>" >
          <div class="panel-body panel-body-nopadding">
              <?php if($data): ?>
                  <input type="hidden" name="AdminID" value="<?php echo $data->AdminID; ?>" />
              <?php endif; ?>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-2">
                      <input type="text" name="FirstName" placeholder="First Name" class="form-control" value="<?php if($data): echo $data->FirstName; endif; ?>" />
                  </div>
                  <div class="col-sm-2">
                      <input type="text" name="LastName" placeholder="Last Name" class="form-control" value="<?php if($data): echo $data->LastName; endif; ?>" />
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-6">
                      <input type="text" name="Email" class="form-control" value="<?php if($data): echo $data->Email; endif; ?>" <?php if($data): ?> readonly="readonly" <?php endif; ?>/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Password:</label>
                  <div class="col-sm-6"><input type="password" name="Password" class="form-control" value="" /></div>
              </div>
              <?php if(Yii::$app->session['UserTypeID']==1): ?>
                  <div class="form-group">
                      <label class="col-sm-3 control-label">User Type:</label>
                      <div class="col-sm-5">
                          <select class="form-control chosen-select" name="UserTypeID" data-placeholder="Choose a Status...">
                            <?php foreach($usertype as $usrs): ?>
                                <option value="<?php echo $usrs->AdminTypeID; ?>" <?php if($data): if($data->AdminType==$usrs->AdminTypeID): ?> selected="selected" <?php endif; endif; ?>><?php echo $usrs->AdminType; ?></option>
                            <?php endforeach; ?>
                              
                          </select>
                      </div>
                  </div>
              <?php endif; ?>
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
                      <button class="btn btn-default" type="button" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl(["admin/list"]); ?>'">Cancel</button>
                  </div>
              </div>
          </div><!-- panel-footer -->
      </form>
  </div>
</div>