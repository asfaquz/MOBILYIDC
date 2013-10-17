<?php
/* @var $this ProductAdminController */
/* @var $data Product */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product_id), array('view', 'id'=>$data->product_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_refno')); ?>:</b>
	<?php echo CHtml::encode($data->product_refno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort')); ?>:</b>
	<?php echo CHtml::encode($data->sort); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package')); ?>:</b>
	<?php echo CHtml::encode($data->package); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_type')); ?>:</b>
	<?php echo CHtml::encode($data->product_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plan_type')); ?>:</b>
	<?php echo CHtml::encode($data->plan_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('speed')); ?>:</b>
	<?php echo CHtml::encode($data->speed); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('siebel_package_name')); ?>:</b>
	<?php echo CHtml::encode($data->siebel_package_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mandatory_addon_group')); ?>:</b>
	<?php echo CHtml::encode($data->mandatory_addon_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('msisdn_method')); ?>:</b>
	<?php echo CHtml::encode($data->msisdn_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sim_needed')); ?>:</b>
	<?php echo CHtml::encode($data->sim_needed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sim_method')); ?>:</b>
	<?php echo CHtml::encode($data->sim_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bundle_device')); ?>:</b>
	<?php echo CHtml::encode($data->bundle_device); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('optional_addon_group')); ?>:</b>
	<?php echo CHtml::encode($data->optional_addon_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vanity')); ?>:</b>
	<?php echo CHtml::encode($data->vanity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	*/ ?>

</div>