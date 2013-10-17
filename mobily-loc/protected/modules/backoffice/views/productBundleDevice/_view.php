<?php
/* @var $this ProductBundleDeviceController */
/* @var $data ProductBundleDevice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_bundle_device_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_bundle_device_id), array('view', 'id'=>$data->product_bundle_device_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_refno')); ?>:</b>
	<?php echo CHtml::encode($data->product_refno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_group')); ?>:</b>
	<?php echo CHtml::encode($data->device_group); ?>
	<br />


</div>