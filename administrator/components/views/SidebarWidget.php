<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
use yii\web\UrlManager;
?>
<?php $method = Yii::$app->controller->id; ?>
<div class="leftpanel">
  <div class="logopanel">
      <h1>Proffie</h1>
  </div><!-- logopanel -->
  <div class="leftpanelinner">    
      <div class="visible-xs hidden-sm hidden-md hidden-lg">   
          <div class="media userlogged">
          	<?php /*?><?php 
			if(trim($admins->ProfilePic)!='' && file_exists(YiiBase::getPathOfAlias('webroot')."/assets/users/admin/".$admins->ProfilePic)):
				Yii::import('ext.iwi.Iwi');
				$picture = new Iwi(YiiBase::getPathOfAlias('webroot')."/assets/users/admin/".$admins->ProfilePic);
				$picture->resize(0,24, Iwi::NONE);
			?>
            	<img src="<?php echo $picture->cache(); ?>" alt="" />
        	<?php else: ?>
              <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/images/admin/photos/loggeduser.png" class="media-object">
            <?php endif; ?><?php */?>
              <div class="media-body">
                  <h4><?php echo $admins->FirstName; ?> <?php echo $admins->FirstName; ?></h4>
              </div>
          </div>
        
          <h5 class="sidebartitle actitle">Account</h5>
          <ul class="nav nav-pills nav-stacked nav-bracket mb30">
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(["admin/manage", "AdminID" => Yii::$app->session['AdminID']]); ?>"><i class="fa fa-user"></i> <span>Profile</span></a></li>
            <!--<li><a href="#"><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>-->
            <li><a href="<?php echo Yii::$app->urlManager->createUrl(["adminlogin/logout"]); ?>"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
          </ul>
      </div>
    
        <h5 class="sidebartitle">Navigation</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket">
          <li <?php if($method=="dashboard"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["dashboard/index"]); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          <?php if(Yii::$app->session['UserTypeID']==1): ?>
          	 <li class="nav-parent <?php if($method=="admin" || $method=="user"): ?>nav-active active<?php endif; ?>"><a href="#"><i class="fa fa-users"></i> <span>Users</span></a>
                <ul class="children" <?php if($method=="admin" || $method=="user"): ?> style="display:block;"<?php endif; ?>>
                    
                        <li <?php if($method=="admin"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["admin/list"]); ?>"><i class="fa fa-caret-right"></i> <span>System Admin/Editor</span></a></li> 
                        <li <?php if($method=="user"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["user/list"]); ?>"><i class="fa fa-caret-right"></i> <span>Users</span></a></li>   
                </ul>
         	</li>
		 <?php endif; ?>
         <li class="nav-parent <?php if($method=="category" || $method=="language" || $method=="currency" || $method=="settings"): ?>nav-active active<?php endif; ?>"><a href="#"><i class="fa fa-users"></i> <span>Website Settings</span></a>	
         	<ul class="children" <?php if($method=="category" || $method=="language" || $method=="currency" || $method=="settings"): ?> style="display:block;"<?php endif; ?>>
            	<li <?php if($method=="category"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["category/list"]); ?>"><i class="fa fa-caret-right"></i> <span>Manage Skills</span></a></li>  
                <li <?php if($method=="language"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["language/list"]); ?>"><i class="fa fa-caret-right"></i> <span>Manage Languages</span></a></li>
                <li <?php if($method=="currency"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["currency/list"]); ?>"><i class="fa fa-caret-right"></i> <span>Manage Currency</span></a></li>   
                <li <?php if($method=="settings"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["settings/list"]); ?>"><i class="fa fa-caret-right"></i> <span>General Settings</span></a></li>   
            </ul>
		</li>
        <?php if(Yii::$app->session['UserTypeID']==1): ?>
           <li <?php if($method=="cms"): ?> class="active" <?php endif; ?>><a href="<?php echo Yii::$app->urlManager->createUrl(["cms/list"]); ?>"><i class="fa fa-home"></i> <span>CMS Pages</span></a></li>
       <?php endif; ?> 
	</ul>
	</div><!-- leftpanelinner -->
</div>
