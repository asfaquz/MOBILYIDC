<?php
/* @var $this ProductPackageTypeController */
/* @var $data ProductPackageType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_package_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_package_type_id), array('view', 'id'=>$data->product_package_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_type_name')); ?>:</b>
	<?php echo CHtml::encode($data->package_type_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_type')); ?>:</b>
	<?php echo CHtml::encode($data->customer_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_en')); ?>:</b>
	<?php echo CHtml::encode($data->name_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_ar')); ?>:</b>
	<?php echo CHtml::encode($data->name_ar); ?>
	<br />


</div>