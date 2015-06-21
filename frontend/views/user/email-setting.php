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
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(["user/accountsetting"]); ?>"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-2.png" alt=""></i>Account Setting</a></li>
                <li class="active"><a href="javascript:void(0)"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-3.png" alt=""></i>Email Setting</a></li>
            </ul>
        </div>
        <div class="account_content">
        	<div class="wrapper">
            	<h2>Email Setting</h2>
                
                <div class="account_details">
                	<div>
                    	<div class="acnt_details">
                        	<div class="acnt_form">
                            	<div class="frm">
                                	<div class="fl">
                                    	<label>Email Address</label>
                                        <input type="text" value="">
                                    </div>
                                    <div class="fr">
                                    	<label>Enter Current Password <small>(if changing email)</small></label>
                                        <input type="text" value="">
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <div class="frm update_email_btn">
                                	<input type="submit" value="update email address" class="update_input">
                                </div>
                            </div>
                        </div>
                        <div class="email_setting">
                        	<div class="emls_box">
                            	<div class="fl">
                                	<div class="">
                                    	
                                    </div>
                                </div>
                                <div class="fr">
                                	
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                
                <div class="account_details-box fl">
                	<div class="account_setting-box follow-setting">
                        <h3>Directory and Follow Setting</h3>
                        <div class="frm">
                        	<div class="frm-box fl">
                           		<p>Email frequency for project related activity</p>
                           </div>
                            <div class="frm-box fr">
		                        <select>
                                	<option value="1">Instantly</option>
                                </select>
                           	</div>
                            <div class="cl"></div>
                       </div>
                        <div class="frm">
                        	<div class="frm-box fl">
                           		<p>When a bid is placed / update/ retracted on your projects</p>
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
                           		<p>When a private message is sent from a Profie placing a bid</p>
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
                    <div class="account_setting-box follow-setting">
                        <h3>Directory and Follow Setting</h3>
                        <div class="frm">
                        	<div class="frm-box fl">
                           		<p>News and announcements from Profie.com</p>
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
                           		<p>A buyer awards you a project</p>
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
                           		<p>You receive a anew private message</p>
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
                           		<p>A Profie request you to release a milestone payment</p>
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
                           		<p>You receive a Profie.com Marketplace notification</p>
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
                <div class="account_details-box fr">
                	<div class="account_setting-box follow-setting">
                        <h3>Notification of latest projects posted</h3>
                        <div class="frm">
                        	<div class="frm-box fl">
                           		<p>Email frequency</p>
                           </div>
                            <div class="frm-box fr">
		                        <select>
                                	<option value="1">Every hour</option>
                                </select>
                           	</div>
                            <div class="cl"></div>
                       </div>
                        <div class="frm">
                        	<div class="frm-box fl">
                           		<p>When a projects gets posted that matches my selected skills</p>
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
                                
                <div class="input_btn">
                	<input type="submit" value="Save Details" class="submit_btn">
                </div>
            </div>
        </div>
    </div>
</div>