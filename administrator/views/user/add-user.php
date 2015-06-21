<div class="pageheader">
	<h2><i class="fa fa-home"></i><?php if($data): ?>Edit User<?php else: ?>Add New User<?php endif; ?></span></h2>
    <div class="breadcrumb-wrapper">
    	<span class="label">You are here:</span>
        <ol class="breadcrumb">
        	<li><a href="<?php echo Yii::$app->urlManager->createUrl("dashboard/index"); ?>">Dashboard</a></li>
            <li><a href="<?php echo Yii::$app->urlManager->createUrl("user/list"); ?>" title=""></a></li>
			<?php if($data): ?>
                <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["user/manage", "UserID" => $data->UserID]); ?>" title="">Edit User</a></li>
            <?php else: ?>
                <li class="active"><a href="<?php echo Yii::$app->urlManager->createUrl(["user/manage"]); ?>" title="">Add New User</a></li>
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
            <h4 class="panel-title">Edit User</h4>
          <?php else: ?>
            <h4 class="panel-title">Add New User</h4>
          <?php endif; ?>
      </div>
      <form class="form-horizontal form-bordered" method="post" action="<?php echo Yii::$app->urlManager->createUrl(["user/saveuser"]); ?>" >
          <div class="panel-body panel-body-nopadding">
              <?php if($data): ?>
                  <input type="hidden" name="UserID" value="<?php echo $data->UserID; ?>" />
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
                      <input type="text" name="Email" class="form-control" value="<?php if($data): echo $data->Email; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Password:</label>
                  <div class="col-sm-6"><input type="password" name="Password" class="form-control" value="" /></div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-6">
                      <input type="text" name="Address" class="form-control" value="<?php if($data): echo $data->Address; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Address2</label>
                  <div class="col-sm-6">
                      <input type="text" name="Address2" class="form-control" value="<?php if($data): echo $data->Address2; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">City</label>
                  <div class="col-sm-6">
                      <input type="text" name="City" class="form-control" value="<?php if($data): echo $data->City; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">State</label>
                  <div class="col-sm-6">
                      <input type="text" name="State" class="form-control" value="<?php if($data): echo $data->State; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Country:</label>
                  <div class="col-sm-5">
                      <select class="form-control chosen-select" name="Country" data-placeholder="Choose a Country...">
                          <option value="">Choose a Country...</option>
                          <?php foreach($country as $Countrys): ?>
                          <option value="<?php echo $Countrys->CountryID; ?>" <?php if($data): if($data->Country==$Countrys->CountryID): ?> selected="selected" <?php endif; endif; ?>><?php echo $Countrys->Country; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Zipcode</label>
                  <div class="col-sm-6">
                      <input type="text" name="Zipcode" class="form-control" value="<?php if($data): echo $data->Zipcode; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Company Name</label>
                  <div class="col-sm-6">
                      <input type="text" name="CompanyName" class="form-control" value="<?php if($data): echo $data->CompanyName; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Phone Number</label>
                  <div class="col-sm-6">
                      <input type="text" name="PhoneNumber" class="form-control" value="<?php if($data): echo $data->PhoneNumber; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Paypal ID</label>
                  <div class="col-sm-6">
                      <input type="text" name="PaypalID" class="form-control" value="<?php if($data): echo $data->PaypalID; endif; ?>"/>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">Currency</label>
                  <div class="col-sm-5">
                      <select class="form-control chosen-select" name="CurrencyID" data-placeholder="Choose a Currency...">
                          <option value="">Choose a Currency...</option>
                          <?php foreach($currency as $Curr): ?>
                          <option value="<?php echo $Curr->CurrencyID; ?>" <?php if($data): if($data->CurrencyID==$Curr->CurrencyID): ?> selected="selected" <?php endif; endif; ?>><?php echo $Curr->Currency; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
              </div>
              <div class="form-group">
                  <label class="col-sm-3 control-label">User Type:</label>
                  <div class="col-sm-5">
                      <select class="form-control chosen-select" name="UserType" data-placeholder="Choose a User Type...">
                      	<option value="0" <?php if($data): if($data->UserType==0): ?> selected="selected" <?php endif; endif; ?>>Hire</option>
                        <option value="1" <?php if($data): if($data->UserType==1): ?> selected="selected" <?php endif; endif; ?>>Work</option>
                        <option value="2" <?php if($data): if($data->UserType==2): ?> selected="selected" <?php endif; endif; ?>>Both</option>
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
                      <button class="btn btn-default" type="button" onclick="document.location.href='<?php echo Yii::$app->urlManager->createUrl(["user/list"]); ?>'">Cancel</button>
                  </div>
              </div>
          </div><!-- panel-footer -->
      </form>
  </div>
</div>