<?php
/* @var $this ProductPackageController */
/* @var $data ProductPackage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_package_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_package_id), array('view', 'id'=>$data->product_package_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_name')); ?>:</b>
	<?php echo CHtml::encode($data->package_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('speed_based')); ?>:</b>
	<?php echo CHtml::encode($data->speed_based); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_type')); ?>:</b>
	<?php echo CHtml::encode($data->package_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_type')); ?>:</b>
	<?php echo CHtml::encode($data->customer_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->package_type_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ar')); ?>:</b>
	<?php echo CHtml::encode($data->name_ar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_en')); ?>:</b>
	<?php echo CHtml::encode($data->desc_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_ar')); ?>:</b>
	<?php echo CHtml::encode($data->desc_ar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	*/ ?>

</div>