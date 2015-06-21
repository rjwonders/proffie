<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\web\UrlManager;
use yii\base\Controller;


?>
<div style="display:none" id="loaders">
	<img src="<?php echo BaseUrl::base(); ?>/images/loader1.gif" alt="Loading..." />
    <input type="hidden" id="SiteURL" value="<?php echo Yii::$app->urlManager->createUrl(["/"]); ?>" />
</div>
<section class="header <?php if(Yii::$app->controller->action->id === Yii::$app->controller->defaultAction->id): ?>homeheader <?php endif; ?>">
	<div class="wrapper">
    	<div class="logo">
        	<a href="<?php echo Yii::$app->urlManager->createUrl(["home/"]); ?>"><img src="<?php echo BaseUrl::base(); ?>/images/logo.png" alt=""></a>
        </div>
        <div class="header_right">
        	<div class="nav">
            	<div class="bodyclose"></div>
                <div class="toggle"></div>
                <ul class="topnav">
                	<li class="current-menu-item"><a href="#">Post A PROJECT</a></li>
                    <li class=""><a href="#">Browse PROJECTS</a></li>
                    <li class=""><a href="#">How it Works</a></li>
                </ul>
            </div>
            <?php if(isset(Yii::$app->session['UserID'])): ?>
            	<div class="top_right_box">
                    <div class="top_right_ul">
                        <ul>
                            <li><strong>USD:</strong>  $<?php echo number_format($rsUser->AccountBalance,2); ?></li>
                            <li>
                                <a href="#"><img src="<?php echo BaseUrl::base(); ?>/images/chat_icon.png" alt=""></a>
                                <a href="#"><img src="<?php echo BaseUrl::base(); ?>/images/ball_icon.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    <div class="name_box">
                        <div class="nm_box"><?php echo $rsUser->FirstName; ?></div>
                    </div>
                </div>
                
            <?php else: ?>
            	<div class="enter_box">
                    <a href="javascript:void(0)" class="loginslide">login</a>
                    <a href="javascript:void(0)" class="registerslide">register</a>
                </div>
            <?php endif; ?>
        </div>
        <div class="cl"></div>
    </div>
</section>
<?php 
//print_r(Yii::$app->controller->module->controller->action->id);exit;
if(isset(Yii::$app->session['UserID']) &&  Yii::$app->controller->id=="user"): ?>
	<div class="dashbord_menu">
            <div class="wrapper">
                <ul class="clearfix">
                    <li class="active"><a href="#"><i><img src="<?php echo BaseUrl::base(); ?>/images/ds_icon_1.png" alt=""></i>Dashboard</a></li>
                    <li><a href="#"><i><img src="<?php echo BaseUrl::base(); ?>/images/ds_icon_2.png" alt=""></i>My Projects</a></li>
                    <li><a href="#"><i><img src="<?php echo BaseUrl::base(); ?>/images/ds_icon_3.png" alt=""></i>Profile</a></li>
                    <li><a href="#"><i><img src="<?php echo BaseUrl::base(); ?>/images/ds_icon_4.png" alt=""></i>Inbox</a></li>
                    <li><a href="#"><i><img src="<?php echo BaseUrl::base(); ?>/images/ds_icon_5.png" alt=""></i>Finances</a></li>
                    <li><a href="#"><i><img src="<?php echo BaseUrl::base(); ?>/images/ds_icon_6.png" alt=""></i>Disputes</a></li>
                    <li><a href="#"><i><img src="<?php echo BaseUrl::base(); ?>/images/ds_icon_7.png" alt=""></i>Invite</a></li>
                </ul>
            </div>
        </div>
<?php endif; ?>
<?php if(!isset(Yii::$app->session['UserID'])): ?>
<section class="sectionloginheader" id="mylogins">
	<div class="wrapper">
    	<div class="post-job">
        	<div class="fb-box">
                <a href="<?php echo Yii::$app->urlManager->createUrl(["user/fblogin"]); ?>">
                    <div class="fb-ic"></div>
                    <h5>Connect with facebook</h5>
                </a>
            </div>
            <div class="or">or</div>
            <div class="post-detail">
            	<form method="post" action="" id="loginform">
            	<div class="frm">
                    <input type="text" placeholder="Email" name="Email" id="Emails">
                </div>
                <div class="frm">
                    <input type="password" placeholder="Password" name="Password" id="Passwords">
                </div>
                <div class="frm hloggedin">
                    <button type="submit" class="loginbtn loggedin">Submit</button>
                </div>       
                </form>                                 
            </div>
        </div>
       <div class="cl"></div>
	</div>
</section>
<section class="sectionloginheader" id="myregister">
	<div class="wrapper">
    	<div class="post-job">
        	<div class="fb-box">
                <a href="<?php echo Yii::$app->urlManager->createUrl(["user/fblogin"]); ?>">
                    <div class="fb-ic"></div>
                    <h5>Connect with facebook</h5>
                </a>
            </div>
            <div class="or">or</div>
            <div class="post-detail">
            	<h3>Create Account</h3>
                <form method="post" action="" id="regform">
                    <div class="frm">
                        <input type="text" placeholder="Email" name="Email" id="Email">
                    </div>
                    <div class="frm">
                        <input type="password" placeholder="Password" name="Password" id="Password">
                    </div>
                    <div class="frm">
                        <input type="password" placeholder="Confirm Password" name="ConfirmPassword" id="ConfirmPassword">
                    </div>
                    <div class="frm">
                        <h5>I am looking to</h5>
                        <input type="radio" name="UserType" id="HireType" value="1" checked="checked"> Hire
                        <input type="radio" name="UserType" id="WorkType" value="2"> Work
                    </div>
                    <div class="frm hsignedup">
                        <button type="submit" class="loginbtn signedup">Submit</button>
                    </div>
                </form>                                                  
            </div>
        </div>
       <div class="cl"></div>
	</div>
</section>
<?php endif; ?>