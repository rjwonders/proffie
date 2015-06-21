<?php
use yii\helpers\BaseUrl;

/* @var $this yii\web\View */
$this->title = 'Dashboard';

?>
<div class="account_page">
	<div class="wrapper">
    	<div class="account_tabs">
        	<ul class="clearfix">
            	<li class="active"><a href="javascript:void(0)"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-1.png" alt=""></i>Account Details</a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(["user/accountsetting"]); ?>"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-2.png" alt=""></i>Account Setting</a></li>
                <li><a href="<?php echo Yii::$app->urlManager->createUrl(["user/emailsetting"]); ?>"><i><img src="<?php echo BaseUrl::base(); ?>/images/acn_icon-3.png" alt=""></i>Email Setting</a></li>
            </ul>
        </div>
        <div class="account_content">
        	<div class="wrapper">
            	<h2>Account Details</h2>
                <form method="post" action="<?php echo Yii::$app->urlManager->createUrl(["user/saveprofile"]); ?>">
                <div class="account_details">
                	<div class="right">
                    	<div class="acnt_img">
                        	<h3>Profile Picture</h3>
                            <i>
                            	<img src="<?php echo BaseUrl::base(); ?>/images/ds_img.png" alt="">
                                <?php if($rsUser->IsOnline==1): ?>
                                    <span class="online_sts">
                                        online
                                    </span>   
                                 <?php endif; ?>
                                 </i>
                            </div>
                        </div>
                   	
                    <div class="left">
                    	<div class="acnt_details">
                        	<div class="acnt_form">
                            	<div class="frm">
                                	<div class="fl">
                                    	<label>First Name<strong>*</strong></label>
                                        <input type="text" value="<?php echo $rsUser->FirstName; ?>" name="FirstName">
                                    </div>
                                    <div class="fr">
                                    	<label>Last Name<strong>*</strong></label>
                                        <input type="text" value="<?php echo $rsUser->LastName; ?>" name="LastName">
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <div class="frm">
                                	<div class="fl">
                                    	<label>Address<strong>*</strong></label>
                                        <input type="text" value="<?php echo $rsUser->Address; ?>" name="Address">
                                    </div>
                                    <div class="fr">
                                    	<label>&nbsp;</label>
                                        <input type="text" value="<?php echo $rsUser->Address2; ?>" name="Address2">
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <div class="frm">
                                	<div class="fl">
                                    	<label>City<strong>*</strong></label>
                                        <input type="text" value="<?php echo $rsUser->City; ?>" name="City">
                                    </div>
                                    <div class="fr">
                                    	<label>State<strong>*</strong></label>
                                        <input type="text" value="<?php echo $rsUser->State; ?>" name="State">
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <div class="frm">
                                	<div class="fl">
                                    	<label>Postal Code<strong>*</strong></label>
                                        <input type="text" value="<?php echo $rsUser->Zipcode; ?>" name="Zipcode">
                                    </div>
                                    <div class="fr">
                                    	<label>Country</label>
                                        <select class="dark" name="Country">
                                        	<option value="">Select Country</option>
                                        	<?php foreach($rsCountry as $Country): ?>
                                            	<option value="<?php echo $Country->CountryID; ?>" <?php if($Country->CountryID==$rsUser->Country): ?> selected="selected" <?php endif; ?>><?php echo $Country->Country; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <div class="frm">
                                	<div class="fl">
                                    	<label>Company</label>
                                        <input type="text" value="<?php echo $rsUser->CompanyName; ?>" name="CompanyName">
                                    </div>
                                    <div class="fr">
                                    	<label>Timezone</label>
                                        <select name="TimezoneID" id="TimezoneID">
                                        	<option value="">Select Zimezone</option>
                                        	<?php foreach($rsCountry as $Country): ?>
                                            	<option value="<?php echo $Country->CountryID; ?>" <?php if($Country->CountryID==$rsUser->TimezoneID): ?> selected="selected" <?php endif; ?>><?php echo $Country->Country; ?></option>
											<?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="cl"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
                <?php /*?><div class="acunt_bx">
                	<div class="acunt_coamn first">
                    	<div class="fl">
                        	<img src="<?php echo BaseUrl::base(); ?>/images/madal_icon.png" alt="">
                        </div>
                        <div class="fr">
                        	<div class="flt">
                            	<h3>ID Verification</h3>
                                <h4>Further information required to verify your indentity</h4>
                                <p>To find out what we require, please visit the Verification Center.</p>
                            </div>
                        	<div class="frt">
                            	<a href="#" class="verification_link">Verification Center</a>
                            </div>
                        	<div class="cl"></div>
                        </div>
                        <div class="cl"></div>
                    </div>
                    <div class="acunt_coamn">
                    	<div class="fl">
                        	<img src="<?php echo BaseUrl::base(); ?>/images/madal_icon.png" alt="">
                        </div>
                        <div class="fr">
                        	<div class="flt">
                            	<h3>Security Phone Number</h3>
                                <p><strong>Phone:</strong> +919825027042 &nbsp; &nbsp; &nbsp;  /  &nbsp; &nbsp; &nbsp;   <strong>Country:</strong> India</p>
                            </div>
                        	<div class="frt">
                            	<a href="#" class="verification_link">Verification Center</a>
                            </div>
                        	<div class="cl"></div>
                        </div>
                        <div class="cl"></div>
                    </div>
                </div><?php */?>
                <div class="input_btn">
                	<input type="submit" value="Save Details" class="submit_btn">
                </div>
            	</form>
            </div>
        </div>
    </div>
</div>