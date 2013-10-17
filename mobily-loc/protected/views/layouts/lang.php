<div class="header-container">
	<?php
	if (isset(yii::app()->session['customer_type'])) {
		$cssCls = yii::app()->session['customer_type'] == 'b2c' ? 'header-top-consumer' : 'header-top-business';
	} elseif (isset(yii::app()->session['b2b_arrow'])) {
		$cssCls = 'header-top-business';
	} else {
		$cssCls = 'header-top-consumer';
	}
	?>
    <div class="<?php echo $cssCls; ?>">
		<div class="fl">
			<?php
			$location = Yii::app()->createAbsoluteUrl('bcustomer/index');
			if (!isset(yii::app()->session['customer_type'])) {
				echo CHtml::submitButton(Yii::t('strings', 'Business')
						, array('onclick' =>
					'window.location = "' . $location . '";'
					, 'class' => 'business-customer-btn',
					'style' => 'margin-bottom: 0;margin-right: 0;'));
				echo isset(Yii::app()->session['b2b_arrow']) ? '<span class="arrow-up position-absolute"></span>' : '';
				?>
			<?php }
			?>
		</div>
        <div class="fr text-white txt12 padr-20 padl-10 mart-5">
			<?php
			if (Yii::app()->getLanguage() == 'en') {
				echo CHtml::link('عربي', Yii::app()->UrlManager->changeLanguage('ar'), array("class" => "text-white"));
			} else {
				echo CHtml::link('English', Yii::app()->UrlManager->changeLanguage('en'), array("class" => "text-white"));
			}
			?>
        </div>
		<a href="<?php echo Yii::app()->createUrl('product/cart'); ?>">
			<div class="fr header-cart-box">
				<div class="blue-cart fl"></div>
				<?php
				if (isset(Yii::app()->session['mobily_cart'])) {
					$cart = Yii::app()->session['mobily_cart'];
					?>
					<div class="padl-5 fl dir-ltr"><?php echo Yii::t('strings', 'Cart'); ?> (<?php echo count($cart); ?>)</div>
				<?php } else { ?>
					<div class="padl-5 fl dir-ltr"><?php echo Yii::t('strings', 'Cart'); ?> (0)</div>
				<?php } ?>
				<!--<div class="blue-arrow fl marl-10 mart-5"></div>-->
			</div>
		</a>
		<?php if (isset(yii::app()->session['id_customer'])) { ?>
			<div class="fr text-white txt12 header-cart-box">
				<a href="" class="text-white">
					<?php
					echo CHtml::link(Yii::t('strings', 'logout'), Yii::app()->createUrl('site/logout'), array("class" => "text-white"));
					?>
				</a>
			</div>
			<div class="fr text-white txt12 padr-10 mart-5 padt-2 dir-ltr"><?php echo Yii::t('strings', 'Hello'); ?> <?php echo yii::app()->session['username']; ?>!</div>
			<div class="fr text-white txt12 padr-10 mart-5 display-none"></div>
			<?php
		} else {
			if (isset(yii::app()->session['b2b_arrow'])) {
				$loginLink = 'bcustomer/mobily_login';
			} else {
				$loginLink = 'site/BcustomerLogin';
			}
			?>			
			<a href="<?php echo Yii::app()->createUrl($loginLink); ?>">
				<div class="fr header-cart-box">
					<div class="padl-5 fl"><?php echo Yii::t('strings', 'Login'); ?></div>
				</div>
			</a>	
		<?php } ?>
    </div>
    <div class="fl mart-10"><a href="/" class="mobily-logo"></a></div>
</div>