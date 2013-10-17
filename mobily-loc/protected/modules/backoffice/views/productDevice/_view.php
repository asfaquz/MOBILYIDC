<?php
/* @var $this ProductDeviceController */
/* @var $data ProductDevice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_device_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_device_id), array('view', 'id'=>$data->product_device_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item')); ?>:</b>
	<?php echo CHtml::encode($data->id_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sku')); ?>:</b>
	<?php echo CHtml::encode($data->sku); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('device_name')); ?>:</b>
	<?php echo CHtml::encode($data->device_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cash_sale_allowed')); ?>:</b>
	<?php echo CHtml::encode($data->cash_sale_allowed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cash_price')); ?>:</b>
	<?php echo CHtml::encode($data->cash_price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pt')); ?>:</b>
	<?php echo CHtml::encode($data->pt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pr')); ?>:</b>
	<?php echo CHtml::encode($data->pr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_type')); ?>:</b>
	<?php echo CHtml::encode($data->customer_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('img')); ?>:</b>
	<?php echo CHtml::encode($data->img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ar')); ?>:</b>
	<?php echo CHtml::encode($data->name_ar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	*/ ?>

</div>