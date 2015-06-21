<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
?>
<div class="row">
	<div class="col-md-7">
    	<div class="signin-info">
            <div class="logopanel">
                
            </div><!-- logopanel -->
        
            <img alt="" src="<?php echo BaseUrl::base(); ?>/images/logo.png" class="media-object">
            
            <div class="mb20"></div>
        </div><!-- signin0-info -->
    
    </div><!-- col-sm-7 -->
    
    <div class="col-md-5">
        <?php /*?><?php if(isset(Yii::$app->session['AdminError'])): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <strong>Error!</strong> <?php echo Yii::$app->session['AdminError']; ?></a>.
            </div>
    	<?php 
		unset(Yii::$app->session['AdminError']);
		endif; ?><?php */?>
        <form method="post" action="<?php echo Yii::$app->urlManager->createUrl("adminlogin/login"); ?>">
        	<h4 class="nomargin">Sign In</h4>
            <p class="mt5 mb20">Login to access your account.</p>
        	
            <input type="text" class="form-control uname" placeholder="Email" name="Email" />
            <input type="password" class="form-control pword" placeholder="Password" name="Password" />
            <button type="submit" class="btn btn-success btn-block">Sign In</button>
            
        </form>
    </div><!-- col-sm-5 -->
</div>
<div class="signup-footer">
    <div class="pull-left">
        &copy; 2015. All Rights Reserved.
    </div>
</div>