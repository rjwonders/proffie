<?php
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
$this->title = 'Account Settings';

?>

<div class="account_page">
	<div class="wrapper">
    	<div class="account_tabs">
        	<ul class="clearfix">
            	<li><a href="<?php echo Yii::$app->urlManager->createUrl(["user/dashboard"]); ?>"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-1.png" alt=""></i>Account Details</a></li>
                <li class="active"><a href="javascript:void(0)"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-2.png" alt=""></i>Account Setting</a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(["user/emailsetting"]); ?>"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-3.png" alt=""></i>Email Setting</a></li>
            </ul>
        </div>
        <div class="account_content">
        	<div class="wrapper">
            	<h2>Account Setting</h2>
                <div class="account_setting">
                    <div class="account_setting-box">
                        <h3>Change Password</h3>
                        <div class="frm">
                            <div class="frm-box f1">
                                <h5>Current Password</h5>
                                <input type="password" >
                            </div>
                            <div class="frm-box fl">
                                <h5>New Password</h5>
                                <input type="password" >
                            </div>
                            <div class="frm-box fl">
                                <h5>New Password</h5>
                                <input type="password" >
                            </div>
                            <div class="cl"></div>
                        </div>
                    </div>
                    <div class="payment-box fl">
                    <div class="account_setting-box">
                        <h3>Authorized Payment Method</h3>
                        <div class="frm">
                            <div class="frm-box f1">
		                       <h5> Authorize Paypal Account</h5>
                               <p>Account verified: <a href="#">info@dswtechnologies.com</a></p>
                           	</div>
                             <div class="frm-box fr">
                             	<input type="submit" value="cancel" >
                             </div>
                             <div class="cl"></div>
                     	</div>
                        <div class="frm">
                            <div class="frm-box f1">
		                       <h5>Authorize Credit Cards</h5>
                               <p>No verified Credit Cards: </p>
                           	</div>
                             <div class="frm-box fr">
                             	<a href="#">Verify Now</a>
                             </div>
                             <div class="cl"></div>
                     	</div>
                        <div class="frm">
                            <div class="frm-box">
		                       <h5>Set your preferred payment method</h5>
                               <select>
                               	<option value="1">
                                	Paypal account: info@dswtechnologies.com
                                </option>
                               </select>
                           	</div>
                              <div class="cl"></div>
                     	</div>
                        
                    </div>
                    <div class="account_setting-box">
                        <h3>Language Settings</h3>
                        <div class="frm">
                            <div class="frm-box">
		                       <p>I want to browse projects in the following languages:</p>
                               <div class="search-box">
                               		<div class="frm-box fl">
                                    	<input type="text"></div>
                                    <div class="search-btn fl">
                                    	<input type="submit" value=""></div>
                                    <div class="cl"></div>
                               </div>
                               <div class="frm">
                                    <div class="frm-box close-btn">
                                    	<input type="submit" value="English" >
                                        <a href="#"><img src="<?php echo BaseUrl::base(); ?>/images/close-icon.png"></a>
                                    </div>
                               </div>
                           	</div>
                       </div>
                    </div>
                    <div class="account_setting-box acc-type">
                        <h3>Account Type</h3>
                        <div class="frm">
                            <div class="frm-box fl">
		                    	<p>I’m looking to:</p>
                           	</div>
                            <div class="frm-box fl">
                            	<div class="radio-box fl">
		                    		<input type="radio" name="radio"><span>Work</span>
                                </div>
                                <div class="radio-box fl">
                                	<input type="radio" name="radio"><span>Hire</span>
                                </div>
                                <div class="cl"></div>
                           	</div>
                            <div class="cl"></div>
                       </div>
                    </div>
                    <div class="account_setting-box cl-acc">
                        <h3>Close Account</h3>
                        <div class="frm">
                            <div class="frm-box">
		                        	<input type="submit" value="Close my Account" >
                           	</div>
                       </div>
                    </div>
                    <div class="save-setting">
                    	<input type="submit" value="Save Setting">
                    </div>
                    
                    </div>
                    <div class="payment-box fr">
                    	<div class="account_setting-box financial-setting">
                        <h3>Financial Setting</h3>
                        <div class="frm">
                            <div class="frm-box">
		                       <h5>My Currency</h5>
                               <select>
                               	<option value="1">
                                	USD
                                </option>
                               </select>
                           	</div>
                              <div class="cl"></div>
                     	</div>
                        </div>
                        <div class="account_setting-box cl-acc membership-ship">
                        <h3>Membership Plan</h3>
                        <div class="frm">
                        	<div class="frm-box">
                           		<p>Current Plan: <b>Premium</b></p>
                           </div>
                        </div>
                        <div class="frm">
                            <div class="frm-box">
		                        <input type="submit" value="Update Membership" >
                           	</div>
                       </div>
                    </div>
                    	<div class="account_setting-box follow-setting">
                        <h3>Directory and Follow Setting</h3>
                        <div class="frm">
                        	<div class="frm-box fl">
                           		<p>List me on the Profie directory. allowing Employers to
hire me directly for projects.</p>
                           </div>
                            <div class="frm-box fr">
		                        <div class="switch-box">
                                	<span></span>
                                    <div class="switch-btb">
                                    	
                                    </div>	
                                </div>
                           	</div>
                            <div class="cl"></div>
                       </div>
                        <div class="frm">
                        	<div class="frm-box fl">
                           		<p>Allow Profie to follow me, notifying of projects and
contests I’ve posted</p>
                           </div>
                            <div class="frm-box fr">
		                        <div class="switch-box">
                                	<span></span>
                                    <div class="switch-btb">
                                    	
                                    </div>
                                </div>
                           	</div>
                            <div class="cl"></div>
                       </div>
                    </div>
                        
                    </div>
                    <div class="cl"></div>
                </div>
            </div>
        </div>
    </div>
</div>