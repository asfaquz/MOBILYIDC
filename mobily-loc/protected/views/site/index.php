<?php echo $this->renderPartial('//layouts/ajax_menu', array('showDevices' => Yii::app()->params['b2cShowDevices'], 'uri' => 'site', 'plan_types' => $plan_types, 'customer' => 'Personal')); ?>
<div class="mart-30 dir-ltr" id="e">
	<?php
	foreach ($plan_types as $plan) {
		?> 
		<div class="text-neotec category-title">
			<?php
			$name = 'name_' . Yii::app()->getLanguage();
			echo $plan->$name;
			?>
		</div>
		<div class="item-box bordb-grey">
			<ul>
				<?php
				$n = 1;
				foreach ($plans as $key => $value) {
					if ($n > 4)
						break;
					if ($plan->product_package_type_id != $value->package_type_id)
						continue;
					$name = 'name_' . Yii::app()->getLanguage();
					echo $this->renderPartial('//layouts/item_box', array('type' => 'package', 'img' => $value->img,
						'p_id' => $value->product_package_id, 'p_name' => $value->$name));
					$n++;
				}
				?>
			</ul>
		</div>
		<?php if ($n > 4) { ?>
			<div class="view-all-cat">
				<?php $name = 'name_' . Yii::app()->getLanguage(); ?>
				<a class="text-light-blue" onclick="type_select(this,0,<?php echo $plan->product_package_type_id; ?>,'<?php echo $plan->$name; ?>');" href="#">
					<?php
					echo Yii::t('strings', 'View All ') . $plan->$name . ' >';
					?>
				</a>
			</div>
		<?php } ?>
		<?php
	}
	if (Yii::app()->params['b2cShowDevices']) {
		?>
		<div class="text-neotec category-title"><?php echo Yii::t('strings', 'Devices') ?></div>
		<div class="item-box">
			<ul>
				<?php
				$n = 1;
				foreach ($devices as $key => $value) {
					if ($n > 4)
						break;
					$name = 'name_' . Yii::app()->getLanguage();
					echo $this->renderPartial('//layouts/item_box', array('type' => 'device', 'img' => $value->img,
						'p_id' => $value->product_device_id, 'p_name' => $value->$name));
					$n++;
				}
				?>
			</ul>
		</div>
		<?php if ($n > 4) { ?>
			<div class="view-all-cat"><a class="text-light-blue" onclick="type_select(1,1,'Devices')" href="#"><?php echo Yii::t('strings', 'View All ') . Yii::t('strings', 'Devices') . ' >'; ?></a></div>
		<?php } ?>
	<?php } ?>
</div>