<?php if (!isset($links)) { ?>
	<div class="homepage-menu marb-15 text-neotec">
		<ul>
			<li><a 
				<?php
				if (!isset(Yii::app()->session['menu_package'])) {
					echo 'class="homepage-menu-active"';
				}
				?>
					href="<?php echo Yii::app()->createAbsoluteUrl($uri . '/index'); ?>"><?php echo Yii::t('strings', $customer . ' Shop') ?></a></li>
				<?php foreach ($plan_types as $plan) { ?> 
				<li><a
					<?php
					$name = 'name_' . Yii::app()->getLanguage();
					if (isset(Yii::app()->session['menu_package'])) {
						echo Yii::app()->session['menu_package'] == $plan->product_package_type_id ? 'class="homepage-menu-active"' : '';
					}
					?>
						onclick="type_select(this,0,<?php echo $plan->product_package_type_id; ?>,'<?php echo $plan->$name; ?>');" href="#">
							<?php
							echo $plan->$name;
							?>
					</a>
				</li>
				<?php
			}
			if ($showDevices) {
				?>
				<li><a
					<?php
					if (isset(Yii::app()->session['menu_package'])) {
						echo Yii::app()->session['menu_package'] == 'device' ? 'class="homepage-menu-active"' : '';
					}
					?>
						onclick="type_select(this,1,1,'Devices')" href="#"><?php echo Yii::t('strings', 'Devices') ?></a></li>
				<?php } ?>
		</ul>
	</div>
	<script type="text/javascript">
		function type_select(tag, devices, type, name) {
			$("a").removeClass("homepage-menu-active");
			$(tag).addClass("homepage-menu-active");
			$.ajax({
				type: "GET",
				url: "<?php echo Yii::app()->createAbsoluteUrl($uri . '/index'); ?>",
				data: { devices: devices, type: type, name: name, YII_CSRF_TOKEN: "<?php echo Yii::app()->request->csrfToken; ?>" },
				success: function(data) {
					$('#e').fadeOut(300, function(){
						$(this).html(data).fadeIn();
					});
				}

			});
			return false;
		};
	</script>
<?php } else { ?>
	<?php
	if (!is_null($plan_types)) {
		$user_type_uri = 'site';
		$user_type_index = 'Consumer Shop';
		if (isset(yii::app()->session['customer_type'])) {
			$user_type_uri = Yii::app()->session['customer_type'] == 'b2c' ? 'site' : 'bcustomer';
			$user_type_index = Yii::app()->session['customer_type'] == 'b2c' ? 'Consumer Shop' : 'Business Shop';
		}
		if (isset($customer_type)) {
			$user_type_uri = $customer_type == 'b2c' ? 'site' : 'bcustomer';
			$user_type_index = $customer_type == 'b2c' ? 'Consumer Shop' : 'Business Shop';
		}
		?>
		<div class="homepage-menu marb-15 text-neotec">
			<ul>
				<li>
					<a
					<?php
					if (!isset(Yii::app()->session['menu_package'])) {
						echo 'class="homepage-menu-active"';
					}
					?>
						href="<?php echo Yii::app()->createAbsoluteUrl($user_type_uri . '/index'); ?>"><?php echo Yii::t('strings', $user_type_index) ?></a></li>
					<?php
					foreach ($plan_types as $plan) {
						$name = 'name_' . Yii::app()->getLanguage();
						?>
					<li>
						<a 
						<?php
						if (isset(Yii::app()->session['menu_package'])) {
							echo Yii::app()->session['menu_package'] == $plan->product_package_type_id ? 'class="homepage-menu-active"' : '';
						}
						?>
							href="<?php echo Yii::app()->createAbsoluteUrl($user_type_uri . '/products', array('id' => $plan->product_package_type_id)); ?>" >
								<?php
								echo $plan->$name;
								?>
						</a>
					</li>
					<?php
				}
				if ($showDevices) {
					?>
					<li><a
						<?php
						if (isset(Yii::app()->session['menu_package'])) {
							echo Yii::app()->session['menu_package'] == 'device' ? 'class="homepage-menu-active"' : '';
						}
						?>
							href="<?php echo Yii::app()->createAbsoluteUrl($user_type_uri . '/devices'); ?>"><?php echo Yii::t('strings', 'Devices') ?></a></li>
					<?php } ?>
			</ul>
		</div>
	<?php } ?>
<?php } ?>
