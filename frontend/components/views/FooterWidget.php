<?php
use yii\helpers\BaseUrl;
use yii\web\Session;
use yii\helpers\Url;
use yii\web\UrlManager;
?>
<?php $method = Yii::$app->controller->id; ?>
<div class="footer">
	<div class="wrapper">
    	<div class="ftr_box">
        	<h2>Discover</h2>
            <ul>
            	<li><a href="#">Trust & Quality</a></li>
                <li><a href="#">How it Works</a></li>
                <li><a href="#">How To Post</a></li>
                <li><a href="#">Leaderboards</a></li>
                <li><a href="#">Earn Money</a></li>
                <li><a href="#">New Users FAQ</a></li>
                <li><a href="#">Support Centre</a></li>
                <li><a href="#">Insurance</a></li>
                <li><a href="#">Merchandise</a></li>
            </ul>
        </div>
        <div class="ftr_box">
        	<h2>Company</h2>
            <ul>
            	<li><a href="#">About Us</a></li>
            	<li><a href="#">Press</a></li>
            	<li><a href="#">Careers</a></li>
            	<li><a href="#">Blog</a></li>
            	<li><a href="#">Marketplace Rules</a></li>
            	<li><a href="#">Terms & Conditions</a></li>
            	<li><a href="#">Privacy Policy</a></li>
            	<li><a href="#">Contact Us</a></li>
            </ul>
        </div>        
        <div class="ftr_box">
        	<h2>Existing Users</h2>
            <ul>
            	<li><a href="#">Post a Project</a></li>
            	<li><a href="#">Browse Projects</a></li>
            	<li><a href="#">Login</a></li>
            	<li><a href="#">Proffie PRO</a></li>
            </ul>
        </div>
        <div class="ftr_box">
        	<h2>follow us</h2>
            <div class="social">
            	<ul>
                	<?php if(isset($Settings['Twitter Link']) && $Settings['Facebook Link']!=''): ?>
                		<li><a href="<?php echo $Settings['Twitter Link']; ?>" target="_blank"><img src="<?php echo BaseUrl::base(); ?>/images/tw_icon.png" alt=""></a></li>
                    <?php endif; ?>
                    <?php if(isset($Settings['Facebook Link']) && $Settings['Facebook Link']!=''): ?>
                    	<li><a href="<?php echo $Settings['Facebook Link']; ?>" target="_blank"><img src="<?php echo BaseUrl::base(); ?>/images/fb_icon.png" alt=""></a></li>
                    <?php endif; ?>
                    <?php if(isset($Settings['Youtube Link']) && $Settings['Facebook Link']!=''): ?>
                    	<li><a href="<?php echo $Settings['Youtube Link']; ?>" target="_blank"><img src="<?php echo BaseUrl::base(); ?>/images/yt-icon.png" alt=""></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        
        <div class="footer_bottom">
        	<a href="#"><img src="<?php echo BaseUrl::base(); ?>/images/footer_logo.png" alt=""></a>
            <div class="copyright">
            	© 2011-2015. All rights reserved
            </div>
        </div>
    </div>
</div>