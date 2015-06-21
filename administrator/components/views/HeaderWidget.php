<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\web\UrlManager;
?>
<div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      <div class="header-right">
        <ul class="headermenu">
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php /*?> <?php 
				if(trim($admins->ProfilePic)!='' && file_exists(YiiBase::getAlias('webroot')."/assets/users/admin/".$admins->ProfilePic)):
					Yii::import('ext.iwi.Iwi');
					$picture = new Iwi(YiiBase::getPathOfAlias('webroot')."/assets/users/admin/".$admins->profilepicture);
					$picture->resize(0,24, Iwi::NONE);
				?>
					<img src="<?php echo $picture->cache(); ?>" alt="" />
				<?php else: ?>
				  <img alt="" src="<?php echo BaseUrl::base(); ?>/images/photos/loggeduser.png">
				<?php endif; ?><?php */?>
                <?php echo $admins->FirstName; ?> <?php echo $admins->LastName; ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(["admin/manage", "AdminID" => Yii::$app->session['AdminID']]); ?>"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(["adminlogin/logout"]); ?>"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
              </ul>
            </div>
          </li>
          
        </ul>
      </div><!-- header-right -->
      
    </div>