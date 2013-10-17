<!--end header----------------------------------->
<!--Footer--------------------------------------->
<div class="dir-ltr"><div class="souq-logo dir-ltr"></div></div>
<div id="footer-mobily" class="footer-container align-c mart-5">
	<div class="overhidden">
		<div class="fl find-store-box">
			<div class="pin"></div>
			<div class="text-neotec text-light-blue txt14"><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/personal/find-store/!ut/p/c5/04_SB8K8xLLM9MSSzPy8xBz9CP0os3gDCxNHi1CPwBAng1BDr2BDT0NzAwgAykcC5f2NDYxcwgyMnIHybh7exm6mMHkidBu6G7g7GRoEGroaeHs4ORq6WhoQp9tLPyo9Jz8J6Eo_j_zcVP2C3NCISkdFRQBqbgAO/dl3/d3/L0lDUmlTUSEhL3dHa0FKRnNBL1lCUmZ3QSEhL2Vu/" class="text-light-blue"><?php echo Yii::t('strings', 'Find our nearest store to you'); ?></a></div>
		</div>
		<?php
		if (isset(yii::app()->session['customer_type'])) {
			if (Yii::app()->session['customer_type'] == 'b2b') {
				$personal = ' display-none';
				$business = '';
			} else {
				$personal = '';
				$business = ' display-none';
			}
		} elseif (Yii::app()->session['temp_customer_type'] == 'b2b') {
			$personal = ' display-none';
			$business = '';
			yii::app()->session->remove('temp_customer_type');
		} else {
			$personal = '';
			$business = ' display-none';
			yii::app()->session->remove('temp_customer_type');	
		}
		?>
		<div class="fl bordl-blue marl-30 padl-10 mart-20<?php echo $business; ?>">
			<div class="text-neotec txt14 text-light-blue align-l"><?php echo Yii::t('strings', 'Business'); ?></div>
			<ul class="footer-menu">
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/business/internet-services/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'Internet Services'); ?></a></li>
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/business/telephony-and-messaging/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'Telephony & Messaging'); ?></a></li>
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/business/connectivity/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'Connectivity'); ?></a></li>
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/business/hosting-and-managed-services/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'Hosting and Managed Services'); ?></a></li>
			</ul>
		</div>
		<div class="fl bordl-blue marl-30 padl-10 mart-20<?php echo $personal; ?>">
			<div class="text-neotec txt14 text-light-blue align-l"><?php echo Yii::t('strings', 'Personal'); ?></div>
			<ul class="footer-menu">
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/personal/roaming-and-international/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'Roaming and International Services'); ?></a></li>
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/personal/news-and-entertainment/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'News and Intertainment'); ?></a></li>
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/personal/elife/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'eLife'); ?></a></li>
				<!-- <li><a href="">Support</a></li> -->
			</ul>
		</div>
		<div class="fl bordl-blue marl-45 padl-10 mart-20">
			<div class="text-neotec txt14 text-light-blue align-l"><?php echo Yii::t('strings', 'About Mobily'); ?></div>
			<ul class="footer-menu">
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/about/glance/?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'Mobily at a glance'); ?></a></li>
				<li><a target="_blank" href="http://careers.mobily.com.sa/"><?php echo Yii::t('strings', 'Careers'); ?></a></li>
				<li><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/help-and-support/help-support-personal/contact-us?lang=en&resetPortlet=true"><?php echo Yii::t('strings', 'Contact Us'); ?></a></li>
			</ul>
		</div>
		<div class="fl bordl-blue marl-45 padl-10 mart-20">
			<div class="text-neotec txt14 text-light-blue align-l"><?php echo Yii::t('strings', 'Connect with us'); ?></div>
			<ul class="footer-menu">
				<li><a href="">Facebook</a></li>
			</ul>
		</div>
	</div>
	<div class="mart-10">
		<div class="txt9 text-dark-grey marl-15p align-l"><a target="_blank" href="http://www.mobily.com.sa/portalu/wps/portal/personal/terms-of-use?lang=en&resetPortlet=true" class="text-white padr-10 padl-10"><?php echo Yii::t('strings', 'TERMS OF USE >>'); ?> </a>  <a href="http://www.mobily.com.sa/portalu/wps/portal/personal/site-map?lang=en&resetPortlet=true" class="text-white padr-10"><?php echo Yii::t('strings', 'SITEMAP >>'); ?> </a>  Mobily © 2013</div>
	</div>
</div>
<!--end Footer------------------------------------>
</div>
</body>
</html>